document
  .getElementById("updateForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const URLROOT = 'http://theater';
    const formData = new FormData(this);
    const ticketId = formData.get("Id");
    if (!ticketId) {
      showToast("danger", "Ticket ID ontbreekt. Kan niet bijwerken.");
      return;
    }

    await updateShow(URLROOT, ticketId, formData);

    showToast(type, message);
});

async function updateShow(URLROOT, ticketId, formData) {
  try {
    const response = await fetch(`${URLROOT}/tickets/update/${ticketId}`, {
      method: "POST",
      body: formData,
    });

    const result = await response.json();

    showToast(result.success ? "success" : "danger", result.message);

    if (result.success) {
      setTimeout(() => {
        window.location.href = `${URLROOT}/tickets/index`;
      }, 6000);
    }
  } catch (error) {
    showToast(
      "danger",
      "Er ging iets mis tijdens het bijwerken." + ' error:' + error
    );
  }
}

function showToast(type, message) {
  const toastEl = document.getElementById("toastBox");
  const toastBody = document.getElementById("toastBody");

  toastBody.textContent = message;
  toastEl.className = `toast align-items-center text-bg-${type} border-0`;
  const toast = new bootstrap.Toast(toastEl);
  toast.show();
}