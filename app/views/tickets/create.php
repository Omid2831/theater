<?php require   APPROOT . '/views/includes/b-header.php'; ?>

<body style="background-color: #2a3d45; color: white;">
    <?php if (!empty($data['message'])): ?>
            <div class="row mb-3" style="display:<?= $data['message']; ?>">
                <div class="col-3"></div>
                <div class="col-6 text-begin text-warning">
                    <div class="alert alert-success" role="alert">
                        Record is toegevoegd
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        <?php endif; ?>
    <div class="container" style="margin-top: 10rem;">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-begin text-white">
                <h3 class="text-center"><?= $data['title']; ?></h3>
            </div>
            <div class="col-3"></div>
        </div>

        <!-- begin tabel -->
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="<?= URLROOT; ?>/tickets/create" method="post">
                    <div class="mb-3">
                        <label for="voorstelling" class="form-label text-white">Naam</label>
                        <input name="voorstelling" type="text" class="form-control" id="voorstelling" value="<?= htmlspecialchars($_POST['voorstelling'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="barcode" class="form-label text-white">Barcode</label>
                        <input name="barcode" type="text" class="form-control" id="barcode" value="<?= htmlspecialchars($_POST['barcode'] ?? ''); ?>" placeholder="bijvb. BTA004" maxlength="6" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="datum" class="form-label text-white">Datum</label>
                        <input name="datum" type="date" class="form-control" id="datum" value="<?= htmlspecialchars($_POST['datum'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tijd" class="form-label text-white">Time</label>
                        <input name="tijd" type="time" class="form-control" id="tijd" value="<?= htmlspecialchars($_POST['tijd'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Nummer" class="form-label text-white">stoel</label>
                        <input name="Nummer" type="text" class="form-control" id="Nummer" value="<?= htmlspecialchars($_POST['Nummer'] ?? ''); ?>" minlength="1" maxlength="3" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Verstuur</button>
                </form>

                <a href="<?= URLROOT; ?>/tickets/index"><i class="bi bi-arrow-left text-white"></i></a>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>

<script src="/public/js/codegenarator.js"></script>
