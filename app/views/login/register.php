<?php if (!empty($data['error'])): ?>
    <div class="error-message"><?= htmlspecialchars($data['error']) ?></div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Aurora Theater - Registreren</title>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/footer.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #1a1a1a;
            color: #E8E8E8;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2A3D45;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            border-bottom: 3px solid #C2B280;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 48px;
            margin-right: 10px;
        }

        .logo h2 {
            color: #E8E8E8;
            font-size: 24px;
            margin: 0;
        }

        nav a, .nav-right a {
            margin-left: 20px;
            color: #E8E8E8;
            text-decoration: none;
            font-weight: 500;
        }

        nav a:hover, .nav-right a:hover {
            color: #C2B280;
        }

        .nav-right {
            display: flex;
            align-items: center;
        }

        .nav-right img {
            height: 36px;
            border-radius: 50%;
            margin-left: 12px;
        }

        .container {
            background-color: #2A3D45;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 500px;
            margin: 60px auto;
            text-align: center;
            color: #E8E8E8;
        }

        h2 {
            margin-bottom: 25px;
            color: #C2B280;
            font-size: 28px;
        }

        form label {
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-weight: 600;
            color: #C2B280;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #C2B280;
            border-radius: 8px;
            background: #1E2D2F;
            color: #E8E8E8;
            font-size: 15px;
        }

        input:focus {
            border-color: #C2B280;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #C2B280;
            color: #2A3D45;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        button:hover {
            background-color: #E8E8E8;
            color: #2A3D45;
        }

        .error-message {
            background-color: #C2B280;
            color: #2A3D45;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            max-width: 500px;
            margin: 30px auto 0;
            font-weight: 500;
        }

        footer {
            background-color: #1E2D2F !important;
            color: #E8E8E8 !important;
        }
    </style>
</head>

<body>


<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <h2>Registreren</h2>
    <form method="post" action="<?= URLROOT ?>/LoginController/register">
        <label for="voornaam">Voornaam:</label>
        <input type="text" id="voornaam" name="voornaam" required>

        <label for="tussenvoegsel">Tussenvoegsel:</label>
        <input type="text" id="tussenvoegsel" name="tussenvoegsel">

        <label for="achternaam">Achternaam:</label>
        <input type="text" id="achternaam" name="achternaam" required>

        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>

        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" id="wachtwoord" name="wachtwoord" required>

        <button type="submit">Registreren</button>
    </form>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
</body>

</html>
