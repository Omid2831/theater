<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<footer class="bg-dark text-light w-100  position-relative" style="top:2rem;" >
  <div class="container-fluid text-center">
    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center mb-3 gap-3">
      <img src="/public/img/logo-theater.png" alt="Aurora Theater Logo" width="48" height="48">
      <h5 class="mb-0 fw-bold">Aurora Theater</h5>
    </div>

    <ul class="nav justify-content-center mb-3">
      <li class="nav-item"><a href="<?= URLROOT ?>/Home/index" class="nav-link text-light px-3">Home</a></li>
      <li class="nav-item"><a href="<?= URLROOT ?>/Medewerkers/index" class="nav-link text-light px-3">Voorstellingen</a></li>
      <li class="nav-item"><a href="<?= URLROOT ?>/tickets/index" class="nav-link text-light px-3">Tickets</a></li>
    </ul>

    <div class="mb-3">
      <a href="#" class="text-light me-3" aria-label="Facebook"><i class="fab fa-facebook fa-lg"></i></a>
      <a href="#" class="text-light me-3" aria-label="Instagram"><i class="fab fa-instagram fa-lg"></i></a>
      <a href="#" class="text-light me-3" aria-label="Twitter"><i class="fab fa-twitter fa-lg"></i></a>
      <a href="#" class="text-light" aria-label="YouTube"><i class="fab fa-youtube fa-lg"></i></a>
    </div>

    <hr class="border-secondary" />

    <p class="mb-0 text-secondary small">&copy; <?= date("Y"); ?> Aurora Theater. Alle rechten voorbehouden.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>