<?php require   APPROOT . '/views/includes/header.php'; ?>

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
                            <td><p class="text-center">Momenteel niet beschikbaar.</p></td>
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