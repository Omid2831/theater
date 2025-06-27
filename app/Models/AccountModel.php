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

        return strtolower($user->Naam) === 'administrator';
    }

    public function getAllGebruikers() {
        $this->db->query("
            SELECT g.Id, g.Voornaam, g.Tussenvoegsel, g.Achternaam, g.Gebruikersnaam, DATE_FORMAT(g.Datumaangemaakt, '%d-%m-%Y %H:%i') as Datumaangemaakt , r.Naam
            FROM Gebruiker g
            INNER JOIN Rol r ON g.Id = r.GebruikerId
            WHERE g.Isactief = 1
        ");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function delete($id)
    {
        $sql = 'UPDATE Gebruiker SET Isactief = 0 WHERE Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function getAccountById($id)
{
    $this->db->query("SELECT * FROM Gebruiker WHERE Id = :id AND Isactief = 1");
    $this->db->bind(':id', $id);
    return $this->db->single();
}

public function updateAccount($data)
{
    $this->db->query("UPDATE Gebruiker SET 
                        Voornaam = :voornaam,
                        Tussenvoegsel = :tussenvoegsel,
                        Achternaam = :achternaam,
                        Gebruikersnaam = :gebruikersnaam
                      WHERE Id = :id");

    $this->db->bind(':voornaam', $data['voornaam']);
    $this->db->bind(':tussenvoegsel', $data['tussenvoegsel']);
    $this->db->bind(':achternaam', $data['achternaam']);
    $this->db->bind(':gebruikersnaam', $data['gebruikersnaam']);
    $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

    return $this->db->execute();
}

public function getAccountByGebruikersnaam($gebruikersnaam)
{
   $this->db->query("SELECT * FROM Gebruiker WHERE Gebruikersnaam = :gebruikersnaam");
    $this->db->bind(':gebruikersnaam', $gebruikersnaam);
    return $this->db->single();
}

}



