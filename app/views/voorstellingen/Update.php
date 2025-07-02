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
    
    <!-- begin tabel -->
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">

            <form action="<?= URLROOT; ?>/voorstellingen/Update" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Naam</label>
                    <input value="<?= $data['Voorstellingen']->Naam; ?>" name="naam" type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="Beschrijving" class="form-label">Beschrijving</label>
                    <input value="<?= $data['Voorstellingen']->Beschrijving; ?>" name="Beschrijving" type="text" class="form-control" id="Beschrijving" required>
                </div>
                <div class="mb-3">
                    <label for="Datum" class="form-label">Datum</label>
                    <input value="<?= $data['Voorstellingen']->Datum; ?>" name="Datum" type="text" class="form-control" id="Datum" required>
                </div>
                <div class="mb-3">
                    <label for="Tijd" class="form-label">Tijd</label>
                    <input value="<?= $data['Voorstellingen']->Tijd; ?>" name="Tijd" type="time" class="form-control" id="Tijd" required>
                </div>
                <div class="mb-3">
                    <label for="MaxAantalTickets" class="form-label">Maximaal aantal tickets</label>
                    <input value="<?= $data['Voorstellingen']->MaxAantalTickets; ?>" name="MaxAantalTickets" type="number" min="0" class="form-control" id="MaxAantalTickets" required>
                </div>
                <div class="mb-3">
                    <label for="Beschikbaarheid" class="form-label">Beschikbaar aantal tickets</label>
                    <input value="<?= $data['Voorstellingen']->Beschikbaarheid; ?>" name="Beschikbaarheid" type="number" min="0" class="form-control" id="Beschikbaarheid" required>
                </div>
                
                <input type="hidden" name="Id" value="<?= $data['Voorstellingen']->Id; ?>">
                
                <button type="submit" class="btn btn-danger">Wijzig</button>
            </form>
            
            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="col-3"></div>
    </div>
    <!-- eind tabel -->

<?php require   APPROOT . '/views/includes/footer.php'; ?>