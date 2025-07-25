
<?php require_once   APPROOT . '/views/includes/b-header.php'; ?>
<?php require_once   APPROOT . '/views/includes/header.php'; ?>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->


<div class="container" style="margin-top: 15rem;">

    <div class="row">

        <div class="col-1"></div>
        <div class="col-10 text-danger">     
            <br>   
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row mt-3 mb-3">

        <div class="col-1"></div>
        <div class="col-10 text-begin text-danger">
            <a href="<?= URLROOT; ?>/Voorstellingen/Create" class="btn btn-danger" role="button">Nieuwe voorstelling</a>
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
                        <th>Update</th>
                        <th>Delete</th>
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
                                <td>
                                    <a href="<?= URLROOT; ?>/voorstellingen/Update/<?= $voorstelling->Id; ?>">
                                        <i class="bi bi-pencil-square text-success"></i>
                                    </a>
                                </td>
                                    <td>
                                    <a href="<?= URLROOT; ?>/voorstellingen/delete/<?= $voorstelling->Id; ?>">
                                        <i class="bi bi-trash3-fill text-danger"></i>
                                    </a>
                                </td>
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
</div>
    <!-- eind tabel -->


