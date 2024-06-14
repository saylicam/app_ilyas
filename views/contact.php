<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "your_email@example.com";
    $subject = "Contact Form Submission";
    $message = "Name: " . $_POST['name'] . "\nEmail: " . $_POST['email'] . "\nMessage: " . $_POST['message'];
    $headers = "From: webmaster@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent!";
    } else {
        echo "Failed to send message.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="register.php">Inscription</a>
        <a href="login.php">Connexion</a>
    </div>
    <div class="form-container">
        <h1>Contactez-nous</h1>
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
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Envoyer</button>
            </div>
        </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 app_ilyas</p>
    </div>
</body>
</html>

