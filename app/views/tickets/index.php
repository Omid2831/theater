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

<?php require_once APPROOT . '/views/includes/header.php'; ?>


<div class="container" style="margin-top: 15rem;">
    <div class="row">
        <!-- Left spacer - 2 columns -->
        <div class="col-md-2"></div>

        <!-- Main content area - 8 columns -->
        <div class="col-md-8">
            <h2 class="text-white mb-4 text-center">Overzicht van de tickets</h2>

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