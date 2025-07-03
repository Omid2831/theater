<?php require   APPROOT . '/views/includes/header.php'; ?>
<?php require   APPROOT . '/views/includes/b-header.php'; ?>

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
            <a href="<?= URLROOT; ?>/Medewerkers/Create" class="btn btn-danger" role="button">Nieuwe medewerker</a>
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
                        <th>Id</th>
                        <th>Nummer</th>
                        <th>Medewerkersoort</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['Medewerkers'])): ?>
                        <?php foreach($data['Medewerkers'] as $medewerker) : ?>
                            <tr>
                                <td><?= $medewerker->Id; ?></td>
                                <td><?= $medewerker->Nummer; ?></td>
                                <td><?= $medewerker->Medewerkersoort; ?></td>
                                <td>
                                    <a href="<?= URLROOT; ?>/Medewerkers/Update/<?=$medewerker->Id; ?>">
                                        <i class="bi bi-pencil-square text-success"></i>
                                    </a>
                                </td>
                                    <td>
                                    <a href="<?= URLROOT; ?>/Medewerkers/delete/<?=$medewerker->Id; ?>">
                                        <i class="bi bi-trash3-fill text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><p class="text-center">Er zijn geen actieve medewerkers</p></td>
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

