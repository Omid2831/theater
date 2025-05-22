
<?php require   APPROOT . '/views/includes/header.php'; ?>

<style>
    body {
        background-color: #1a1a1a;
        color: #E8E8E8;
        font-family: 'Segoe UI', sans-serif;
    }
    .container {
        background-color: #2A3D45;
        border-radius: 12px;
        box-shadow: 0 0 30px rgba(0,0,0,0.4);
        padding: 30px;
        margin-top: 40px;
        color: #E8E8E8;
    }
    h3 {
        color: #C2B280;
        font-weight: bold;
    }
    .table {
        background-color: #2A3D45;
        color: #E8E8E8;
        border-radius: 8px;
        overflow: hidden;
    }
    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #1E2D2F;
    }
    .table th {
        background-color: #2A3D45;
        color: #C2B280;
        border-bottom: 2px solid #C2B280;
    }
    .table td {
        border-top: 1px solid #C2B280;
    }
    .text-center {
        color: #C2B280;
    }
    a {
        color: #C2B280;
        font-weight: bold;
        text-decoration: none;
    }
    a:hover {
        color: #E8E8E8;
        text-decoration: underline;
    }
    footer {
        background-color: #1E2D2F !important;
        color: #E8E8E8 !important;
    }
</style>
<div class="container mt-3">

    <div class="row">

        <div class="col-1"></div>
        <div class="col-10">        
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-1"></div>
    </div>
    <!-- begin tabel -->
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Beschrijving</th>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th>Maximaal aantal tickets</th>
                        <th>Beschikbaarheid</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['Voorstellingen'])): ?>
                        <?php foreach($data['Voorstellingen'] as $voorstelling) : ?>
                            <tr>
                                <td><?= $voorstelling->Naam; ?></td>
                                <td><?= $voorstelling->Beschrijving; ?></td>
                                <td><?= $voorstelling->Datum; ?></td>
                                <td><?= $voorstelling->Tijd; ?></td>
                                <td><?= $voorstelling->MaxAantalTickets; ?></td>
                                <td><?= $voorstelling->Beschikbaarheid; ?></td>
                            </tr>
                        <?php endforeach ?> 
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><p class="text-center">Momenteel niet beschikbaar.</p></td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="col-1"></div>
    </div>
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>