<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Scannen</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .scan-container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        .scanner-box {
            border: 2px dashed #ccc;
            border-radius: 8px;
            margin: 20px 0;
            padding: 10px;
        }
        .ticket-result {
            margin-top: 30px;
            padding: 20px;
            border-radius: 8px;
            background-color: #f1f8ff;
        }
        .status-badge {
            font-size: 1.1rem;
            padding: 8px 15px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="scan-container">
    
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
                    <p><strong>Voorstelling:</strong> <?= $data['ticket']->Voorstelling ?></p>
                    <p><strong>Datum:</strong> <?= date('d-m-Y', strtotime($data['ticket']->Datum)) ?></p>
                    <p><strong>Tijd:</strong> <?= date('H:i', strtotime($data['ticket']->Tijd)) ?></p>
                    <p><strong>Stoel:</strong> <?= $data['ticket']->Stoelnummer ?? 'N/A' ?></p>
                </div>
                
                <div class="status mt-3">
                    <span class="status-badge" style="background-color:<?= $data['statusColor'] ?? '#6c757d' ?>;color:white;">
                        <?= $data['message'] ?>
                    </span>
                </div>
                
                <?php if ($data['ticket']->Status === 'Actief'): ?>
                    <div class="mt-4">
                        <form method="POST" action="/tickets/validate">
                            <input type="hidden" name="barcode" value="<?= $data['ticket']->Barcode ?>">
                            <button type="submit" class="btn btn-success btn-lg">Valideren</button>
                        </form>
                    </div>
                <?php endif; ?>
                
                <div class="mt-3">
                    <button onclick="resetScanner()" class="btn btn-outline-secondary">Nieuwe Scan</button>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Stop the scanner
            html5QrcodeScanner.clear();
            
            // Submit form automatically when scan is successful
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '';
            
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'barcode';
            input.value = decodedText;
            
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
        
        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", 
            { 
                fps: 10, 
                qrbox: {width: 250, height: 250},
                formatsToSupport: [ Html5QrcodeSupportedFormats.CODE_128 ]
            },
            /* verbose= */ false);
        
        // Only show scanner if we don't have ticket data
        <?php if (!$data['ticket']): ?>
            html5QrcodeScanner.render(onScanSuccess);
        <?php endif; ?>
        
        function resetScanner() {
            document.getElementById('ticket-section').style.display = 'none';
            document.getElementById('scanner-section').style.display = 'block';
            html5QrcodeScanner.render(onScanSuccess);
        }
    </script>
</body>
</html>