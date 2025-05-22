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

}