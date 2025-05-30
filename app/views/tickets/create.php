<?php require APPROOT . '/views/includes/b-header.php'; ?>

<body style="background-color: #2a3d45; color: white;">

    <!-- Notification Bubble -->
    <?php if (!empty($data['success_message'])): ?>
        <div class="row mb-3">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="alert alert-success" role="alert">
                    <?= htmlspecialchars($data['success_message']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    <?php elseif (!empty($data['error'])): ?>
        <div class="row mb-3">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($data['error']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    <?php endif; ?>

    <div class="container" style="margin-top: 5rem;">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-white text-center">
                <h3><?= htmlspecialchars($data['title'] ?? 'Ticket Aanmaken') ?></h3>
            </div>
            <div class="col-3"></div>
        </div>

        <!-- Form -->
        <div class="row mt-4">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="<?= URLROOT ?>/tickets/create" method="post">
                    <div class="mb-3">
                        <label for="voorstelling" class="form-label">Naam</label>
                        <input
                            name="voorstelling"
                            type="text"
                            class="form-control"
                            id="voorstelling"
                            value="<?= htmlspecialchars($data['voorstelling'] ?? '') ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="beschrijving" class="form-label">Beschrijving</label>
                        <textarea
                            name="beschrijving"
                            id="beschrijving"
                            class="form-control"
                            style="resize: none; width: 100%; height: 150px;"
                            required
                        ><?= htmlspecialchars($data['beschrijving'] ?? '') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="barcode" class="form-label">Barcode</label>
                        <div class="input-group">
                            <input
                                name="barcode"
                                type="text"
                                class="form-control"
                                id="barcode"
                                value="<?= htmlspecialchars($data['barcode'] ?? '') ?>"
                                placeholder="bijvb. BTA004"
                                maxlength="6"
                                readonly
                            >
                            <button type="button" class="btn btn-outline-secondary" onclick="generateBarcode()">Generate</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="datum" class="form-label">Datum</label>
                        <input
                            name="datum"
                            type="date"
                            class="form-control"
                            id="datum"
                            value="<?= htmlspecialchars($data['datum'] ?? '') ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="tijd" class="form-label">Tijd</label>
                        <input
                            name="tijd"
                            type="time"
                            class="form-control"
                            id="tijd"
                            value="<?= htmlspecialchars($data['tijd'] ?? '') ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="Nummer" class="form-label">Stoel</label>
                        <input
                            name="Nummer"
                            type="number"
                            class="form-control"
                            id="Nummer"
                            value="<?= htmlspecialchars($data['Nummer'] ?? '') ?>"
                            min="1" max="100"
                            required
                        >
                        <small class="text-light">Select a seat between 1 and 100</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Verstuur</button>
                    <a href="<?= URLROOT ?>/tickets/index" class="btn btn-secondary ms-2">
                        <i class="bi bi-arrow-left"></i> Terug
                    </a>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <script src="<?= URLROOT ?>/public/js/codegenarator.js"></script>
    <script>
        function generateBarcode() {
            if (typeof generateRandomBarcode === 'function') {
                const barcode = generateRandomBarcode();
                document.getElementById('barcode').value = barcode;
            } else {
                alert('Barcode generator function not found.');
            }
        }
    </script>
</body>
