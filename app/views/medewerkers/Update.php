<?php require   APPROOT . '/views/includes/header.php'; ?>
<?php require   APPROOT . '/views/includes/b-header.php'; ?>

<div class="container mt-3">

    <div class="row mb-3">

        <div class="col-3"></div>
        <div class="col-6 text-begin text-danger">   
            <br>     
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-3"></div>
    </div>
    
    <!-- begin tabel -->
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 text-white">

            <form action="<?= URLROOT; ?>/Medewerkers/Update" method="post">
                <div class="mb-3">
                    <label for="nummer" class="form-label">Nummer</label>
                    <input value="<?= $data['Medewerkers']->Nummer; ?>" name="nummer" type="number" min="0" class="form-control" id="nummer" required>
                </div>
                <div class="mb-3">
                    <label for="Medewerkersoort" class="form-label">Medewerkersoort</label>
                    <input value="<?= $data['Medewerkers']->Medewerkersoort; ?>" name="Medewerkersoort" type="text" class="form-control" id="Medewerkersoort" required>
                </div>
                <input type="hidden" name="Id" value="<?= $data['Medewerkers']->Id; ?>">
                
                <button type="submit" class="btn btn-danger">Wijzig</button>
            </form>
            
            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="col-3"></div>
    </div>
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>
<?php require   APPROOT . '/views/includes/b-footer.php'; ?>