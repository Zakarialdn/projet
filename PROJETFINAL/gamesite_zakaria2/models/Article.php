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
        $this->pdo = new Database();
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
        $conn = $this->pdo->getConnection();

        $query = "SELECT * FROM articles";
        $stmt = $conn->query($query);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    // Vérifier si l'utilisateur existe
    private function userExists($userId)
    {
        $conn = $this->pdo->getConnection();
        $stmt = $conn->prepare("SELECT id FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch() !== false;
    }

    // Insérer un nouvel article
    public function inser($title, $content, $userId, $imagePath)
    {
        try {
            // Préparer la requête avec des marqueurs de paramètres
            $stmt = $this->pdo->getConnection()->prepare("INSERT INTO articles (title, content, user_id, created_at, image) VALUES (?, ?, ?, NOW(), ?)");

            // Exécuter la requête avec les valeurs fournies
            $result = $stmt->execute([$title, $content, $userId, $imagePath]);

            // Vérifier les erreurs
            if (!$result) {
                // S'il y a une erreur, afficher le message d'erreur
                $errorInfo = $stmt->errorInfo();
                echo "Erreur lors de l'insertion dans la base de données : " . $errorInfo[2];
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
