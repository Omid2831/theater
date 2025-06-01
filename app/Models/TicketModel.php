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
            v.Naam AS Voorstelling,
            t.Barcode AS Opmerking,
            t.Tijd,
            t.Datum,
            t.Nummer AS Stoel,
            t.Status
            FROM Ticket t
            JOIN Voorstelling v ON t.VoorstellingId = v.Id
            ORDER BY t.Datum DESC, t.Tijd DESC";
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
}
