<!DOCTYPE html>
<html>
<head>
    <title>Vérification 2FA</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Accueil</a>
    </div>
    <div class="form-container">
        <h1>Vérification 2FA</h1>
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="2fa_code">Code 2FA:</label>
                <input type="text" id="2fa_code" name="2fa_code" required>
            </div>
            <div class="form-group">
                <button type="submit">Vérifier</button>
            </div>
        </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 app_ilyas</p>
    </div>
</body>
</html>
