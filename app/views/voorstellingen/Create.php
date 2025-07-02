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
            <form action="<?= URLROOT; ?>/voorstellingen/Create" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Naam</label>
                    <input name="naam" type="text" class="form-control" id="name" value="<?= $_POST['naam'] ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="beschrijving" class="form-label">Beschrijving</label>
                    <input name="beschrijving" type="text"  class="form-control" id="beschrijving" value="<?= $_POST['beschrijving'] ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="datum" class="form-label">Datum</label>
                    <input name="datum" type="date"  class="form-control" id="datum" value="<?= $_POST['datum'] ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tijd" class="form-label">Tijd</label>
                    <input name="tijd" type="time" class="form-control" id="tijd" value="<?= $_POST['tijd'] ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="maxaantaltickets" class="form-label">Maximaal aantal tickets</label>
                    <input name="maxaantaltickets" type="number" min="0" class="form-control" id="maxaantaltickets" value="<?= $_POST['maxaantaltickets'] ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="beschikbaarheid" class="form-label">Beschikbaarheid</label>
                    <input name="beschikbaarheid" type="number" min="0" class="form-control" id="beschikbaarheid" value="<?= $_POST['beschikbaarheid'] ?? ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Verstuur</button>
            </form>
            
            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="col-3"></div>
    </div>
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>