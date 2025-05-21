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
}