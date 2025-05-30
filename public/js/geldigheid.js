function checkTicketValidity(datum, tijd) {
    const now = new Date();
    const eventDateTime = new Date(`${datum}T${tijd}`);
    const statusInput = document.getElementById('Status');

    if (!datum || !tijd) {
        statusInput.value = '----';
        statusInput.style.color = 'white';
        return;
    }

    const diffInMs = eventDateTime - now;
    const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

    if (eventDateTime < now) {
        statusInput.value = "Ongeldig: ticket is verlopen";
        statusInput.style.color = 'red';
    } else if (diffInDays > 30) {
        statusInput.value = "Ongeldig: ticket is te ver van de tijd";
        statusInput.style.color = 'orange';
    } else {
        statusInput.value = "Geldig: ticket is nu geldig!";
        statusInput.style.color = 'green';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const datum = document.getElementById('datum');
    const tijd = document.getElementById('tijd');

    function updateStatus() {
        checkTicketValidity(datum.value, tijd.value);
    }

    datum.addEventListener('input', updateStatus);
    tijd.addEventListener('input', updateStatus);

    // Initial check on load (in case values are pre-filled)
    updateStatus();
});
