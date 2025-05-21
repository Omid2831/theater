<?php

class Tickets extends BaseController
{

    public function index($firstname = NULL, $infix = NULL, $lastname = NULL)
    {
        // // start de sessie
        // session_start();

        // // check of de bezoeker is ingelogd
        if (!isset($_SESSION['bezoeker'])) {
            // als de bezoeker niet is ingelogd, wordt hij doorgestuurd naar de inlogpagina
            header('Location: ' . URLROOT . '/bezoekers/login');
            exit();
        }
           
        $bezoekerId = $_SESSION['bezoeker_id'];

        // Load the Ticket model and fetch tickets for this bezoeker
        require_once APPROOT . '/Models/TicketModel.php';
        $tickets = Ticket::getTicketsForBezoeker($bezoekerId);
        
        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Mijn Tickets',
            'tickets' => $tickets, // Uncomment this line if you want to pass tickets to the view
        ];
        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('tickets/index', $data);
        
    }

}