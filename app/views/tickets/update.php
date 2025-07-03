<?php require APPROOT . '/views/includes/b-header.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="row col-12 justify-content-center d-flex">
    <!-- TOAST -->
    <div
        id="toastBox"
        class="col-8 toast align-items-center text-bg-danger border-0 "
        aria-live="assertive"
        aria-atomic="true"
        data-bs-autohide="true"
        data-bs-delay="4000">
        <div id="toastBody" class="toast-body text-center"></div>
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

    <div class="row mt-4">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="<?= URLROOT ?>/tickets/update" method="post" id="updateForm">
                <input type="hidden" name="Id" value="<?= $data['ticket']->Id; ?>">

                <div class="mb-3">
                    <label for="VoorstellingId" class="form-label">Kies een Voorstelling</label>
                    <select name="VoorstellingId" id="VoorstellingId" class="form-select" required>
                        <option value="">-- Selecteer een voorstelling --</option>
                        <?php foreach ($data['vo'] as $v): ?>
                            <option value="<?= $v->Id ?>"
                                <?= ($data['ticket']->VoorstellingId == $v->Id) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($v->Naam) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Barcode" class="form-label">Barcode</label>
                    <input type="text" name="Barcode" id="Barcode" class="form-control"
                        value="<?= htmlspecialchars($data['ticket']->Barcode ?? '') ?>"
                        maxlength="6" required>
                </div>

                <div class="mb-3">
                    <label for="datum" class="form-label">Datum</label>
                    <input type="date" name="datum" id="datum" class="form-control"
                        value="<?= htmlspecialchars($data['ticket']->Datum ?? '') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="tijd" class="form-label">Tijd</label>
                    <input type="text" name="tijd" id="tijd" class="form-control"
                        value="<?= htmlspecialchars($data['ticket']->Tijd ?? '') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="Nummer" class="form-label">Stoel</label>
                    <input type="number" name="Nummer" id="Nummer" class="form-control"
                        value="<?= htmlspecialchars($data['ticket']->Nummer ?? '') ?>"
                        min="1" max="100" required>
                </div>

                <div class="mb-3">
                    <label for="Status" class="form-label">Status</label>
                    <input type="text" name="Status" id="Status" class="form-control"
                        value="<?= htmlspecialchars($data['ticket']->Status ?? '----') ?>" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= URLROOT ?>/tickets/index" class="btn btn-secondary ms-2">Terug</a>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= URLROOT ?>/public/js/geldigheid.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="<?= URLROOT ?>/public/js/timepicker.js"></script>
<script src="<?= URLROOT ?>/public/js/ToastMessages.js"></script>
<?php require APPROOT . '/views/includes/b-footer.php'; ?>