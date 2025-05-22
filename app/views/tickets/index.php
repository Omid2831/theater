<?php
require_once APPROOT . '/config/config.php';
require_once APPROOT . '/views/includes/b-header.php';
?>

<style>
    /* Custom styles to preserve your design */
    .navbar-aurora {
        background-color: #1a1a1a;
        border-bottom: 2px solid #e50914;
        padding: 10px 0;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        color: #f4f4f4 !important;
        font-weight: bold;
    }

    .navbar-brand img {
        height: 40px;
        margin-right: 10px;
    }

    .nav-link {
        color: #f4f4f4 !important;
        font-weight: bold;
        padding: 0.5rem 1rem !important;
    }

    .nav-link:hover {
        color: #e50914 !important;
    }

    .profile-icon {
        height: 24px;
        margin-left: 15px;
    }

    /* Add these new styles */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        z-index: 1030;
    }

    body {
        padding-top: 60px;
        /* To account for fixed navbar */
    }
</style>

<nav class="navbar navbar-expand-lg navbar-aurora fixed-top">
    <div class="container-fluid px-4"> <!-- Added px-4 for side padding -->
        <a class="navbar-brand" href="#">
            <img src="/public/img/logo-theater.png" alt="Aurora Logo">
            Aurora Theater
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/Medewerkers/index">Medewerkers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/Voorstellingen/index">Voorstellingen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/Tickets/index">Tickets</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <a class="nav-link" href="<?= URLROOT ?>/Accounts/login">Inloggen</a>
                <a href="<?= URLROOT ?>/Accounts/profiel">
                    <img src="/public/img/icon-profile.png" alt="Profiel" class="profile-icon">
                </a>
            </div>
        </div>
    </div>
</nav>


<div class="container" style="margin-top: 15rem;">
    <div class="row">
        <!-- Left spacer - 2 columns -->
        <div class="col-md-2"></div>

        <!-- Main content area - 8 columns -->
        <div class="col-md-8">
            <h2 class="text-info mb-4 text-center">Mijn Tickets</h2>

            <?php if (empty($data['tickets'])): ?>
                <div class="alert alert-info text-center">Geen tickets gevonden.</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Voorstelling</th>
                                <th>Code</th>
                                <th>Tijd</th>
                                <th>Datum</th>
                                <th>Stoel</th>
                                <th>Status</th>
                                <th>Scanbare Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['tickets'] as $tickets): ?>
                                <tr>
                                    <td><?= $tickets->Voorstelling; ?></td>
                                    <td>
                                        <?= $tickets->Opmerking ?>
                                    </td>
                                    <td><?= date('H:i', strtotime($tickets->Tijd)); ?></td>
                                    <td><?= date('d-m-Y', strtotime($tickets->Datum)); ?></td>
                                    <td><?= $tickets->Stoel; ?></td>
                                    <td>
                                        <span class="badge <?= $tickets->Status === 'Actief' ? 'bg-success' : 'bg-secondary' ?>">
                                            <?= $tickets->Status; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= URLROOT ?>/Tickets/scan?barcode=<?= $tickets->Opmerking ?>" class="btn btn-primary">Scan</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <!-- Right spacer - 2 columns -->
        <div class="col-md-2"></div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
<?php require_once APPROOT . '/views/includes/b-footer.php'; ?>