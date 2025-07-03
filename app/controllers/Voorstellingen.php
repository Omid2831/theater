<?php

class Voorstellingen extends BaseController
{
    private $VoorstellingenModel;

    public function __construct()
    {
         $this->VoorstellingenModel = $this->model('VoorstellingenModel');
    }

    public function index()
    {
       /**
        * Hier halen we alle voorstellingen op uit de database
        */
       $result = $this->VoorstellingenModel->getAllVoorstellingen();
       
       /**
        * Het $data-array geeft informatie mee aan de view-pagina
        */
       $data = [
            'title' => 'Op dit moment beschikbare voorstellingen.',
            'Voorstellingen' => $result
       ];

         /**
          * Met de view-method uit de BaseController-class wordt de view
          * aangeroepen met de informatie uit het $data-array
          */
       $this->view('Voorstellingen/Index', $data); 
    }

    public function delete($Id)
    {
          $result = $this->VoorstellingenModel->delete($Id);
          
          header('Refresh:3 ; url=' . URLROOT . '/voorstellingen/Index');

          $this->index('flex');
    }

     public function create()
    {
          $data = [
               'title' => 'Nieuwe voorstelling toevoegen',
               'message' => 'none'
          ];

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
               if (empty($_POST['naam']) || empty($_POST['beschrijving']) || empty($_POST['datum']) || empty($_POST['tijd']) || empty($_POST['maxaantaltickets']) || empty($_POST['beschikbaarheid'])) {
                    echo '<div class="alert alert-danger text-center" role="alert"><h4>Vul alle velden in</h4></div>';
                    echo $_POST['datum'];
                    header('Refresh: 3; URL=' . URLROOT . '/Voorstellingen/Create');
                    exit;
               }
               $currentDate = date("YYYY-MM-DD");
               $selectedDate = $_POST['datum'].strtotime("YYYY-MM-DD");
               if ($currentDate <= $_POST['datum'])
               {
                    echo '<div class="alert alert-danger text-center" role="alert"><h4>Datum is al geweest</h4></div>';
                    header('Refresh: 3; URL=' . URLROOT . '/Voorstellingen/Create');
                    exit;
               }

               $data['message'] = 'flex';

               $this->VoorstellingenModel->create($_POST);
               
               header('Refresh: 3; URL=' . URLROOT . '/Voorstellingen/Index');
          }          

          $this->view('Voorstellingen/Create', $data);
    }

    public function update($Id = NULL)
    {
          $data = [
               'title' => 'Wijzig de voorstelling',
               'message' => 'none'
          ];

          if ($_SERVER['REQUEST_METHOD'] == "POST") 
          {
               $Id = $_POST['Id'];

               $result = $this->VoorstellingenModel->updateVoorstelling($_POST);

               $data['message'] = 'flex';

               header("Refresh:3 ; url=" . URLROOT . "/voorstellingen/Index");
          }

          $data['Voorstellingen'] = $this->VoorstellingenModel->getVoorstellingById($Id);


          $this->view('voorstellingen/Update', $data);
    }


}