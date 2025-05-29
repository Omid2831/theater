function generateRandomBarcode() {
        const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        let prefix = "";

        for (let i = 0; i < 3; i++) {
            prefix += letters.charAt(Math.floor(Math.random() * letters.length));
        }

        const randomDigits = Math.floor(100 + Math.random() * 900); // 100–999
        return prefix + randomDigits;
    }
    // Set barcode input value when the page loads
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("barcode").value = generateRandomBarcode();
    });