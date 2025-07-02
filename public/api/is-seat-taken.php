<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../app/Models/TicketModel.php'; // Adjust path as needed

header('Content-Type: application/json');

$voorstellingId = $_GET['voorstellingId'] ?? null;
$nummer = $_GET['nummer'] ?? null;

if ($voorstellingId === null || $nummer === null) {
    echo json_encode(['error' => 'Missing parameters']);
    exit;
}

$model = new TicketModel();
$isTaken = $model->isSeatTaken($voorstellingId, $nummer);

echo json_encode(['taken' => $isTaken]);