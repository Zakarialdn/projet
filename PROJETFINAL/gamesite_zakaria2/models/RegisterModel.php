<?php

require_once 'config/database.php';


class RegisterModel
{
    private $pdo; // Objet de connexion à la base de données
    //private $stmt;
    private $role;

    public function __construct()
    {
        // erreur
        //  $this->$pdo = Core::getDatabase();
        // Initialise la connexion à la base de données 
        $this->pdo =  new Database();
    }
    public function emailExists($email)
    {
        $conn = $this->pdo->getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function registerUser($username, $email, $password, $role)
    {
        $conn = $this->pdo->getConnection();

        $this->role = "admin";
        $username = htmlspecialchars($username);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);

        // Hasher le mot de passe pour des raisons de sécurité
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Préparer la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");

        // Exécuter la requête avec les valeurs fournies
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        $result = $stmt->execute();

        // Vérifier les erreurs
        if ($result) {
            return true;
        } else {
            echo "Erreur lors de l'insertion dans la base de données";
            return false;
        }
    }
}
