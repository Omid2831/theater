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
    public function index($message = 'none')
    {
        $data = [
            'title' => 'Overzicht Tickets',
            'tickets' => $this->ticketModel->getAllTickets(),
            'message' => $message,
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

    public function create($sms = 'none', $error = 'none')
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collect POST data
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
                'success_message' => $sms,
                'error'          => $error,
            ];



            // Check if seat is already taken for this show
            $seatTaken = $this->ticketModel->isSeatTaken($data['VoorstellingId'], $data['Nummer']);
            if ($seatTaken) {
                $data['error'] = 'Geen beschikbaarheid';
                header('Refresh:3; URL=' . URLROOT . '/tickets/create');
                $this->view('tickets/create', $data);
                return;
            }

            if ($this->voorstellingen->GetAllVoorstellingen() && $this->ticketModel->create($data)) {

                // Validate time format (HH:MM)
                if (empty($data['Tijd']) || !preg_match('/^\d{1,2}:\d{2} ?(AM|PM)?$/i', $data['Tijd'])) {
                    $data['error'] = 'Ongeldige tijd ingevoerd. Gebruik het formaat HH:MM AM/PM.';
                    error_log('Invalid tijd format: ' . $data['Tijd']); // Debugging log
                    $this->view('tickets/create', $data);
                    return;
                }



                // Parse and validate time
                $parsedTime = strtotime($data['Tijd']);
                $hour = (int)date('H:i A', $parsedTime); // Extract the hour in 24-hour format (0–23)

                //  validate time
                $eventDateTime = new DateTime($data['Datum'] . ' ' . $data['Tijd']);
                $now = new DateTime();
                $diffInDays = $now->diff($eventDateTime)->days;
                // Check if time is between 11:00 PM and 10:00 AM
                if ($hour < 10 || $hour >= 23) {
                    $data['error'] = 'Helaas, we zijn gesloten tussen 11:00 PM en 10:00 AM.';
                    header('Refresh:3; URL=' . URLROOT . '/tickets/create');
                    $this->view('tickets/create', $data);
                    return;
                } elseif ($diffInDays > 30) {
                    $data['error'] = 'Ongeldig: ticket is te ver van de tijd.';
                    header('Refresh:3; URL=' . URLROOT . '/tickets/create');
                    $this->view('tickets/create', $data);
                    return;
                }

                // If all checks pass, show success message
                $data['success_message'] = 'Uw reservering is succesvol voltooid. Bedankt!';
                header('Refresh:3; URL=' . URLROOT . '/tickets/index');
                $this->view('tickets/create', $data);
                return;
            }
        }

        // GET: Show form
        $result = $this->voorstellingen->GetAllVoorstellingen();
        $data = [
            'title' => 'Ticket Aanmaken',
            'vo' => $result,
            'success_message' => $sms,
            'error' => $error,
        ];
        $this->view('tickets/create', $data);
    }
    /**
     * Summary of delete
     * Deletes a ticket. This functionality is triggered when the delete button is pressed.
     * @return void
     */
    public function delete($Id)
    {
        $this->ticketModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/tickets/index');

        $this->index('flex');
    }

    /**
     * Updates a ticket. This functionality is triggered when the update button is pressed.
     * @param string $error
     * @param string $success_message
     * @param int|null $Id
     * @return void
     */

   public function update($Id = null, $error = 'none', $message = 'none')
{
    $ticket = $this->ticketModel->findById($Id);

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $data = [
            'title' => 'Ticket Wijzigen',
            'ticket' => $ticket,
            'vo' => $this->voorstellingen->getAllVoorstellingen(),
            'error' => $error,
            'message' => $message
        ];
        $this->view('tickets/update', $data);
        return;
    }

    // POST Request Handling
    $data = [
        'title' => 'Ticket Wijzigen',
        'vo' => $this->voorstellingen->getAllVoorstellingen(),
        'error' => '',
        'message' => '',
        'Id' => trim($_POST['Id'] ?? ''),
        'VoorstellingId' => trim($_POST['VoorstellingId'] ?? ''),
        'Barcode' => trim($_POST['Barcode'] ?? ''),
        'Datum' => trim($_POST['datum'] ?? ''),
        'Tijd' => trim($_POST['tijd'] ?? ''),
        'Nummer' => trim($_POST['Nummer'] ?? ''),
        'Status' => trim($_POST['Status'] ?? ''),
        'PrijsId' => 1,
    ];

    // TIME FORMAT VALIDATION
    if (empty($data['Tijd']) || !preg_match('/^\d{1,2}:\d{2} ?(AM|PM)?$/i', $data['Tijd'])) {
        $data['error'] = 'Ongeldige tijd ingevoerd. Gebruik het formaat HH:MM AM/PM.';
        return $this->showError($data);
    }

    $parsedTime = strtotime($data['Tijd']);
    if ($parsedTime === false) {
        $data['error'] = 'Kon tijd niet verwerken.';
        return $this->showError($data);
    }

    $hour = (int)date('H', $parsedTime);
    if ($hour < 10 || $hour >= 23) {
        $data['error'] = 'Helaas, we zijn gesloten tussen 11:00 PM en 10:00 AM.';
        return $this->showError($data);
    }

    // SEAT TAKEN VALIDATION
    if ($this->ticketModel->isSeatTaken($data['VoorstellingId'], $data['Nummer'])) {
        $data['error'] = 'Stoel is al bezet.';
        return $this->showError($data);
    }

    // CHECK FOR CHANGES
    $originalTicket = $this->ticketModel->findById($data['Id']);
    $fieldsToCheck = ['VoorstellingId', 'Barcode', 'Datum', 'Tijd', 'Nummer'];
    $changed = false;
    foreach ($fieldsToCheck as $field) {
        if ($originalTicket->$field != $data[$field]) {
            $changed = true;
            break;
        }
    }

    if (!$changed) {
        $data['error'] = 'Geen wijzigingen aangebracht.';
        return $this->showError($data);
    }

    // PERFORM UPDATE
    if ($this->ticketModel->updateTicket($data)) {
        $data['message'] = 'Ticket succesvol bijgewerkt.';
        header('Refresh:3; URL=' . URLROOT . '/tickets/index');
    } else {
        $data['error'] = 'Er is een fout opgetreden bij het bijwerken van het ticket.';
    }

    $this->view('tickets/update', $data);
}

// Helper method
private function showError($data)
{
    header('Refresh:3; URL=' . URLROOT . '/tickets/update/' . $data['Id']);
    $this->view('tickets/update', $data);
    return;
}

}
