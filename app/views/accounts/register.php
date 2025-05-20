
<div class="container">
    <h2>Registreren</h2>
    <?php if (!empty(\$error)) echo "<p style='color:red;'>\$error</p>"; ?>
    <form method="POST">
        <input type="text" name="voornaam" placeholder="Voornaam" required>
        <input type="text" name="achternaam" placeholder="Achternaam" required> action="/Accounts/register">
        <input type="text" name="username" placeholder="Gebruikersnaam" required><br><br>
        <input type="password" name="password" placeholder="Wachtwoord" required><br><br>
        <button type="submit">Account aanmaken</button>
    </form>
</div>
