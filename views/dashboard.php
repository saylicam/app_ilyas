<?php
// Vérifier si une session est déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once '../config/db.php';
$database = new Database();
$db = $database->getConnection();
include_once '../controllers/UserController.php';
$controller = new UserController($db);
$user = $controller->getProfile();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="profile.php">Profil</a>
        <form method="post" action="logout.php" style="display:inline;">
            <button class="logout-button" type="submit">Déconnexion</button>
        </form>
    </div>
    <div class="dashboard-container">
        <h1>Bienvenue, <?php echo htmlspecialchars($user->name); ?></h1>
        <p>Nom : <?php echo htmlspecialchars($user->name); ?></p>
        <p>Email : <?php echo htmlspecialchars($user->email); ?></p>
        <p><a href="profile.php">Modifier votre profil</a></p>
    </div>
    <div class="footer">
        <p>&copy; 2024 app_ilyas</p>
    </div>
</body>
</html>
