<?php
require_once APPROOT . '/config/config.php';

if (!isset($data)) {
    $data = ['title' => 'Aurora Theater'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aurora</title>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/footer.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #111;
            color: #f4f4f4;
            line-height: 1.6;
        }
        header {
            background-color: #1a1a1a;
            border-bottom: 2px solid #e50914;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        nav {
            display: flex;
            gap: 20px;
        }
        nav a {
            color: #f4f4f4;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            color: #e50914;
        }
        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .nav-right img {
            height: 24px;
            vertical-align: middle;
        }
        .container {
            max-width: 1100px;
            margin: 20px auto;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #000;
        }
        footer {
            margin-top: 30px;
            text-align: center;
            color: #888;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
      <img src="/public/img/logo-theater.png" alt="Aurora Logo">
        <h2>Aurora Theater</h2>
    </div>
    <nav>
        <a href="<?= URLROOT ?>/Medewerkers/index">Medewerkers</a>
        <a href="<?= URLROOT ?>/Voorstellingen/index">Voorstellingen</a>
        <a href="<?= URLROOT ?>/Ticket/index">Tickets</a>
    </nav>
    <div class="nav-right">
        <a href="<?= URLROOT ?>/Accounts/login">Inloggen</a>
        <a href="<?= URLROOT ?>/Accounts/profiel">
            <img src="/public/img/icon-profile.png" alt="Profiel">
        </a>
    </div>
</header>

<div class="container">
    <h3><?php echo $data['title']; ?></h3>
    <img src="https://dezwartehond.nl/wp-content/uploads/2020/07/200525_dZwH_Kunstenpand_Hart-van-Zuid-2800x1867.jpg" alt="Theater" style="width:100%; border-radius:8px;">
</div>

<?php include APPROOT . '/views/includes/footer.php'; ?>

</body>
</html>
