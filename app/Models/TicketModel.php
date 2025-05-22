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

}