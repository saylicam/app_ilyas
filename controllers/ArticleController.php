<?php
class ArticleController {
    private $db;
    private $article;

    public function __construct($db){
        include_once '../models/Article.php';
        $this->article = new Article($db);
    }

    // Fonction pour créer un nouvel article
    public function create($title, $content, $user_id){
        $this->article->title = $title;
        $this->article->content = $content;
        $this->article->user_id = $user_id;

        if($this->article->create()){
            header("Location: ../views/articles.php");
        } else {
            echo "Erreur lors de la création de l'article.";
        }
    }

    // Fonction pour lire tous les articles
    public function readAll(){
        return $this->article->readAll();
    }

    // Fonction pour mettre à jour un article
    public function update($id, $title, $content){
        $this->article->id = $id;
        $this->article->title = $title;
        $this->article->content = $content;

        if($this->article->update()){
            header("Location: ../views/articles.php");
        } else {
            echo "Erreur lors de la mise à jour de l'article.";
        }
    }

    // Fonction pour supprimer un article
    public function delete($id){
        $this->article->id = $id;

        if($this->article->delete()){
            header("Location: ../views/articles.php");
        } else {
            echo "Erreur lors de la suppression de l'article.";
        }
    }
}
?>
