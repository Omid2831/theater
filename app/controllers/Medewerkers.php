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
            'Medewerkers' => $result
       ];

         /**
          * Met de view-method uit de BaseController-class wordt de view
          * aangeroepen met de informatie uit het $data-array
          */
       $this->view('Medewerkers/Index', $data); 
    }

    public function delete($Id)
    {
          $result = $this->MedewerkersModel->delete($Id);
          
          header('Refresh:3 ; url=' . URLROOT . '/Medewerkers/Index');

          $this->index('flex');
    }

     public function create()
    {
          $data = [
               'title' => 'Nieuwe medewerker toevoegen',
               'message' => 'none'
          ];

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
               if (empty($_POST['nummer']) || empty($_POST['medewerkersoort'])) {
                    echo '<div class="alert alert-danger text-center" role="alert"><h4>Vul alle velden in</h4></div>';
                    header('Refresh: 3; URL=' . URLROOT . '/Medewerkers/Create');
                    exit;
               }

               $data['message'] = 'flex';

               $this->MedewerkersModel->create($_POST);
               
               header('Refresh: 3; URL=' . URLROOT . '/Medewerkers/Index');
          }          

          $this->view('Medewerkers/Create', $data);
    }

    public function update($Id = NULL)
    {
          $data = [
               'title' => 'Wijzig de medewerker',
               'message' => 'none'
          ];

          if ($_SERVER['REQUEST_METHOD'] == "POST") 
          {
               $Id = $_POST['Id'];

               $result = $this->MedewerkersModel->updateMedewerker($_POST);

               $data['message'] = 'flex';

               header("Refresh:3 ; url=" . URLROOT . "/Medewerkers/Index");
          }

          $data['Medewerkers'] = $this->MedewerkersModel->getMedewerkerById($Id);


          $this->view('Medewerkers/Update', $data);
    }
}