<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../config/db.php';
    $database = new Database();
    $db = $database->getConnection();
    include_once '../controllers/UserController.php';
    $controller = new UserController($db);

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $controller->login($_POST['email'], $_POST['password']);
        if ($controller->login($_POST['email'], $_POST['password'])) {
            $controller->send2FACode($_POST['email']);
            $_SESSION['temp_email'] = $_POST['email'];
            header("Location: verify2fa.php");
        }
    } else if (isset($_POST['2fa_code'])) {
        if ($controller->verify2FACode($_POST['2fa_code'])) {
            $_SESSION['user_email'] = $_SESSION['temp_email'];
            unset($_SESSION['temp_email']);
            header("Location: profile.php");
        } else {
            echo "Invalid 2FA code.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="register.php">Inscription</a>
    </div>
    <div class="form-container">
        <h1>Connexion</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Se connecter</button>
            </div>
        </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 app_ilyas</p>
    </div>
</body>
</html>

