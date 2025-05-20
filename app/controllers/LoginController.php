<?php
session_start();
require_once('../model/User.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['gebruikersnaam'] ?? '';
    $password = $_POST['password'] ?? '';

    $userModel = new User();

    if ($userModel->authenticate($username, $password)) {
        $_SESSION['user'] = $username;
        header("Location: /login.php");
        exit;
    } else {
        $_SESSION['error'] = "Ongeldige gebruikersnaam of wachtwoord.";
        header("Location: /view/login.php");
        exit;
    }
}
