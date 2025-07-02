async function checkSeatTaken(voorstellingId, nummer) {
  const response = await fetch(
    `/api/is-seat-taken.php?voorstellingId=${encodeURIComponent(
      voorstellingId
    )}&nummer=${encodeURIComponent(nummer)}`
  );
  
  const data = await response.json();
  return data.taken; // true or false
}
function checkTicketValidity(datum, tijd) {
  const now = new Date();
  const eventDateTime = new Date(`${datum}T${tijd}`);
  const statusInput = document.getElementById("Status");

  if (!datum || !tijd) {
    statusInput.value = "----";
    statusInput.style.color = "white";
    return false;
  }

  const diffInMs = eventDateTime - now;
  const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

  if (eventDateTime < now) {
    statusInput.value = "Ongeldig: ticket is verlopen";
    statusInput.style.color = "red";
    return false;
  } else if (diffInDays > 30) {
    statusInput.value = "Ongeldig: ticket is te ver van de tijd";
    statusInput.style.color = "orange";
    return false;
  } else {
    statusInput.value = "Geldig: ticket is nu geldig!";
    statusInput.style.color = "green";
    return true;
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const datum = document.getElementById("datum");
  const tijd = document.getElementById("tijd");
  const stoel = document.getElementById("stoel");
  const voorstelling = document.getElementById("VoorstellingId");
  const statusInput = document.getElementById("Status");

  async function updateStatus() {
    // First, check date/time validity
    const isValid = checkTicketValidity(datum.value, tijd.value);
    console.log(isValid);
    if (!isValid) return;

    // Then, check if seat is taken (only if all fields are filled)
    const voorstellingId = voorstelling.value;
    const stoelNummer = stoel.value;
    if (voorstellingId && stoelNummer) {
      const isTaken = await checkSeatTaken(voorstellingId, stoelNummer);
      if (isTaken) {
        statusInput.value = "Ongeldig: stoel is al gereserveerd";
        statusInput.style.color = "warning";
      }
    }
  }

  datum.addEventListener("input", updateStatus);
  tijd.addEventListener("input", updateStatus);
  stoel.addEventListener("input", updateStatus);
  voorstelling.addEventListener("input", updateStatus);

  // Initial check on load (in case values are pre-filled)
  updateStatus();
});
