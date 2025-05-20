
<div class="container">
    <h2>Inloggen</h2>
    <?php if (!empty(\$error)) echo "<p style='color:red;'>\$error</p>"; ?>
    <form method="POST" action="/Accounts/login">
        <input type="text" name="username" placeholder="Gebruikersnaam" required><br><br>
        <input type="password" name="password" placeholder="Wachtwoord" required><br><br>
        <button type="submit">Inloggen</button>
    </form>
    <p>Nog geen account? <a href="/Accounts/register">Registreer hier</a></p>
</div>
