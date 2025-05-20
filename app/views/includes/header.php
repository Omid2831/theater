<?php session_start(); ?>
<?php require_once APPROOT . '/config/config.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= URLROOT ?>/css/footer.css">

<nav class="navbar navbar-expand-lg header-navbar fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <a class="navbar-brand d-flex align-items-center" href="<?= URLROOT ?>/Home/index">
            <img src="<?= URLROOT ?>/img/theater.png" alt="Logo" width="40" height="40" class="me-2">
        </a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/Home/index">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/Medewerkers/index">Medewerkers</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/Voorstellingen/index">Voorstellingen</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= URLROOT ?>/Ticket/index">Ticket</a></li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= URLROOT ?>/img/pngegg.png" alt="Profiel" class="me-2" width="30" height="30">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                            <li><a class="dropdown-item" href="<?= URLROOT ?>/Profiel/index">Profiel</a></li>
                            <li><a class="dropdown-item" href="<?= URLROOT ?>/navbar/uitloggen.php">Uitloggen</a></li>
                        <?php else: ?>
                            <li><a class="dropdown-item" href="<?= URLROOT ?>/inloggen/inloggen.php">Inloggen</a></li>
                            <li><a class="dropdown-item" href="<?= URLROOT ?>/signup/signup.php">Registreren</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
