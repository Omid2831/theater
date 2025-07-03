<?php require_once APPROOT . '/views/includes/header.php'; ?>


<div class="form-container">
    <h3 style="color: #E8E8E8;"><?= $data['title']; ?></h3>

    <?php if ($data['message'] === 'visible'): ?>
    <div class="alert alert-success text-center mb-4">
        Account is succesvol gewijzigd
    </div>
    <?php elseif (!empty($data['message'])): ?>
    <div class="alert alert-danger text-center mb-4">
        <?= $data['message']; ?>
    </div>
    <?php endif; ?>

    <style>
    body {
        background-color: #2A3D45;
        color: #E8E8E8;
    }

    .form-container {
        background-color: #1E2D2F;
        border-radius: 12px;
        padding: 2rem;
        max-width: 600px;
        margin: 2rem auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    h3 {
    color: #E8E8E8;
    text-align: center;
    margin-bottom: 1.5rem;
}


    .form-control {
        background-color: #2A3D45;
        color: #E8E8E8;
        border: 1px solid #C2B280;
    }

    .form-control:focus {
        border-color: #C2B280;
        box-shadow: 0 0 5px #C2B280;
        background-color: #2A3D45;
        color: #E8E8E8;
    }

    label {
        color: #E8E8E8;
    }

    .btn-primary {
        background-color: #C2B280;
        border-color: #C2B280;
        color: #1E2D2F;
    }

    .btn-primary:hover {
        background-color: #b0a06d;
        border-color: #b0a06d;
    }

    .btn-secondary {
        background-color: transparent;
        border: 1px solid #C2B280;
        color: #C2B280;
    }

    .btn-secondary:hover {
        background-color: #C2B280;
        color: #1E2D2F;
    }

    .alert-success {
        background-color: #C2B280;
        color: #1E2D2F;
        border: none;
    }
</style>

    <form action="<?= URLROOT; ?>/AccountController/wijziging/<?= $data['account']->Id; ?>" method="post">
        <div class="form-group mb-3">
            <label for="voornaam">Voornaam</label>
            <input type="text" name="voornaam" class="form-control" value="<?= $_POST['voornaam'] ?? $data['account']->Voornaam; ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="tussenvoegsel">Tussenvoegsel</label>
            <input type="text" name="tussenvoegsel" class="form-control" value="<?= $_POST['tussenvoegsel'] ?? $data['account']->Tussenvoegsel; ?>">
        </div>

        <div class="form-group mb-3">
            <label for="achternaam">Achternaam</label>
            <input type="text" name="achternaam" class="form-control" value="<?=$_POST['Achternaam'] ?? $data['account']->Achternaam; ?>" required>
        </div>

        <div class="form-group mb-4">
            <label for="gebruikersnaam">Gebruikersnaam</label>
            <input type="text" name="gebruikersnaam" class="form-control" value="<?= $data['account']->Gebruikersnaam; ?>" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Wijzigen</button>
            <!-- <a href="<?= URLROOT; ?>/AccountController/account_overzicht" class="btn btn-secondary">Annuleren</a> -->
        </div>
    </form>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
