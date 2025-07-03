<?php
require_once dirname(dirname(__FILE__)) . '/config/config.php';
require_once APPROOT . '/libraries/Controller.php';
session_start();

class LoginController extends Controller {
    private $db;
    private $userModel;


    public function __construct() {
        $this->userModel = $this->model('UserModel');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gebruikersnaam = trim($_POST['gebruikersnaam']);
            $wachtwoord = trim($_POST['wachtwoord']);

            $user = $this->userModel->validateUser($gebruikersnaam, $wachtwoord);
           

        if ($user) {
            $rol = $this->userModel->isAdministrator($user->Id); 
            $_SESSION['gebruiker_id'] = $user->Id;
            $_SESSION['gebruikersnaam'] = $user->Gebruikersnaam;
            $_SESSION['rol'] = $rol; 
            $_SESSION['ingelogd'] = true;

            $_SESSION['login_success'] = true; 

            $this->userModel->updateLoginStatus($user->Id);

            header('Location: ' . URLROOT . '/Pages/index');
            exit;

            } else {
                $data = ['error' => "Ongeldige gebruikersnaam of wachtwoord."];
                $this->view('login/login', $data);
            }
        } else {
            $this->view('login/login');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $voornaam = trim($_POST['voornaam']);
            $tussenvoegsel = trim($_POST['tussenvoegsel']);
            $achternaam = trim($_POST['achternaam']);
            $gebruikersnaam = trim($_POST['gebruikersnaam']);
            $wachtwoord = trim($_POST['wachtwoord']);
            $nu = date("Y-m-d H:i:s");

            $hashedPassword = password_hash($wachtwoord, PASSWORD_DEFAULT);

            try {
                $this->userModel->insert($voornaam, $tussenvoegsel, $achternaam, $gebruikersnaam, $hashedPassword, $nu);
                header('Location: ' . URLROOT . '/loginController/login');
            } catch (Exception $e) {
                $data = ['error' => 'Registratie mislukt. Probeer het later opnieuw.'];
                $this->view('login/register', $data);
                return;
            }
        } else {
            $this->view('login/register');
        }
    }
    public function logout() {
    if (isset($_SESSION['gebruiker_id'])) {
        $this->userModel->logout($_SESSION['gebruiker_id']);
        session_unset();
        session_destroy();
    }

    header('Location: ' . URLROOT . '/Homepages/index');
    exit;
    }

}
