<?php
class Tickets extends BaseController
{
    private $ticketModel;
    private $voorstellingen;
    public function __construct()
    {
        $this->ticketModel = $this->model('TicketModel');
        $this->voorstellingen = $this->model('VoorstellingenModel');
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize and collect POST data

            $data = [
                'VoorstellingId' => $_POST['VoorstellingId'] ?? '',
                'Nummer'         => $_POST['Nummer'] ?? '',
                'Datum'          => $_POST['datum'] ?? '',
                'Tijd'           => $_POST['tijd'] ?? '',
                'Barcode'        => $_POST['barcode'] ?? '',
                'Status'         => $_POST['Status'] ?? '',
                'PrijsId'        => 1, // Or get from form if needed
                'title'          => 'Ticket Aanmaken',
                'vo'             => $this->voorstellingen->GetAllVoorstellingen(),
                'success_message' => '',
                'error'          => ''
            ];

            // Check if seat is already taken for this show
            $seatTaken = $this->ticketModel->isSeatTaken($data['VoorstellingId'], $data['Nummer']);

            if ($seatTaken) {
                $data['error'] = 'Geen besckbaarheid';
                $this->view('tickets/create', $data);
                return;
            }

            // Try to create the ticket
            if ($this->ticketModel->create($data) && $this->voorstellingen->GetAllVoorstellingen()) {
                $data['success_message'] = 'Uw bezoek is succesvol gereserveerd';
                header('Refresh: 3; URL=' . URLROOT . '/tickets/index');
                $this->view('tickets/create', $data);
                return;
            } else {
                // Debug if there is a situation to see what happend and want to debug it!
                echo "<pre>";
                var_dump($this->ticketModel->getError());
                echo "</pre>";
                die();
            }
        }

        // GET: show form
        $result = $this->voorstellingen->GetAllVoorstellingen();
        $data = [
            'title' => 'Ticket Aanmaken',
            'vo' => $result,
        ];
        $this->view('tickets/create', $data);
    }
}
