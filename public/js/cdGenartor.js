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
document.addEventListener("DOMContentLoaded", function () {
  const barcodeInput = document.getElementById("barcode");
  if (barcodeInput) {
    barcodeInput.value = generateRandomBarcode();
  }
});

function generateBarcode() {
  if (typeof generateRandomBarcode === "function") {
    const barcode = generateRandomBarcode();
    const barcodeInput = document.getElementById("barcode");
    if (barcodeInput) {
      barcodeInput.value = barcode;
    }
  } else {
    alert("Barcode generator function not found.");
  }
}
