
<?php
require_once '../config/config.php';

class Accounts {
    public function login() {
        session_start();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $username = $_POST['username'];
            $password = $_POST['password'];
            $stmt = $db->prepare("SELECT * FROM Gebruiker WHERE Gebruikersnaam = ? AND Isactief = 1");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if ($user && password_verify($password, $user['Wachtwoord'])) {
                $_SESSION['user_id'] = $user['Id'];
                $_SESSION['rol'] = $this->getUserRole($db, $user['Id']);
                $this->setIngelogd($db, $user['Id']);
                header("Location: /Homepages/index");
                exit;
            } else {
                $error = "Ongeldige gebruikersnaam of wachtwoord.";
            }
        }
        include "../views/accounts/login.php";
    }

    public function register() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $voornaam = $_POST['voornaam'];
            $achternaam = $_POST['achternaam'];
            $nu = date('Y-m-d H:i:s');

            // Gebruiker toevoegen
            $stmt = $db->prepare("INSERT INTO Gebruiker (Voornaam, Achternaam, Gebruikersnaam, Wachtwoord, IsIngelogd, Isactief, Datumaangemaakt, Datumgewijzigd)
                                  VALUES (?, ?, ?, ?, 0, 1, ?, ?)");
            $stmt->bind_param("ssssss", $voornaam, $achternaam, $username, $password, $nu, $nu);
            if ($stmt->execute()) {
                $gebruikerId = $stmt->insert_id;

                // Standaard rol toewijzen
                $rol = 'klant';
                $stmt2 = $db->prepare("INSERT INTO Rol (GebruikerId, Naam, Isactief, Datumaangemaakt, Datumgewijzigd)
                                       VALUES (?, ?, 1, ?, ?)");
                $stmt2->bind_param("isss", $gebruikerId, $rol, $nu, $nu);
                $stmt2->execute();

                header("Location: /Accounts/login");
                exit;
            } else {
                $error = "Fout bij registratie.";
            }
        }
        include "../views/accounts/register.php";
    }

    private function getUserRole($db, $gebruikerId) {
        $stmt = $db->prepare("SELECT Naam FROM Rol WHERE GebruikerId = ? AND Isactief = 1 LIMIT 1");
        $stmt->bind_param("i", $gebruikerId);
        $stmt->execute();
        $result = $stmt->get_result();
        $rol = $result->fetch_assoc();
        return $rol ? $rol['Naam'] : null;
    }

    private function setIngelogd($db, $gebruikerId) {
        $now = date('Y-m-d H:i:s');
        $stmt = $db->prepare("UPDATE Gebruiker SET IsIngelogd = 1, Ingelogd = ? WHERE Id = ?");
        $stmt->bind_param("si", $now, $gebruikerId);
        $stmt->execute();
    }
}
?>
