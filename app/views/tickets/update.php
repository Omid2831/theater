<?php require APPROOT . '/views/includes/b-header.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <!-- Notification Bubble -->
    <div style="display:<?= isset($data['message']) ? $data['message'] : 'none'; ?>">
           <div class="row">
             <div class="col-4"></div>
            <div class="col-4 text-center text-primary">
                <div class="alert alert-success" role="alert">
                    <?= $data['message']; ?>
                </div>
            </div>
            <div class="col-4"></div>
           </div>
        </div>
        <div class="row py-5" style="display:<?= $data['error']; ?>">
            <div class="row">
                <div class="col-4"></div>
            <div class="col-4 text-center text-primary">
                <div class="alert alert-danger" role="alert">
                    <?=  $data['error'] ?? ''; ?>
                </div>
            </div>
            <div class="col-4"></div>
            </div>
        </div>

    <div class="container" style="margin-top: 5rem;">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-white text-center">
                <h3><?= htmlspecialchars($data['title'] ?? 'Ticket Wijzigen') ?></h3>
            </div>
            <div class="col-3"></div>
        </div>

        <!-- Form -->
        <div class="row mt-4">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="<?= URLROOT ?>/tickets/update" method="post">
                    <input type="hidden" name="Id" value="<?= htmlspecialchars($data['ticket']->Id ?? '') ?>">
                    <div class="mb-3">
                        <label for="VoorstellingId" class="form-label">Kies een Voorstelling</label>
                        <select name="VoorstellingId" id="VoorstellingId" class="form-select" required>
                            <option value="">-- Selecteer een voorstelling --</option>
                            <?php foreach ($data['vo'] as $Voorstellingen): ?>
                                <option value="<?= htmlspecialchars($Voorstellingen->Id); ?>"
                                    <?= (isset($data['ticket']->VoorstellingId) && $data['ticket']->VoorstellingId == $Voorstellingen->Id) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($Voorstellingen->Naam) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="barcode" class="form-label">Barcode</label>
                        <div class="input-group">
                            <input
                                name="Barcode"
                                type="text"
                                class="form-control"
                                id="Barcode"
                                value="<?= htmlspecialchars($data['ticket']->Barcode ?? 'Niet beschikbaar') ?>"
                                placeholder="bijvb. BTA004"
                                maxlength="6">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="datum" class="form-label">Datum</label>
                        <input
                            name="datum"
                            type="date"
                            class="form-control"
                            id="datum"
                            value="<?= htmlspecialchars($data['ticket']->Datum ?? '') ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tijd" class="form-label">Tijd</label>
                        <input
                            name="tijd"
                            type="text"
                            class="form-control"
                            id="tijd"
                            value="<?= htmlspecialchars($data['ticket']->Tijd ?? '') ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="Nummer" class="form-label">Stoel</label>
                        <input
                            name="Nummer"
                            type="number"
                            class="form-control"
                            id="Nummer"
                            value="<?= htmlspecialchars($data['ticket']->Nummer ?? '') ?>"
                            min="1" max="100"
                            required>
                        <small class="text-light">Select a seat between 1 and 100</small>
                    </div>

                    <div class="mb-3">
                        <label for="Status" class="form-label">Status</label>
                        <input
                            name="Status"
                            type="text"
                            class="form-control"
                            id="Status"
                            value="<?= htmlspecialchars($data['ticket']->Status ?? '----') ?>"
                            required
                            readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= URLROOT ?>/tickets/index" class="btn btn-secondary ms-2">
                        <i class="bi bi-arrow-left"></i> Terug
                    </a>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>


    <script src="<?= URLROOT ?>/public/js/geldigheid.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="<?= URLROOT ?>/public/js/timepicker.js"></script>

    <?php require_once APPROOT . '/views/includes/b-footer.php'; ?>