<?php require_once APPROOT . '/config/config.php'; ?>

<link rel="stylesheet" href="<?= URLROOT ?>/css/footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<footer class="footer py-4 bg-dark text-light position-relative bottom-0">
    <div class=" text-center">
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center mb-3 gap-3">
            <img src="/public/img/logo-theater.png" alt="Aurora Logo" width="48" height="48" class="me-2">
            <span class="fw-bold fs-4">Aurora Theater</span>
        </div>

        <ul class="nav justify-content-center border-bottom border-secondary pb-3 mb-3">
            <li class="nav-item"><a href="<?= URLROOT ?>/Home/index" class="nav-link px-2 text-light">Home</a></li>
            <li class="nav-item"><a href="<?= URLROOT ?>/Medewerkers/index" class="nav-link px-2 text-light">Voorstellingen</a></li>
            <li class="nav-item"><a href="<?= URLROOT ?>/tickets/index" class="nav-link px-2 text-light">Tickets</a></li>
        </ul>

        <div class="mb-3">
            <a href="#" class="text-light me-3" aria-label="Facebook"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="#" class="text-light me-3" aria-label="Instagram"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#" class="text-light me-3" aria-label="Twitter"><i class="fab fa-twitter fa-lg"></i></a>
            <a href="#" class="text-light" aria-label="YouTube"><i class="fab fa-youtube fa-lg"></i></a>
        </div>

        <p class="text-white mb-0">&copy; <?= date("Y"); ?> Aurora Theater. Alle rechten voorbehouden.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</footer>