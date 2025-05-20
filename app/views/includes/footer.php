<?php require_once APPROOT . '/config/config.php'; ?>

<link rel="stylesheet" href="<?= URLROOT ?>/css/footer.css">

<footer class="footer mt-auto py-4">
    <div class="container text-center">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <img src="/public/img/logo-theater.png" alt="Aurora Logo" width="40" height="40" class="me-2">
            <span class="fw-semibold">Aurora Theater</span>
        </div>

        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="<?= URLROOT ?>/Home/index" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
        </ul>

        <p class="text-muted">&copy; <?= date("Y"); ?> Aurora, Ltd. Alle rechten voorbehouden.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</footer>
