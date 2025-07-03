<<<<<<< HEAD
<?php require   APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<div class="container mt-3">
    <div class="row">

        <div class="col-1"></div>
        <div class="col-10 text-danger">       
            <br> 
=======

<?php require_once   APPROOT . '/views/includes/header.php'; ?>

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
>>>>>>> 4b92879f1790a331322d78696c5da0a83e92e2b8
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-1"></div>
    </div>
<<<<<<< HEAD

    <div class="row mt-3 mb-3">

        <div class="col-1"></div>
        <div class="col-10 text-begin text-danger">        
            <a href="<?= URLROOT; ?>/Voorstellingen/Create" class="btn btn-danger" role="button">Nieuwe voorstelling</a>
        </div>
        <div class="col-1"></div>
    </div>

=======
>>>>>>> 4b92879f1790a331322d78696c5da0a83e92e2b8
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
<<<<<<< HEAD
                        <th>Update</th>
                        <th>Delete</th>
=======
>>>>>>> 4b92879f1790a331322d78696c5da0a83e92e2b8
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
<<<<<<< HEAD
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
=======
>>>>>>> 4b92879f1790a331322d78696c5da0a83e92e2b8
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
<<<<<<< HEAD
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>
=======
</div>
    <!-- eind tabel -->

<?php require_once   APPROOT . '/views/includes/footer.php'; ?>
>>>>>>> 4b92879f1790a331322d78696c5da0a83e92e2b8
