<?php

class Database
{
    private $host = "localhost";
    private $db_name = "game_zakaria";
    private $username = "root";
    private $password = "";
    public $pdo;

    // Méthode pour obtenir la connexion à la base de données
    public function getConnection()
    {
        $this->pdo = null;

        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("set names utf8");
        } catch (PDOException $exception) {
            // Afficher l'erreur
            echo "Erreur de connexion : " . $exception->getMessage();
            // Lancer à nouveau l'exception pour permettre au code appelant de gérer l'erreur
            throw $exception;
        }

        return $this->pdo;
    }

    public function query($query, $params = [])
    {
        // Obtenir la connexion à la base de données
        $pdo = $this->getConnection();

        $statement = $pdo->prepare($query);

        try {
            $statement->execute($params);
            return $statement;
        } catch (PDOException $exception) {
            // Gérer l'erreur ici (par exemple, journalisation, affichage d'un message d'erreur, etc.)
            echo "Erreur d'exécution de la requête : " . $exception->getMessage();
            throw $exception;
        }
    }
}
