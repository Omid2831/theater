<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Scannen</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/scan.css">
</head>

<body>
    <div class="scan-container">
        
        <form id="barcode-form" method="POST" style="display:none;">
            <input type="hidden" name="barcode" id="barcode-input">
        </form>
        <!-- Ticket Results (hidden until scan) -->
        <?php if ($data['ticket']): ?>
            <div id="ticket-section" class="ticket-result">
                <h3 class="mb-3">Ticket Details</h3>
                <div class="barcode-container mb-3">
                    <img src="https://barcode.tec-it.com/barcode.ashx?data=<?= urlencode($data['ticket']->Barcode) ?>&code=Code128&translate-esc=off"
                        alt="<?= $data['ticket']->Barcode ?>"
                        style="height:60px; max-width:100%;">
                    <p><?= $data['ticket']->Barcode ?></p>
                </div>
                <div class="ticket-details">
                    <p><strong>Ticket Nummer:</strong> <?= $data['ticket']->TicketId ?? 'N/A' ?></p>
                    <p><strong>Voorstelling:</strong> <?= $data['ticket']->Voorstelling ?></p>
                    <p><strong>Opmerking:</strong> <?= $data['ticket']->Opmerking ?? 'N/A' ?></p>
                    <p><strong>Datum:</strong> <?= date('d-m-Y', strtotime($data['ticket']->Datum)) ?></p>
                    <p><strong>Tijd:</strong> <?= date('H:i', strtotime($data['ticket']->Tijd)) ?></p>
                    <p><strong>Prijs:</strong> €<?= number_format($data['ticket']->PrijsBedrag, 2) ?></p>
                    <p><strong>Prijsomschrijving:</strong> <?= $data['ticket']->PrijsOmschrijving ?? 'N/A' ?></p>
                </div>

                <div class="status mt-3">
                    <span class="status-badge" style="background-color:<?= $data['statusColor'] ?? '#6c757d' ?>;color:white;">
                        <?= $data['message'] ?>
                    </span>
                </div>
                <!-- Validation Button -->
                <?php if ($data['ticket']->Status === 'Actief'): ?>
                    <div class="mt-4">
                        <form method="POST" action="/tickets/validate">
                            <input type="hidden" name="barcode" value="<?= $data['ticket']->Barcode ?>">
                            <button type="submit" class="btn btn-success btn-lg">Valideren</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/onscan.js"></script>
</body>

</html>