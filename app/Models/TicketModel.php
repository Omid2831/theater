<?php
class TicketModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    // get all tickets
    public function getAllTickets()
    {
        try {
            $sql = "SELECT
            t.Id AS Id,
            v.Naam AS Voorstelling,
            t.Barcode AS Opmerking,
            t.Tijd,
            t.Datum,
            t.Nummer AS Stoel,
            t.Status
            FROM Ticket t
            JOIN Voorstelling v ON t.VoorstellingId = v.Id
            ORDER BY t.Datum ASC, t.Tijd ASC, t.Nummer DESC";
            $this->db->query($sql);
            return $this->db->resultSet();
        } catch (PDOException $e) {
            error_log('getAllTickets error: ' . $e->getMessage());
            return [];
        }
    }

    // scan ticket by barcode
    public function findTicketByBarcode($barcode)
    {
        try {
            $sql = "SELECT
            t.Id AS TicketId,
            v.Naam AS Voorstelling,
            t.Barcode,
            v.beschrijving AS Opmerking,
            t.Status,
            t.Datum,
            t.Tijd,
            p.Tarief AS PrijsBedrag,
            p.opmerking AS PrijsOmschrijving
            FROM Ticket t
            JOIN Voorstelling v ON t.VoorstellingId = v.Id
            JOIN Prijs p ON t.PrijsId = p.Id
            WHERE t.Barcode = :barcode";
            $this->db->query($sql);
            $this->db->bind(':barcode', $barcode);
            return $this->db->single();
        } catch (PDOException $e) {
            error_log('findTicketByBarcode error: ' . $e->getMessage());
            return false;
        }
    }

    /* We gaan een functie maken om gegevens uit de database op te halen,
waarmee we een reserveringsformulier kunnen bouwen */

    public function create($data)
    {
        try {
            $sql = "INSERT INTO Ticket (VoorstellingId, PrijsId, Nummer, Barcode, Status, Datum, Tijd)
                VALUES (:voorstellingId, :prijsId, :nummer, :barcode, :status, :datum, :tijd)";
            $this->db->query($sql);
            $this->db->bind(':voorstellingId', $data['VoorstellingId']);
            $this->db->bind(':prijsId', $data['PrijsId'] ?? 1); // Default to 1 if missing
            $this->db->bind(':nummer', $data['Nummer']);
            $this->db->bind(':barcode', $data['Barcode']);
            $this->db->bind(':status', $data['Status'] ?? 'Actief'); // Default status
            $this->db->bind(':datum', $data['Datum']);
            $this->db->bind(':tijd', $data['Tijd']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log('Ticket creation failed: ' . $e->getMessage());
            return 'Error: ' . $e->getMessage();
        }
    }
    /* here we are comparing the data of seated ppl for the shows */
    public function isSeatTaken($voorstellingId, $nummer)
    {
        $sql = "SELECT COUNT(*) as count FROM Ticket WHERE VoorstellingId = :voorstellingId AND Nummer = :nummer";
        $this->db->query($sql);
        $this->db->bind(':voorstellingId', $voorstellingId);
        $this->db->bind(':nummer', $nummer);
        $row = $this->db->single();
        return $row && $row->count > 0;
    }

    /**
     * Deletes a ticket from the database by its ID.
     * @param mixed $Id
     * @return bool
     */
    public function delete($Id)
    {
        $sql = "DELETE 
                FROM Ticket
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    /**
     * Finds a ticket by its ID.
     * @param int $id The ID of the ticket to find.
     */
    public function findById($id)
    {
        try {
            $sql = 'SELECT * FROM Ticket WHERE Id = :Id';
            $this->db->query($sql);
            $this->db->bind(':Id', $id, PDO::PARAM_INT);
            return $this->db->single();
        } catch (PDOException $e) {
            error_log('findById error: ' . $e->getMessage());
            return false;
        }
    }
    /**
     * Update ticket details.
     * @param array $data
     * @return bool|string
     */

    public function updateTicket($data)
    {
        try {
            $sql = "UPDATE Ticket SET 
                VoorstellingId = :VoorstellingId,
                Barcode = :Barcode,
                PrijsId = :PrijsId,
                Nummer = :Nummer,
                Datum = :Datum,
                Tijd = :Tijd,
                Status = :Status
                WHERE Id = :Id";

            $this->db->query($sql);

            // Bind values
            $this->db->bind(':VoorstellingId', $data['VoorstellingId'], PDO::PARAM_INT);
            $this->db->bind(':Barcode', $data['Barcode'], PDO::PARAM_STR);
            $this->db->bind(':PrijsId', $data['PrijsId'], PDO::PARAM_INT);
            $this->db->bind(':Nummer', $data['Nummer'], PDO::PARAM_INT);
            $this->db->bind(':Datum', $data['Datum'], PDO::PARAM_STR);
            $this->db->bind(':Tijd', $data['Tijd'], PDO::PARAM_STR);
            $this->db->bind(':Status', $data['Status'], PDO::PARAM_STR);
            $this->db->bind(':Id', $data['Id'], PDO::PARAM_INT);

            return $this->db->execute();
        } catch (PDOException $e) {
            error_log("Update failed: " . $e->getMessage());
            return false;
        }
    }
}
