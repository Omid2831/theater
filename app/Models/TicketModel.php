<?php
class Ticket
{
    private $db;
     public function __construct()
    {
        $this->db = new Database();
        
    }
    public static function getTicketsForBezoeker($bezoekerId){
        
         require __DIR__ . '/../../config/database.php';

        $sql = "
            SELECT 
                 t.Id
                ,v.Naam AS Voorstelling
                ,t.Opmerking
                ,t.Tijd
                ,t.Datum
                ,t.Nummer AS Stoel
                ,t.Status
            FROM Ticket t
            JOIN Voorstelling v ON t.VoorstellingId = v.Id
            WHERE t.BezoekerId = ?
            ORDER BY t.Datum DESC, t.Tijd DESC
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$bezoekerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}