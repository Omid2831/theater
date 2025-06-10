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

}