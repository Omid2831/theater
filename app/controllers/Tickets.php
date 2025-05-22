<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Tickets extends BaseController
{
    private $ticketModel;
    public function __construct()
    {
        $this->ticketModel = $this->model('TicketModel');
    }
    public function index($firstname = NULL, $infix = NULL, $lastname = NULL)
    {


        $result = $this->ticketModel->getAllTickets();
        $data = [
            'title' => 'Overzicht Tickets',
            'tickets' => $result,

        ];

        $this->view('tickets/index', $data);
    }

    public function scan()
    {
        $result = null;
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $barcode = trim($_POST['barcode']);
            $result = $this->ticketModel->findTicketByBarcode($barcode);

            if (!$result) {
                $error = "Geen ticket gevonden met deze barcode.";
            }
        }

        $this->view('tickets/scan', [
            'title' => 'Ticket Scannen',
            'ticket' => $result,
            'error' => $error
        ]);
    }
}
