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
    }

    // scan ticket by barcode

    public function findTicketByBarcode($barcode)
    {
        $sql = "SELECT
        t.Id,
        v.Naam AS Voorstelling,
        t.Barcode,
        t.Status,
        t.Datum,
        t.Tijd
    FROM Ticket t
    JOIN Voorstelling v ON t.VoorstellingId = v.Id
    WHERE t.Barcode = :barcode";
        $this->db->query($sql);
        $this->db->bind(':barcode', $barcode);
        return $this->db->single();
    }
}