<?php
class TicketModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTickets()
    {
        $sql = "SELECT
         v.Naam AS Voorstelling,
         t.Opmerking,
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
}
