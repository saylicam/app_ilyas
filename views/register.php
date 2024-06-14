<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../config/db.php';
    $database = new Database();
    $db = $database->getConnection();
    include_once '../controllers/UserController.php';
    $controller = new UserController($db);
    $controller->register($_POST['name'], $_POST['email'], $_POST['password']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="login.php">Connexion</a>
    </div>
    <div class="form-container">
        <h1>Inscription</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">S'inscrire</button>
            </div>
        </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 app_ilyas</p>
    </div>
</body>
</html>


