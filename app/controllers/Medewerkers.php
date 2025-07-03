<?php

class Medewerkers extends BaseController
{
    private $MedewerkersModel;

    public function __construct()
    {
         $this->MedewerkersModel = $this->model('MedewerkersModel');
    }

    public function index()
    {
       /**
        * Hier halen we alle medewerkers op uit de database
        */
       $result = $this->MedewerkersModel->getAllMedewerkers();
       
       /**
        * Het $data-array geeft informatie mee aan de view-pagina
        */
       $data = [
            'title' => 'Alle medewerkers.',
            'Medewerkers' => $result,
             
       ];

         /**
          * Met de view-method uit de BaseController-class wordt de view
          * aangeroepen met de informatie uit het $data-array
          */
       $this->view('Medewerkers/Index', $data); 
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