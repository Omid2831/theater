<?php require   APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">
    
    <div class="row mb-3">
        <div class="col-3"></div>
        <div class="col-6 text-begin text-danger"> 
            <br>       
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-3"></div>
    </div>

    <div class="row mb-3" style="display:<?= $data['message']; ?>">
        <div class="col-3"></div>
        <div class="col-6 text-begin text-warning">        
            <div class="alert alert-success" role="alert">
                Record is toegevoegd
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    
    <!-- begin tabel -->
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 text-white">
            <form action="<?= URLROOT; ?>/Medewerkers/Create" method="post">
                <div class="mb-3">
                    <label for="nummer" class="form-label">Nummer</label>
                    <input name="nummer" type="number" min="0" class="form-control" id="nummer" value="<?= $_POST['nummer'] ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="medewerkersoort" class="form-label">Medewerkersoort</label>
                    <input name="medewerkersoort" type="text"  class="form-control" id="medewerkersoort" value="<?= $_POST['medewerkersoort'] ?? ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Verstuur</button>
            </form>
            
            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="col-3"></div>
    </div>
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>