<?php

// OK 👍

// On fait appel à la page model qui correspond
require_once('models/RegisterModel.php');

//use models\RegisterModel; 

class RegisterController
{
    // Propriétés encapsulées
    private $username;
    private $email;
    private $password;
    private $template;
    //private $roleBis;

    public function showRegister()
    {
        // Vérifier si le formulaire a été soumis
        if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {

            // Instancier le modèle pour effectuer l'ajout de l'utilisateur
            $registerModel = new RegisterModel;

            // Récupérer les données du formulaire
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $role = "admin";

            // Vérifier si l'adresse e-mail existe déjà
            if ($registerModel->emailExists($email)) {
                echo "<p style='color: red;'>L'adresse e-mail existe déjà. Veuillez en choisir une autre.</p>";
            } else {
                // Appeler la méthode d'ajout d'utilisateur
                $result = $registerModel->registerUser($username, $email, $password, $role);

                // Vérifier si l'inscription a réussi
                if ($result) {
                    echo "<p style='color: green;'>Inscription réussie. Redirection en cours...</p>";
                    header("refresh:10;url=index.php?url=login"); // Rediriger après 3 secondes
                    exit;
                } else {
                    echo "<p style='color: red;'>Erreur lors de l'inscription</p>";
                }
            }
        }

        // Inclure le template
        $this->template = "register";

        // Inclure le layout qui gère le header et le footer
        include('views/layout.phtml');
    }
}
