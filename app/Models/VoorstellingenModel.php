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
<<<<<<< HEAD
        $sql = "SELECT  VRLN.Id
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
    }

    public function delete($Id)
    {
        $sql = "DELETE 
                FROM Voorstelling
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Voorstelling (Naam, Beschrijving, Datum, Tijd, MaxAantalTickets, Beschikbaarheid)
                VALUES (:naam, :beschrijving, :datum, :tijd, :maxaantaltickets, :beschikbaarheid)";

        $this->db->query($sql);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':beschrijving', $data['beschrijving'], PDO::PARAM_STR);
        $this->db->bind(':datum', $data['datum'], PDO::PARAM_STR);
        $this->db->bind(':tijd', $data['tijd'], PDO::PARAM_STR);
        $this->db->bind(':maxaantaltickets', $data['maxaantaltickets'], PDO::PARAM_INT);
        $this->db->bind(':beschikbaarheid', $data['beschikbaarheid'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function getVoorstellingById($Id)
    {
        $sql = "SELECT  Id
                       ,Naam
                       ,Beschrijving
                       ,Datum
                       ,Tijd
                       ,MaxAantalTickets
                       ,Beschikbaarheid
                FROM   Voorstelling
                WHERE  Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $Id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateVoorstelling($post)
    {
        $sql = "UPDATE  Voorstelling
                SET     Naam = :naam
                       ,Beschrijving = :beschrijving
                       ,Datum = :datum
                       ,Tijd = :tijd
                       ,MaxAantalTickets = :maxaantaltickets
                       ,Beschikbaarheid = :beschikbaarheid
                WHERE  Id = :id;";

        $this->db->query($sql);
        $this->db->bind(':naam', $post['naam'], PDO::PARAM_STR);
        $this->db->bind(':beschrijving', $post['Beschrijving'], PDO::PARAM_STR);
        $this->db->bind(':datum', $post['Datum'], PDO::PARAM_STR);
        $this->db->bind(':tijd', $post['Tijd'], PDO::PARAM_STR);
        $this->db->bind(':maxaantaltickets', $post['MaxAantalTickets'], PDO::PARAM_INT);
        $this->db->bind(':beschikbaarheid', $post['Beschikbaarheid'], PDO::PARAM_INT);
        $this->db->bind(':id', $post['Id'], PDO::PARAM_INT);
        
        $this->db->execute();
    }

=======
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
>>>>>>> 4b92879f1790a331322d78696c5da0a83e92e2b8
}