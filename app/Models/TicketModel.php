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
            JOIN Prijs p ON t.PrijsId = p.Id            WHERE t.Barcode = :barcode";
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

    public function getTicketsById($data)
    {
        try {
            $sql = "INSERT INTO Ticket (
                    VoorstellingId,
                    Barcode,
                    Tijd,
                    Datum,
                    Nummer,
                    Status
                )
                VALUES (
                    :voorstellingId,
                    :barcode,
                    :tijd,
                    :datum,
                    :nummer,
                    :status
                )";

            $this->db->query($sql);
            $this->db->bind(':voorstellingId', $data['voorstellingId']);
            $this->db->bind(':barcode', $data['barcode']);
            $this->db->bind(':tijd', $data['tijd']);
            $this->db->bind(':datum', $data['datum']);
            $this->db->bind(':nummer', $data['nummer']);
            $this->db->bind(':status', $data['status']);
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            error_log('insertTicket error: ' . $e->getMessage());
            return false;
        }
    }
}
