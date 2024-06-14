<?php
include_once '../config/db.php';
$database = new Database();
$db = $database->getConnection();
include_once '../controllers/ArticleController.php';
$articleController = new ArticleController($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $articleController->create($_POST['title'], $_POST['content'], $_SESSION['user_id']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Créer un article</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="profile.php">Profil</a>
        <a href="articles.php">Articles</a>
    </div>
    <div class="form-container">
        <h1>Créer un article</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="title">Titre:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Contenu:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Créer</button>
            </div>
        </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 app_ilyas</p>
    </div>
</body>
</html>
