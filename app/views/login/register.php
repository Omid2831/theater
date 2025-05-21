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
            background-color:rgb(79, 0, 0);
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        header {
            background-color:rgb(153, 7, 7);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            border-bottom: 3px solid #1E90FF;
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
            color: #ffffff;
            font-size: 22px;
            margin: 0;
        }

        nav a, .nav-right a {
            margin-left: 20px;
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
        }

        nav a:hover, .nav-right a:hover {
            color: #1E90FF;
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
            background-color:rgb(226, 27, 27);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(222, 10, 10, 0.5);
            width: 100%;
            max-width: 500px;
            margin: 60px auto;
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            color: #1E90FF;
            font-size: 26px;
        }

        form label {
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-weight: 600;
            color:rgb(255, 255, 255);
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: none;
            border-radius: 6px;
            background:rgb(255, 255, 255);
            color:rgb(28, 3, 3);
            font-size: 15px;
        }

        input:focus {
            outline: 2px solid #1E90FF;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color:rgb(171, 5, 5);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0077dd;
        }

        .error-message {
            background-color: #ff4c4c;
            color: white;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            max-width: 500px;
            margin: 30px auto 0;
            font-weight: 500;
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
