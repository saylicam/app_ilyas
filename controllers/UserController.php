<?php
// Vérifier si une session est déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class UserController {
    private $db;
    private $user;

    public function __construct($db){
        include_once __DIR__ . '/../models/User.php';
        $this->user = new User($db);
    }

    // Fonction pour enregistrer un nouvel utilisateur
    public function register($name, $email, $password){
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->password = $password;

        if($this->user->register()){
            $_SESSION['user_id'] = $this->user->id;
            $_SESSION['user_name'] = $this->user->name;
            header("Location: ../views/dashboard.php");
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }

    // Fonction pour connecter un utilisateur
    public function login($email, $password){
        $this->user->email = $email;
        $this->user->password = $password;

        if($this->user->login()){
            $_SESSION['user_id'] = $this->user->id;
            $_SESSION['user_name'] = $this->user->name;
            header("Location: ../views/dashboard.php");
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    }

    // Fonction pour obtenir le profil de l'utilisateur connecté
    public function getProfile(){
        if(isset($_SESSION['user_id'])){
            $this->user->id = $_SESSION['user_id'];
            $this->user->readOne();
            return $this->user;
        } else {
            header("Location: ../views/login.php");
        }
    }

    // Fonction pour mettre à jour le profil de l'utilisateur
    public function updateProfile($id, $name, $email, $password){
        $this->user->id = $id;
        $this->user->name = $name;
        $this->user->email = $email;

        if (!empty($password)) {
            $this->user->password = $password;
            $this->user->updateWithPassword();
        } else {
            $this->user->updateWithoutPassword();
        }

        $_SESSION['user_name'] = $this->user->name;
        header("Location: ../views/profile.php");
    }

    // Fonction pour envoyer un code 2FA
    public function send2FACode($email){
        $code = rand(100000, 999999);
        $_SESSION['2fa_code'] = $code;
        $to = $email;
        $subject = "Your 2FA Code";
        $message = "Your 2FA code is: " . $code;
        $headers = "From: webmaster@example.com";

        mail($to, $subject, $message, $headers);
    }

    // Fonction pour vérifier le code 2FA
    public function verify2FACode($code){
        if ($_SESSION['2fa_code'] == $code) {
            unset($_SESSION['2fa_code']);
            return true;
        } else {
            return false;
        }
    }

    // Fonction pour déconnecter l'utilisateur
    public function logout(){
        session_destroy();
        header("Location: ../views/index.php");
    }
}
?>

