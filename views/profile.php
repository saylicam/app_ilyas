<?php
include_once '../config/db.php';
$database = new Database();
$db = $database->getConnection();
include_once '../controllers/UserController.php';
$controller = new UserController($db);
$user = $controller->getProfile();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->updateProfile($user->id, $_POST['name'], $_POST['email'], $_POST['password']);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Accueil</a>
    </div>
    <div class="profile-container">
        <h1>Profil</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user->name); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe (laisser vide pour ne pas changer):</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <button type="submit">Mettre à jour</button>
            </div>
        </form>
        <form method="post" action="logout.php">
            <button class="logout-button" type="submit">Déconnexion</button>
        </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 app_ilyas</p>
    </div>
</body>
</html>
