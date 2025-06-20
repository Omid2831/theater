<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container mt-3">

    
    <?php if (!empty($data['message'])): ?>
        <div class="alert alert-success text-center">
            Account is succesvol verwijderd.
        </div>
    <?php endif; ?>

    
    <?php if (!empty($data['verwijder_error'])): ?>
        <div class="alert alert-danger text-center">
            <?= $data['verwijder_error']; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION['update_success'])): ?>
    <div class="alert alert-success text-center mb-4">
        Account is succesvol gewijzigd.
    </div>
    <?php unset($_SESSION['update_success']); ?>
<?php endif; ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>
        
    </body>
    </html>

    <div class="header">
        <h1>Overzicht Van alle Accounten</h1>
    </div>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Gebruikersnaam</th>
            <th>Aangemaakt op</th>
            <th colspan="2">Acties</th>
        </tr>

        <?php foreach ($data['accounts'] as $gebruiker): ?>
        <tr>
            <td><?= $gebruiker->Id; ?></td>
            <td><?= $gebruiker->Voornaam . ' ' . $gebruiker->Tussenvoegsel . ' ' . $gebruiker->Achternaam; ?></td>
            <td><?= $gebruiker->Gebruikersnaam; ?></td>
            <td><?= $gebruiker->Datumaangemaakt; ?></td>
            <td>
                <a href="<?= URLROOT; ?>/AccountController/wijziging/<?= $gebruiker->Id; ?>">
                    <i class="bi bi-pencil-square text-success"></i>
                </a>
            </td>
            <td>
                <a href="<?= URLROOT; ?>/AccountController/delete/<?= $gebruiker->Id; ?>" onclick="return confirm('Weet je zeker dat je dit account wilt verwijderen?');">
                    <i class="bi bi-trash3-fill text-danger"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #2A3D45;
        color: #E8E8E8;
        margin: 0;
        padding: 0;
    }

    .header {
        background-color: #2A3D45;
        color: #E8E8E8;
        padding: 24px 0 16px 0;
        text-align: center;
    }

    .table {
        width: 80%;
        margin: 40px auto 60px auto;
        border-collapse: collapse;
        background: #1E2D2F;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        color: #E8E8E8;
    }

    .table th {
        background-color: #C2B280;
        color: #2A3D45;
        font-size: 18px;
        padding: 14px 16px;
    }

    .table td {
        border: 1px solid #C2B280;
        padding: 12px 16px;
    }

    .table tr:nth-child(even) {
        background-color: #2A3D45;
    }

    .table tr:hover {
        background-color: #C2B280;
        color: #2A3D45;
    }
</style>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
