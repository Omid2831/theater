<?php
require_once APPROOT . '/config/config.php';
require_once APPROOT . '/views/includes/b-header.php';
require_once APPROOT . '/views/includes/header.php';
?>

<body style="background-color: #2a3d45; color: white;">
    <div class="container" style="margin-top: 15rem;">
        <div class="row">
            <!-- Left spacer - 2 columns -->
            <div class="col-md-2"></div>

            <!-- Main content area - 8 columns -->
            <div class="col-md-8">
                <h2 class="text-white mb-4 text-center">Overzicht van de tickets</h2>
                <div class="col-10 text-begin mb-3 text-dark" style="position: relative; right: 12rem;">
                    <a href="<?= URLROOT ?>/tickets/create" class="btn btn-danger" style="background-color:rgb(121, 6, 13) ;" role="button">ReserveringsPlan</a>
                </div>
                <?php if (empty($data['tickets'])): ?>
                    <div class="alert alert-info text-center">Geen tickets gevonden.</div>
                <?php else: ?>
                    <div class="table-responsive">

                        <div class="mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Zoek op voorstelling...">
                        </div>
                        <div id="notFoundMsg" class="alert alert-warning text-center" style="display:none;">
                            Niet gevonden naam
                        </div>
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
</body>


<?php require APPROOT . '/views/includes/footer.php'; ?>
<?php require_once APPROOT . '/views/includes/b-footer.php'; ?>

<script src="/public/js/searchbar.js"></script>