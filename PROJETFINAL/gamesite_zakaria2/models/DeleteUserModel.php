<?php

//namespace models;
require_once 'config/database.php';
// use Core;

class DeleteUserModel
{
    private $pdo;
    private $stmt;

    public function __construct()
    {
        $this->pdo =  new Database();
    }

    public function deleteUser($user_id)
    {
        // Préparer la requête de suppression de l'utilisateur
        $stmt = $this->pdo->query("DELETE FROM users WHERE id = ?");

        // Exécuter la requête avec l'ID de l'utilisateur à supprimer
        $result = $this->stmt->execute([$user_id]);

        // Retourner true si la suppression a réussi, sinon false
        return $result;
    }
}
