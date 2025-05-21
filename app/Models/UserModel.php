<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserByUsername($gebruikersnaam) {
        $this->db->query("SELECT * FROM Gebruiker WHERE Gebruikersnaam = :gebruikersnaam AND Isactief = 1");
        $this->db->bind(':gebruikersnaam', $gebruikersnaam, PDO::PARAM_STR);
        return $this->db->single();
    }

    public function validateUser($gebruikersnaam, $wachtwoord) {
        $user = $this->getUserByUsername($gebruikersnaam);
        if ($user && password_verify($wachtwoord, $user->Wachtwoord)) {
            return $user;
        }
        return false;
    }

    public function updateLoginStatus($userId)
{
    $this->db->query("UPDATE Gebruiker SET IsIngelogd = 1, Ingelogd = NOW() WHERE Id = :id");
    $this->db->bind(':id', $userId, PDO::PARAM_INT);
    $this->db->execute();
}


public function insert($voornaam, $tussenvoegsel, $achternaam, $gebruikersnaam, $hashedPassword, $nu)
{
    try {
        // Gebruiker aanmaken
        $this->db->query("INSERT INTO Gebruiker 
            (Voornaam, Tussenvoegsel, Achternaam, Gebruikersnaam, Wachtwoord, IsIngelogd, Isactief, Datumaangemaakt, Datumgewijzigd)
            VALUES (:voornaam, :tussenvoegsel, :achternaam, :gebruikersnaam, :wachtwoord, 0, 1, :nu1, :nu2)");

        $this->db->bind(':voornaam', $voornaam, PDO::PARAM_STR);

        // Lege tussenvoegsel als NULL behandelen
        if (empty($tussenvoegsel)) {
            $this->db->bind(':tussenvoegsel', null, PDO::PARAM_NULL);
        } else {
            $this->db->bind(':tussenvoegsel', $tussenvoegsel, PDO::PARAM_STR);
        }

        $this->db->bind(':achternaam', $achternaam, PDO::PARAM_STR);
        $this->db->bind(':gebruikersnaam', $gebruikersnaam, PDO::PARAM_STR);
        $this->db->bind(':wachtwoord', $hashedPassword, PDO::PARAM_STR);
        $this->db->bind(':nu1', $nu, PDO::PARAM_STR); // eerste gebruik van :nu
        $this->db->bind(':nu2', $nu, PDO::PARAM_STR); // tweede gebruik van :nu

        $this->db->execute();

        $id = $this->db->lastInsertId();

        // Rol koppelen
        $this->db->query("INSERT INTO Rol (GebruikerId, Naam, Isactief, Datumaangemaakt, Datumgewijzigd)
                          VALUES (:id, 'Gebruiker', 1, :nu1, :nu2)");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        $this->db->bind(':nu1', $nu, PDO::PARAM_STR);
        $this->db->bind(':nu2', $nu, PDO::PARAM_STR);
        $this->db->execute();

        // Redirect naar login
        // header('Location: LoginController/login');
    } catch (Exception $e) {
        die('Fout bij registreren: ' . $e->getMessage());
    }
}
    public function logout($userId)
    {
    $this->db->query("UPDATE Gebruiker SET IsIngelogd = 0 WHERE Id = :id");
    $this->db->bind(':id', $userId, PDO::PARAM_INT);
    $this->db->execute();
    }


}
