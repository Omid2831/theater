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
            //  voorstelling
            $sqlVoorstelling = "SELECT Id FROM Voorstelling WHERE Naam = :naam";
            $this->db->query($sqlVoorstelling);
            $this->db->bind(':naam', $data['voorstelling']);
            $voorstelling = $this->db->single();

            if (!$voorstelling) {
                // Create new voorstelling if it doesn't exist
                $sqlNewVoorstelling = "INSERT INTO Voorstelling 
                                  ( Naam, Beschrijving, Datum, Tijd, MaxAantalTickets, Beschikbaarheid, IsActief, DatumAangemaakt, DatumGewijzigd)
                                  VALUES 
                                  ( :naam, :beschrijving, :datum, :tijd, 100, '40', 1, NOW(), NOW())";

                $this->db->query($sqlNewVoorstelling);
                $this->db->bind(':naam', $data['voorstelling']);
                $this->db->bind(':beschrijving', $data['beschrijving']);
                $this->db->bind(':datum', $data['datum']);
                $this->db->bind(':tijd', $data['tijd']);
                $this->db->execute();

                $voorstellingId = $this->db->lastInsertId();
            } else {
                $voorstellingId = $voorstelling->Id;
            }

            // Now insert the ticket with the proper foreign keys
            $sqlTicket = "INSERT INTO Ticket (
                     BezoekerId,
                     VoorstellingId,
                     PrijsId,
                     Barcode,
                     Tijd,
                     Datum,
                     Nummer,
                     Status,
                     IsActief,
                     DatumAangemaakt,
                     DatumGewijzigd
                     ) VALUES (
                     1,  
                     :voorstellingId,
                     1,  
                     :barcode,
                     :tijd,
                     :datum,
                     :nummer,
                     'Geboekt',
                     1,
                     NOW(),
                     NOW()
                     )";

            $this->db->query($sqlTicket);
            $this->db->bind(':voorstellingId', $voorstellingId);
            $this->db->bind(':barcode', $data['barcode']);
            $this->db->bind(':tijd', $data['tijd']);
            $this->db->bind(':datum', $data['datum']);
            $this->db->bind(':nummer', $data['Nummer']);

            return $this->db->execute();
        } catch (PDOException $e) {
            error_log('Ticket creation error: ' . $e->getMessage());
            return false;
        }
    }
}
