<?php
require_once 'models/Article.php';
// require_once 'config/database.php';

class ArticleController
{
    private $template;
    private $show;
    private $article;
    private $pdo;
    private $title;
    private $content;
    private $category_id;
    private $user_id;
    private $created_at;

    public function createArticle()
    {

        // Vérifier si le formulaire a été soumis
        if (isset($_POST['title'], $_POST['content'])) {
            // Récupérer les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            // $created_at = htmlspecialchars($_POST['created_at']);

            // Instancier le modèle d'article pour effectuer l'ajout de l'article
            $article = new Article();

            // Appeler la méthode d'ajout d'article
            $result = $article->inser($title, $content);
            var_dump($result);

            // Vérifier si la création de l'article a réussi
            if ($result) {
                echo "Article créé avec succès";
                // Rediriger vers une autre page ou afficher un message de succès
            } else {
                echo "Erreur lors de la création de l'article";
            }
        }

        $this->template = "add_article";

        // if (!isset($this->pdo)) {
        //     $this->pdo = new Database();
        // }

        // $pdo = $this->pdo->getConnection();

        include('views/layout.phtml');
    }

    public function updateArticle($articleId, $title, $content, $categoryId)
    {
        // Logique de mise à jour d'article
    }

    public function deleteArticle($articleId)
    {
        // Logique de suppression d'article
    }

    public function showArticle()
    {
        $article = new Article(); // Instancier l'objet ArticleModel

        // Récupérer les détails de l'article en utilisant l'identifiant passé en paramètre
        $articleModel = $article->getContent();

        var_dump($articleModel);
        // Vérifier si l'article existe
        if ($articleModel) {
            // Afficher les détails de l'article
            echo "article récupéré";
        } else {
            // Si l'article n'existe pas, afficher un message d'erreur
            echo "L'article n'existe pas.";
        }
        $this->template = "article";

        // Également le layout qui gère le header et le footer
        include('views/layout.phtml');
    }

    public function getAllArticles()
    {
        // $this->pdo = new Database();
        // $conn = $this->pdo->getConnection();

        // $query = "SELECT * FROM articles";
        // $stmt = $conn->prepare($query);
        // $stmt->execute();

        // $articles = [];
        // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //     $article = new Article($row['title'], $row['content'], $row['created_at']);
        //     $articles[] = $article;
        // }

        // return $articles;
    }
}
