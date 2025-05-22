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
        $ticket = null;
        $status = '';
        $message = '';

        // Get barcode from GET or POST
        $barcode = $_GET['barcode'] ?? ($_POST['barcode'] ?? '');

        if ($barcode) {
            $ticket = $this->ticketModel->findTicketByBarcode($barcode);

            if ($ticket) {
                $now = new DateTime();
                $eventDateTime = new DateTime($ticket->Datum . ' ' . $ticket->Tijd);

                if ($now < $eventDateTime) {
                    $status = 'yellow';
                    $message = "Voorstelling is op " . $eventDateTime->format('d-m-Y H:i');
                } elseif ($now > $eventDateTime) {
                    $status = 'red';
                    $message = "Ongeldig: ticket is verlopen";
                } else {
                    $status = 'green';
                    $message = "Geldig: ticket is nu geldig!";
                }
            } else {
                $status = 'red';
                $message = "Geen ticket gevonden met deze barcode.";
            }
        }

        $this->view('tickets/scan', [
            'ticket' => $ticket,
            'status' => $status,
            'message' => $message,
            'barcode' => $barcode
        ]);
    }
}