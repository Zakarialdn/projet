<?php

//namespace Profile;
require_once('models/UpdateUserModel.php');
require_once('models/DeleteUserModel.php');


// OK 👍

class ProfileController
{
    private $template;

    public function showProfile()
    {
        // On inclut le template
        $this->template = "profile";

        // Également le layout qui gère le header et le footer
        include('views/layout.phtml');
    }

    public function updateProfile()
    {
        // Vérifier si le formulaire de mise à jour a été soumis
        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'])) {
            // On récupère l'id de l'utilisateur à partir de l'url
            $user_id = $_GET['id'];

            // Récupérer les nouvelles données du formulaire
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            // Instancier le modèle pour mettre à jour les informations de l'utilisateur
            $updateModel = new UpdateUserModel();

            // Appeler la méthode de mise à jour des informations de l'utilisateur
            $result = $updateModel->updateProfile($firstname, $lastname, $email, $password);

            // Vérifier si la mise à jour a réussi
            if ($result) {
                echo "Informations mises à jour avec succès";

                // Mettre à jour les valeurs dans la session avec les nouvelles données du formulaire
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                // Récupérer les nouvelles données du profil
                $userData = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => $password
                ];

                // Renvoyer les nouvelles données du profil au format JSON
                header('Content-Type: application/json');

                // Renvoyer les nouvelles données du profil au format JSON
                echo json_encode($userData);
                // var_dump($userData);

                // Rediriger vers la page de profil
                header("Location: index.php?url=profile&id=" . $_SESSION['user_id']);
                exit(); // On s'assure de terminer le script après la redirection

            } else {
                echo "Erreur lors de la mise à jour des informations";
                exit(); // Terminer le script en cas d'erreur

            }
        };

        // Si le formulaire n'est pas soumis, inclure le template de mise à jour du profile
        $this->template = "updateProfile";

        // Également le layout qui gère le header et le footer
        include('views/layout.phtml');
    }

    public function showConfirm()
    {
        // On inclut le template
        $this->template = "confirm";

        // Également le layout qui gère le header et le footer
        include('views/layout.phtml');
    }

    public function deleteProfile()
    {
        // Vérifier si l'utilisateur a confirmé la suppression
        if (isset($_POST['confirm_delete'])) {
            // Appeler la méthode de suppression du modèle
            $deleteModel = new DeleteUserModel;
            $result = $deleteModel->deleteUser($_SESSION['user_id']);

            // Vérifier si la suppression a réussi
            if ($result) {
                // Déconnecter l'utilisateur et rediriger vers la page de connexion
                // Assurez-vous de détruire la session ici avant de rediriger
                session_destroy();
                header("Location: index.php?url=login");
                exit();
            } else {
                echo "Erreur lors de la suppression du profil";
            }
        }

        // Afficher la page de confirmation de suppression
        $this->template = "confirm";
        include('views/layout.phtml');
    }
}
