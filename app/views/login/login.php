<?php if (!empty($data['error'])): ?>
    <div class="error-message"><?= htmlspecialchars($data['error']) ?></div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Aurora Theater - Inloggen</title>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/footer.css">
    <style>
         body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            border-bottom: 3px solid #e50914;
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
            color: #fff;
            font-size: 24px;
            margin: 0;
        }

        nav a,
        .nav-right a {
            margin-left: 20px;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
        }

        nav a:hover,
        .nav-right a:hover {
            color: #e50914;
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
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 420px;
            margin: 60px auto;
            text-align: center;
            color: #000;
        }

        h2 {
            margin-bottom: 25px;
            color: #e50914;
            font-size: 28px;
        }

        form label {
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
            color: #111;
            font-size: 15px;
        }

        input:focus {
            border-color: #e50914;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #e50914;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c40812;
        }

        p.footer {
            margin-top: 16px;
            color: #333;
            font-size: 14px;
        }

        p.footer a {
            color: #e50914;
            font-weight: 500;
        }

        p.footer a:hover {
            text-decoration: underline;
        }

        .error-message {
            background-color: #ff4c4c;
            color: white;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            max-width: 420px;
            margin: 30px auto 0;
            font-weight: 500;
        }
    </style>
</head>

<body>

<?php require_once APPROOT . '/views/includes/header.php'; ?>



<div class="container">
    <h2>Inloggen</h2>
    <form method="post" action="<?= URLROOT ?>/LoginController/login">
        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" name="gebruikersnaam" id="gebruikersnaam" required>

        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" name="wachtwoord" id="wachtwoord" required>

        <button type="submit">Inloggen</button>

        <p class="footer">Nog geen account? <a href="<?= URLROOT ?>/LoginController/register">Registreer hier</a></p>
    </form>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
</body>

</html>
