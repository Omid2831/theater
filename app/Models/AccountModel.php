<?php
class AccountModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function isAdministrator($gebruikerId) {
        $this->db->query("
            SELECT Naam FROM Rol 
            WHERE GebruikerId = :id AND Isactief = 1
        ");
        $this->db->bind(':id', $gebruikerId, PDO::PARAM_INT);
        $this->db->execute();
        $user = $this->db->single();

        //var_dump($this->db->single());

        return strtolower($user->Naam) === 'administrator';
    }

    public function getAllGebruikers() {
        $this->db->query("
            SELECT g.Id, g.Voornaam, g.Tussenvoegsel, g.Achternaam, g.Gebruikersnaam, g.Datumaangemaakt , r.Naam
            FROM Gebruiker g
            INNER JOIN Rol r ON g.Id = r.GebruikerId
            WHERE g.Isactief = 1
        ");
        $this->db->execute();
        return $this->db->resultSet();
    }
}
