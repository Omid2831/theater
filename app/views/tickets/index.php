<?php
session_start();
require_once APPROOT . '/config/config.php';
require_once APPROOT . '/views/includes/b-header.php';
?>

<div class="container">
    <h2>Mijn Tickets</h2>

    <?php if (empty($data['tickets'])): ?>
        <div class="alert alert-info">Geen tickets gevonden.</div>
    <?php else: ?>
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Voorstelling</th>
                    <th>Opmerking</th>
                    <th>Tijd</th>
                    <th>Datum</th>
                    <th>Stoel</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data['tickets'] as $ticket): ?>
                <tr>
                    <td><?= htmlspecialchars($ticket['Id']) ?></td>
                    <td><?= htmlspecialchars($ticket['Voorstelling']) ?></td>
                    <td><?= htmlspecialchars($ticket['Opmerking']) ?></td>
                    <td><?= htmlspecialchars($ticket['Tijd']) ?></td>
                    <td><?= date('d-m-Y', strtotime($ticket['Datum'])) ?></td>
                    <td><?= htmlspecialchars($ticket['Stoel']) ?></td>
                    <td><?= htmlspecialchars($ticket['Status']) ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
<?php require_once APPROOT . '/views/includes/b-footer.php'; ?>