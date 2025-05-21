<?php

class VoorstellingenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function GetAllVoorstellingen()
    {
        try {

          $sql = "SELECT     VRLN.Id
                            ,VRLN.Naam
                            ,VRLN.Beschrijving
                            ,VRLN.Datum
                            ,VRLN.Tijd
                            ,VRLN.MaxAantalTickets
                            ,VRLN.Beschikbaarheid
                    FROM  Voorstelling  as VRLN
                
                    ORDER BY VRLN.Datum";

                   $this->db->query($sql);

              return $this->db->resultSet();
        } catch (PDOException $e) {
            error_log("Er is een onverwachte fout opgetreden" . $e->getMessage());
            return [];
        }
    }
}