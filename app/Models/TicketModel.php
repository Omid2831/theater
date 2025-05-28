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

public function getTicketsById($Id)
{
    try {
        //  Select the ticket info, just the barcode 
        $sql = "SELECT Barcode FROM Ticket WHERE Id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $Id);
        $ticket = $this->db->single(); // Fetch ONE  barcode

        if (!$ticket) {
            error_log('getTicketsById: No ticket found with ID ' . $Id);
            return false; // No ticket found
        }

        //  Insert the ticket into Ticket again
        $sql = "INSERT INTO Ticket (
                    Voorstelling,
                    Barcode,
                    Tijd,
                    Datum,
                    Nummer,
                    Status
                ) VALUES (
                    :voorstelling,
                    :opmerking,
                    :tijd,
                    :datum,
                    :stoel,
                    :status
                )";
        $this->db->query($sql);

        // Step 3: Bind the actual values from the ticket
        $this->db->bind(':voorstelling', $ticket->VoorstellingId); // Adjust field name if needed
        $this->db->bind(':opmerking', $ticket->Barcode);
        $this->db->bind(':tijd', $ticket->Tijd);
        $this->db->bind(':datum', $ticket->Datum);
        $this->db->bind(':stoel', $ticket->Nummer);
        $this->db->bind(':status', $ticket->Status);

        // Step 4: Execute the insert
        return $this->db->execute();

    } catch (PDOException $e) {
        error_log('getTicketsById error: ' . $e->getMessage());
        return false;
    }
}

}