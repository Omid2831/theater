
<h2><?= $data['title'] ?></h2>
<form method="POST">
    <label for="barcode">Barcode:</label>
    <input type="text" name="barcode" id="barcode" required>
    <button type="submit">Scannen</button>
</form>
<?php if (!empty($data['error'])): ?>
    <div style="color:red;"><?= $data['error'] ?></div>
<?php endif; ?>
<?php if ($data['ticket']): ?>
    <div>
        <strong>Voorstelling:</strong> <?= $data['ticket']->Voorstelling ?><br>
        <strong>Barcode:</strong> <?= $data['ticket']->Barcode ?><br>
        <strong>Status:</strong> <?= $data['ticket']->Status ?>
    </div>
<?php endif; ?>