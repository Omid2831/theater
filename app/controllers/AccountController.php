<?php
class AccountController extends BaseController
{
    private $accountModel;

    public function __construct() 
    {
        $this->accountModel = $this->model('AccountModel');
    }

    public function account_overzicht() 
    {
 

        $data = [
            'title' => 'Account Overzicht'
        ];
        session_start();

        if (!isset($_SESSION['gebruiker_id'])) {
            header("Location: /login.php");
            exit;
        }

        $gebruikerId = $_SESSION['gebruiker_id'];

        if (!$this->accountModel->isAdministrator($gebruikerId)) {
            echo "Je hebt geen toegang tot dit overzicht.";
            exit;
        }

        $accounts = $this->accountModel->getAllGebruikers();

        $data['accounts'] = $accounts;
        //include 'views/account_overzicht.php';
        $this->view('accounts/account_overzicht', $data);
    }
}

