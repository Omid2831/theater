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
        $data = [
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Initialize data array
            $data = [
                'title' => 'Ticket Aanmaken',
                'voorstelling' => trim($_POST['voorstelling']),
                'beschrijving' => trim($_POST['beschrijving']),
                'barcode' => trim($_POST['barcode']),
                'datum' => trim($_POST['datum']),
                'tijd' => trim($_POST['tijd']),
                'Nummer' => trim($_POST['Nummer']),
            ];

            // Validate empty fields
            if (
                empty($data['voorstelling']) ||
                empty($data['beschrijving']) ||
                empty($data['barcode']) ||
                empty($data['datum']) ||
                empty($data['tijd']) ||
                empty($data['Nummer'])
            ) {
                $data['error'] = '<div class="alert alert-danger text-center" role="alert"><h2>Vul alle velden in</h2></div>';
                $this->view('tickets/create', $data);
                return;
            }

            // Additional validation (example - validate seat number is numeric)
            if (!is_numeric($data['Nummer'])) {
                $data['error'] = '<div class="alert alert-danger text-center" role="alert"><h2>Ongeldig stoelnummer</h2></div>';
                $this->view('tickets/create', $data);
                return;
            }

            // Try to create the ticket
            if ($this->ticketModel->create($data)) {
                // Success - show success message and redirect
                $_SESSION['success_message'] = 'Ticket succesvol aangemaakt!';
                header('Location: ' . URLROOT . '/tickets/index');
                exit;
            } else {
                // Database error
                $data['error'] = '<div class="alert alert-danger">Fout bij aanmaken ticket</div>';
                $this->view('tickets/create', $data);
            }
        }
        // GET request - just show the form
        $data = [
            'title' => 'Ticket Aanmaken',
            'message' => '',
        ];
        $this->view('tickets/create', $data);
    }
}
