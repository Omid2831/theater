<?php

if (!isset($data)) {
    $data = ['title' => 'Aurora Theater'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aurora</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="<?= URLROOT ?>/css/footer.css">
    <style>
            body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2A3D45 !important; 
            color: #E8E8E8 !important; 
            line-height: 1.6;
        }
        .container {
            max-width: 1100px;
            margin: 20px auto;
            background: #1E2D2F !important; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #000;
        }
        a, a:visited {
            color: #C2B280 !important; 
        }
        a:hover {
            color: #E8E8E8 !important;
            text-decoration: underline !important;
            text-decoration-color: #C2B280 !important;
        }
    </style>
</head>
<body>
<?php include APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <h3><?php echo $data['title']; ?></h3>
    <img src="https://dezwartehond.nl/wp-content/uploads/2020/07/200525_dZwH_Kunstenpand_Hart-van-Zuid-2800x1867.jpg" alt="Theater" style="width:100%; border-radius:8px;">
<p style="margin-top: 20px;">
    Welkom op de website van Aurora Theater! Op onze website vind je alles wat je nodig hebt voor een geweldige theaterervaring.<br><br>
    <strong>Voorstellingen:</strong> Bekijk het actuele <a href="<?= URLROOT ?>/Voorstellingen/index">voorstellingenoverzicht</a> en ontdek welke shows binnenkort te zien zijn.<br>
    <strong>Medewerkers:</strong> Leer ons team kennen op de pagina <a href="<?= URLROOT ?>/Medewerkers/index">Medewerkers</a> en ontdek wie er achter de schermen werken.<br>
    <strong>Tickets:</strong> Wil je een voorstelling bezoeken? Ga dan direct naar <a href="<?= URLROOT ?>/Ticket/index">Tickets</a> om eenvoudig je kaarten te reserveren.<br><br>
    Of je nu een vaste bezoeker bent of voor het eerst kennismaakt met ons theater, wij zorgen voor een inspirerende en toegankelijke online ervaring. Heb je vragen of wil je meer weten? Neem gerust contact met ons op. Veel plezier op onze website!
</p>

<div class="row mt-4">
    <div class="col-md-4 mb-3">
        <div class="card h-100 bg-dark text-light border-0 shadow">
            <img src="https://www.hetkunstpodium.nl/wp-content/uploads/2024/04/Voorstelling-hebbes.jpg" class="card-img-top" alt="Voorstellingen" style="height:180px;object-fit:cover;">
            <div class="card-body">
                <h5 class="card-title">Voorstellingen</h5>
                <p class="card-text">Ontdek ons actuele aanbod van voorstellingen en beleef een avond vol cultuur en entertainment.</p>
                <a href="<?= URLROOT ?>/Voorstellingen/index" class="btn btn-outline-warning">Bekijk voorstellingen</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card h-100 bg-dark text-light border-0 shadow">
            <img src="https://www.werktalent.com/wp-content/uploads/2024/09/administratief-4.jpg" class="card-img-top" alt="Medewerkers" style="height:180px;object-fit:cover;">
            <div class="card-body">
                <h5 class="card-title">Medewerkers</h5>
                <p class="card-text">Maak kennis met het gepassioneerde team dat elke voorstelling tot een succes maakt.</p>
                <a href="<?= URLROOT ?>/Medewerkers/index" class="btn btn-outline-warning">Ons team</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card h-100 bg-dark text-light border-0 shadow">
            <img src="https://static.vecteezy.com/ti/gratis-vector/p1/2212836-line-icon-for-tickets-vector.jpg" class="card-img-top" alt="Tickets" style="height:180px;object-fit:cover;">
            <div class="card-body">
                <h5 class="card-title">Tickets</h5>
                <p class="card-text">Reserveer eenvoudig je tickets voor de beste plaatsen en geniet van een onvergetelijke avond.</p>
                <a href="<?= URLROOT ?>/Ticket/index" class="btn btn-outline-warning">Bestel tickets</a>
            </div>
        </div>
    </div>
</div>
</div>

<?php include APPROOT . '/views/includes/footer.php'; ?>

</body>
</html>
