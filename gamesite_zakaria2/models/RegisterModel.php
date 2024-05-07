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

    public function registerUser($username, $email, $password, $role)
    {
        $conn = $this->pdo->getConnection();

        $this->role = "admin"; 
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Hasher le mot de passe pour des raisons de sécurité
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Préparer la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");

        // Exécuter la requête avec les valeurs fournies
        //$result = $this->stmt->execute([$username, $email, $role, $hashedPassword]);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        $result = $stmt->execute();
        //$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        var_dump($result);

        // // Vérifier les erreurs
         if ($result) {
        // Renvoyer true si l'insertion a réussi
        return true;
    } else {
        // Afficher un message d'erreur si l'insertion a échoué
        echo "Erreur lors de l'insertion dans la base de données";
        return false;
    }
}
}
