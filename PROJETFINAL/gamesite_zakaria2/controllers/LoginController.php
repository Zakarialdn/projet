<?php
// OK 👍

// On fait appel à la page model qui correspond
require_once('models/LoginModel.php');

// use models\LoginModel;

class LoginController
{
    // Propriétés encapsulées
    private $email;
    private $password;
    private $template;

    public function showLogin()
    {
        // Vérifier si le formulaire de connexion a été soumis
        if (isset($_POST['email'], $_POST['password'])) {
            // Récupérer les données du formulaire
            $this->email = htmlspecialchars($_POST['email']);
            $this->password = htmlspecialchars($_POST['password']);

            // Instancier le modèle pour vérifier les informations de connexion
            $loginModel = new LoginModel();

            // Appeler la méthode de vérification des informations de connexion
            $result = $loginModel->checkLogin($this->email, $this->password);

            // Vérifier si la connexion a réussi
            if ($result) {
                // echo "Connexion réussie";
                header("Location: index.php?url=profile&id=" . $_SESSION['user_id']);
            } else {

                echo "<p style='color: red;'>Adresse email ou mot de passe incorrect</p>";
            }
        }

        // Inclure le template
        $this->template = "login";

        // Inclure le layout qui gère le header et le footer
        include('views/layout.phtml');
    }
}
