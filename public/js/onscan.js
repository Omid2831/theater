// This function is triggered after a barcode is successfully scanned.
        function onScanSuccess(decodedText) {
            document.getElementById('barcode-input').value = decodedText;
            document.getElementById('barcode-form').submit();
        }
            // start the scanner
            const scanner = new Html5QrcodeScanner('reader', {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                },
                formatsToSupport: [Html5QrcodeSupportedFormats.CODE_128]
            });
            scanner.render(onScanSuccess);