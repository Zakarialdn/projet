<?php

require_once 'config/database.php';

// use DomainException;

class LoginModel
{

    private $firstname;
    private $lastname;
    private $email;
    private $password;

    private $pdo; // Objet de connexion à la base de données
    private $stmt;

    public function __construct()
    {
        // Initialise la connexion à la base de données 
        $this->pdo =  new Database();
    }

    public function checkLogin($email, $password)

    {
        $conn = $this->pdo->getConnection();

        $email = $_POST['email'];

        $query = "SELECT id, username, email, password FROM users WHERE email = :email";
        // Préparer la requête de sélection pour vérifier les informations de connexion
        $stmt = $conn->prepare($query);
        // $query->execute([$this->email]);
        //$stmt->execute([$_POST['email']]);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($user);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            // Authentification réussie
            // Ouvrir une session (ça permet de sécuriser la connexion)
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['username'];
            // $_SESSION['lastname'] = $user['Lastname'];
            // $_SESSION['password'] = $user['Password'];
            $_SESSION['email'] = $user['email'];

            return true;
        } else {
            //Authentification échouée
             if (empty($user)) {
               echo("Cette adresse e-mail n'existe pas !");
            }
            return false;
        }
    }
}

