<?php

// OK 👍

// On fait appel à la page model qui correspond
require_once('models/RegisterModel.php');

//use models\RegisterModel; 

class RegisterController
{
    // Propriétés encapsulées
    private $firstname;
    private $lastname;
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
            // $this->firstname = htmlspecialchars($_POST['firstname']);
            // $this->lastname = htmlspecialchars($_POST['lastname']);
            $this->username = htmlspecialchars($_POST['username']);
            $this->email = htmlspecialchars($_POST['email']);
            $this->password = htmlspecialchars($_POST['password']);
            //$roleBis = $registerModel->$role;
            $role = "admin"; 

            // Obtenir la date actuelle
           // $date = date("Y-m-d H:i:s");

            

            // Appeler la méthode d'ajout d'utilisateur
            $result = $registerModel->registerUser($this->username, $this->email, $this->password, $role);
            var_dump($result);
            // Vérifier si l'inscription a réussi
            if ($result) {
                echo "Inscription réussie";
                header("Location: index.php?url=login");
            } else {
                echo "Erreur lors de l'inscription";
            }
        }

        // Inclure le template
        $this->template = "register";

        // Inclure le layout qui gère le header et le footer
        include('views/layout.phtml');
    }
}
