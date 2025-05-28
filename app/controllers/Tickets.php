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
                     $status = 'green';
                    $message = "Geldig: ticket is nu geldig!";
                } elseif ($now > $eventDateTime) {
                    $status = 'red';
                    $message = "Ongeldig: ticket is verlopen";
                } else {
                    $status = 'red';
                    $message = "Geen ticket gevonden met deze barcode.";
                }
            }
        }
        // setting defualt values if no tickets found
        $data =[
            'ticket' => $ticket,
            'status' => $status,
            'message' => $message,
            'barcode' => $barcode
        ];
        $this->view('tickets/scan', $data);
    }
    /**
     * Hier zijn we bezig met het maken van een ticket om te kunnen reserveren door middel van de max en de min beschikbare stoelen
     * @return void
     */
    
    public function create()
    {
        $data = [
            'title' => 'Ticket Aanmaken',
            'message' => '',
        ];
         if ($_SERVER["REQUEST_METHOD"] == "POST") {

               if (empty($_POST['naam']) || empty($_POST['barcode']) || empty($_POST['datum']) || empty($_POST['tijd']) || empty($_POST['stoel'])) {
                    echo '<div class="alert alert-danger text-center" role="alert"><h4>Vul alle velden in</h4></div>';
                    header('Refresh: 3; URL=' . URLROOT . '/tickets/create');
                    exit;
               }

               $data['message'] = 'flex';
               $this->ticketModel->create($_POST);
               header('Refresh: 3; URL=' . URLROOT . '/tickets/index');
          }          
        $this->view('tickets/create', $data);
    }
}