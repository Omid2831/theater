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
                        <th>Id</th>
                        <th>Nummer</th>
                        <th>Medewerkersoort</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['Medewerkers'])): ?>
                        <?php foreach($data['Medewerkers'] as $medewerker) : ?>
                            <tr>
                                <td><?= $medewerker->Id; ?></td>
                                <td><?= $medewerker->Nummer; ?></td>
                                <td><?= $medewerker->Medewerkersoort; ?></td>
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
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>