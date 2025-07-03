<?php

class MedewerkersModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function GetAllMedewerkers()
    {
        try {
            $sql = "SELECT  MDWR.Id
                           ,MDWR.Nummer
                           ,MDWR.Medewerkersoort

                    FROM  Medewerker as MDWR
                
                    ORDER BY MDWR.Id";

            $this->db->query($sql);

            return $this->db->resultSet();
        } catch (PDOException $e) {
            error_log("Er is een onverwachte fout opgetreden" . $e->getMessage());
            return [];
        }
    }

    public function delete($Id)
    {
        $sql = "DELETE 
                FROM Medewerker
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Medewerker (Nummer, Medewerkersoort)
                VALUES (:nummer, :medewerkersoort)";

        $this->db->query($sql);
        $this->db->bind(':nummer', $data['nummer'], PDO::PARAM_INT);
        $this->db->bind(':medewerkersoort', $data['medewerkersoort'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getMedewerkerById($Id)
    {
        $sql = "SELECT  Id
                       ,Nummer
                       ,Medewerkersoort
                FROM   Medewerker
                WHERE  Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $Id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateMedewerker($post)
    {
        $sql = "UPDATE  Medewerker
                SET     Nummer = :nummer
                       ,Medewerkersoort = :medewerkersoort
                WHERE  Id = :id;";

        $this->db->query($sql);
        $this->db->bind(':nummer', $post['nummer'], PDO::PARAM_INT);
        $this->db->bind(':medewerkersoort', $post['Medewerkersoort'], PDO::PARAM_STR);
        $this->db->bind(':id', $post['Id'], PDO::PARAM_INT);
        
        $this->db->execute();
    }

}