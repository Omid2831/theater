<?php require APPROOT . '/views/includes/b-header.php'; ?>

<body style="background-color: #2a3d45; color: white;">
    <!-- Notification bubble - should be shown conditionally -->
    <?php if(isset($data['success'])): ?>
    <div class="row mb-3">
        <div class="col-3"></div>
        <div class="col-6 text-begin">
            <div class="alert alert-success" role="alert">
                Record is toegevoegd
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    <?php endif; ?>

    <div class="container" style="margin-top: 5rem;">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-begin text-white">
                <h3 class="text-center"><?= $data['title']; ?></h3>
            </div>
            <div class="col-3"></div>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="<?= URLROOT; ?>/tickets/create" method="post">
                    <div class="mb-3">
                        <label for="voorstelling" class="form-label text-white">Naam</label>
                        <input name="voorstelling" type="text" class="form-control" id="voorstelling" 
                               value="<?= htmlspecialchars($data['voorstelling'] ?? $_POST['voorstelling'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="beschrijving" class="form-label text-white">Beschrijving</label><br>
                        <textarea name="beschrijving" id="beschrijving" rows="5" cols="84" required style="resize: none;"><?= 
                            htmlspecialchars($data['beschrijving'] ?? $_POST['beschrijving'] ?? ''); 
                        ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="barcode" class="form-label text-white">Barcode</label>
                        <div class="input-group">
                            <input name="barcode" type="text" class="form-control" id="barcode" 
                                   value="<?= htmlspecialchars($data['barcode'] ?? $_POST['barcode'] ?? ''); ?>" 
                                   placeholder="bijvb. BTA004" maxlength="6" readonly>
                            <button type="button" class="btn btn-outline-secondary" onclick="generateBarcode()">Generate</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="datum" class="form-label text-white">Datum</label>
                        <input name="datum" type="date" class="form-control" id="datum" 
                               value="<?= htmlspecialchars($data['datum'] ?? $_POST['datum'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tijd" class="form-label text-white">Time</label>
                        <input name="tijd" type="time" class="form-control" id="tijd" 
                               value="<?= htmlspecialchars($data['tijd'] ?? $_POST['tijd'] ?? ''); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Nummer" class="form-label text-white">Stoel</label>
                        <input name="Nummer" type="number" class="form-control" id="Nummer" 
                               value="<?= htmlspecialchars($data['Nummer'] ?? $_POST['Nummer'] ?? ''); ?>" 
                               min="1" max="100" required>
                        <small class="text-muted">Select a seat between 1 and 100</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Verstuur</button>
                    <a href="<?= URLROOT; ?>/tickets/index" class="btn btn-secondary ms-2"><i class="bi bi-arrow-left"></i> Terug</a>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <script src="<?= URLROOT; ?>/public/js/codegenarator.js"></script>
    <script>
        function generateBarcode() {
            // This should be defined in your codegenarator.js
            const barcode = generateRandomBarcode(); 
            document.getElementById('barcode').value = barcode;
        }
    </script>
</body>