<?php require_once APPROOT . '/views/includes/header.php'; ?>


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

.footer {
    background-color: #1E2D2F;
    color: #E8E8E8;
    padding: 16px 0;
    text-align: center;
    position: fixed;
    width: 100%;
    bottom: 0;
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

<!DOCTYPE html>
<html>
<head>
    <title>Accountoverzicht</title>
</head>
<body>
    

    <div class="header">
        <h1>Overzicht Van alle Accounten</h1>


    <table class="table" >
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Gebruikersnaam</th>
            <th>Aangemaakt op</th>
        </tr>

        <?php foreach ($data['accounts'] as $gebruiker): ?>
        <tr>
            <td><?= $gebruiker->Id; ?></td>
            <td>
                <?= $gebruiker->Voornaam; ?>
                <?= $gebruiker->Tussenvoegsel; ?>
                <?= $gebruiker->Achternaam; ?>
            </td>
            <td><?= $gebruiker->Gebruikersnaam; ?></td>
            <td><?= $gebruiker->Datumaangemaakt; ?></td>
            <td>
            
        </tr>
        <?php endforeach; ?>
    </table>
    <?php require_once APPROOT . '/views/includes/footer.php'; ?>
</body>
</html>
