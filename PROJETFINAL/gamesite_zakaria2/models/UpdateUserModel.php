<?php


class UpdateUserModel
{
    private $username;
    private $email;
    private $password;
    private $pdo; // Objet de connexion à la base de données
    private $stmt;

    public function __construct()
    {
        // Initialise la connexion à la base de données 
        $this->pdo =  new Database();
    }

    public function updateProfile($username, $email, $password)
    {
        // On récupère l'id de l'utilisateur à partir de la session
        $userId = $_SESSION["user_id"];

        // Préparer la requête de mise à jour des informations de l'utilisateur
        $stmt = $this->pdo->query("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");

        // Exécuter la requête avec les nouvelles valeurs
        $result = $this->stmt->execute([$username, $email, $password, $userId]);

        // Vérifier les erreurs
        if (!$result) {
            // En cas d'erreur, afficher un message d'erreur
            $errorInfo = $this->stmt->errorInfo();
            echo "Erreur lors de la mise à jour des informations de l'utilisateur : " . $errorInfo[2];
            return false;
        } else {
            return true;
        }

        // Mettre à jour les informations stockées dans la session
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        // Retourner true si la mise à jour a réussi
        return true;
    }
}
