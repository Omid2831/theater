<?php require_once APPROOT . '/config/config.php'; ?>

<link rel="stylesheet" href="<?= URLROOT ?>/css/footer.css">

<footer class="footer bg-dark text-light py-2 fixed-bottom">
    <div class="container-fluid px-4">
        <div class="d-flex flex-column align-items-center mx-auto" style="max-width: 600px;">
            <!-- Logo and Name -->
            <div class="d-flex align-items-center mb-2">
                <img src="/public/img/logo-theater.png" alt="Aurora Logo" width="32" height="32" class="me-2">
                <span class="fw-semibold">Aurora Theater</span>
            </div>

            <!-- Navigation -->
            <ul class="nav justify-content-center border-bottom pb-2 mb-2 w-100">
                <li class="nav-item"><a href="<?= URLROOT ?>/Home/index" class="nav-link px-2">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2">Contact</a></li>
            </ul>

            <!-- Copyright -->
            <p class="text-muted mb-0 small">&copy; <?= date("Y"); ?> Aurora, Ltd</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
