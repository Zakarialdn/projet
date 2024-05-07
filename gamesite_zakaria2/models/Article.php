<?php
require_once 'config/database.php'; // Assurez-vous que le chemin est correct

class Article
{
    private $pdo;
    private $id;
    private $title;
    private $content;
    private $categoryId; // Category ID
    private $userId; // Author ID
    private $createdAt;
    private $stmt;

    // Constructor
    public function __construct()
    {
        $this->pdo =  new Database();
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        // $db = new Database();
        $conn = $this->pdo->getConnection();

        $query = "SELECT * FROM articles";
        $stmt = $conn->query($query);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($articles);

        // Récupérer les résultats sous forme d'objets Article
        // $article = [];
        // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //     $article = new Article($row['title'], $row['content'], $row['created_at']);
        //     $article[] = $article;
        // }

       // var_dump($stmt);
        // Retourner les articles récupérés
       return $articles;
    }


    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function inser($title, $content)
    {
        try {
            // Préparer la requête avec des marqueurs de paramètres
            $stmt = $this->pdo->getConnection()->prepare("INSERT INTO articles (title, content, created_at) VALUES (?, ?, NOW())");

            // Exécuter la requête avec les valeurs fournies
            $result = $stmt->execute([$title, $content]);

            var_dump($result);

            // Vérifier les erreurs
            if (!$result) {
                // S'il y a une erreur, afficher le message d'erreur
                $errorInfo = $stmt->errorInfo();
                echo "Erreur lors de l'insertion dans la base de données : " . $errorInfo[2];
                // Ou enregistrez l'erreur dans un fichier journal ou journal de débogage
                // file_put_contents('error.log', $errorInfo[2], FILE_APPEND);
            }

            // Retourner true si l'insertion a réussi, sinon false
            return $result;
        } catch (PDOException $e) {
            // Gérer l'exception
            echo "Erreur PDO lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }
}
