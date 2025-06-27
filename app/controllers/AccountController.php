<?php
class AccountController extends BaseController
{
    private $accountModel;

    public function __construct() 
    {
        session_start();

        if (!isset($_SESSION['gebruiker_id'])) {
            header("Location: /login.php");
            exit;
        }

        $this->accountModel = $this->model('AccountModel');
    }

    private function requireAdmin() 
    {
        $gebruikerId = $_SESSION['gebruiker_id'];
        if (!$this->accountModel->isAdministrator($gebruikerId)) {
            die('Je hebt geen rechten om deze pagina te bekijken.');
        }
    }

    public function account_overzicht() 
    {
        $this->requireAdmin();

        $accounts = $this->accountModel->getAllGebruikers();

        $data = [
            'title' => 'Account Overzicht',
            'accounts' => $accounts,
            'message' => $_SESSION['verwijderd'] ?? false,
            'verwijder_error' => $_SESSION['verwijder_error'] ?? ''
        ];

        unset($_SESSION['verwijderd'], $_SESSION['verwijder_error']);

        $this->view('accounts/account_overzicht', $data);

        if (isset($_SESSION['update_success'])) {
         $data['update_success'] = true;
             unset($_SESSION['update_success']);
        }

    }

    public function delete($id)
    {
        $this->requireAdmin();

        if ($this->accountModel->isAdministrator($id)) {
            $_SESSION['verwijder_error'] = "Je kunt geen administrator verwijderen.";
        } else {
            $result = $this->accountModel->delete($id);
            $_SESSION['verwijderd'] = $result;
            if (!$result) {
                $_SESSION['verwijder_error'] = "Fout bij het verwijderen van de gebruiker.";
            }
        }

        header("Location: " . URLROOT . "/AccountController/account_overzicht");
        exit;
    }

    public function wijziging($id)
    {
        $account = $this->accountModel->getAccountById($id);

        if (!$account) {
            die('Account niet gevonden.');
        }
        if ($this->accountModel->isAdministrator($id)) {
            $_SESSION['verwijder_error'] = "Je kunt geen administrator wijzigen.";
            header("Location: " . URLROOT . "/AccountController/account_overzicht");
            exit;
        }

        $data = [
            'title' => 'Wijzig Account',
            'message' => '',
            'account' => $account
        ];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $updateData = [
                'id' => $id,
                'voornaam' => trim($_POST['voornaam']),
                'tussenvoegsel' => trim($_POST['tussenvoegsel']),
                'achternaam' => trim($_POST['achternaam']),
                'gebruikersnaam' => trim($_POST['gebruikersnaam'])
            ];

            $existingUser = $this->accountModel->getAccountByGebruikersnaam($updateData['gebruikersnaam']);

            if ($existingUser && $existingUser->Id != $id) {
                $data['message'] = 'Deze gebruikersnaam is al in gebruik.';
            } else {
                $result = $this->accountModel->updateAccount($updateData);
                if ($result) {
                $_SESSION['update_success'] = true;
                header("Location: " . URLROOT . "/AccountController/account_overzicht");
                exit;
                } else {
                    $data['message'] = 'Er ging iets mis bij het bijwerken.';
                }
            }
        }

        $this->view('accounts/wijziging', $data);
    }
}
