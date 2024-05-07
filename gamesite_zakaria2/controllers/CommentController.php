<?php

class CommentController
{
    public function addComment($content, $articleId, $userId)
    {
        // // Vérifier si le contenu du commentaire n'est pas vide
        // if (empty($content)) {
        //     // Gérer l'erreur si le contenu est vide
        //     return "Le contenu du commentaire ne peut pas être vide.";
        // }

        // // Vérifier si l'ID de l'article et l'ID de l'utilisateur sont valides (non nuls)
        // if (empty($articleId) || empty($userId)) {
        //     // Gérer l'erreur si l'ID de l'article ou l'ID de l'utilisateur est manquant
        //     return "L'identifiant de l'article ou de l'utilisateur est manquant.";
        // }

        // try {
        //     // Créer une nouvelle instance de la classe Database et obtenir la connexion
        //     $db = new Database();
        //     $conn = $db->getConnection();

        //     // Préparer la requête d'insertion du commentaire dans la base de données
        //     $query = "INSERT INTO comments (content, article_id, user_id) VALUES (:content, :articleId, :userId)";
        //     $statement = $conn->prepare($query);

        //     // Liaison des valeurs aux paramètres de la requête préparée
        //     $statement->bindParam(':content', $content);
        //     $statement->bindParam(':articleId', $articleId);
        //     $statement->bindParam(':userId', $userId);

        //     // Exécution de la requête préparée
        //     $statement->execute();

        //     // Retourner un message de succès ou une valeur indiquant que l'ajout du commentaire s'est bien déroulé
        //     return "Le commentaire a été ajouté avec succès.";
        // } catch (PDOException $exception) {
        //     // Gérer les erreurs éventuelles lors de l'exécution de la requête
        //     return "Une erreur est survenue lors de l'ajout du commentaire : " . $exception->getMessage();
        // }
    }


    public function updateComment($commentId, $content)
    {
        // Logique de mise à jour de commentaire
    }

    public function deleteComment($commentId)
    {
        // Logique de suppression de commentaire
    }

    public function showComments($articleId)
    {
        // Logique d'affichage des commentaires associés à un article
    }
}
