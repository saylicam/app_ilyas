<?php
include_once '../config/db.php';
$database = new Database();
$db = $database->getConnection();
include_once '../controllers/ArticleController.php';
$articleController = new ArticleController($db);
$articles = $articleController->readAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Articles</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="profile.php">Profil</a>
        <a href="create_article.php">Créer un article</a>
    </div>
    <div class="container">
        <h1>Articles</h1>
        <div class="articles">
            <?php while ($row = $articles->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="article">
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p><?php echo htmlspecialchars($row['content']); ?></p>
                    <a href="edit_article.php?id=<?php echo $row['id']; ?>">Modifier</a>
                    <a href="delete_article.php?id=<?php echo $row['id']; ?>">Supprimer</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 app_ilyas</p>
    </div>
</body>
</html>
