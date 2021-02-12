<?php

class Model
{
    // PROPRIETE
    static $db = null;

    // METHODES
    static function connexion ()
    {
        // connexion
        define("DBHOST", "localhost");
        define("DBUSER", "root");
        define("DBPASS", "");
        define("DBNAME", "portfolio-bdd");

        $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;
        
        try{
            // On se connecte à la base de données en "instanciant" PDO
            Model::$db = new PDO($dsn, DBUSER, DBPASS);    // => PHP APPELLE LA METHODE CONSTRUCTEUR AVEC LES PARAMETRES
        
            // On définit le charset à "utf8"
            Model::$db->exec("SET NAMES utf8");
        
            // On définit la méthode de récupération (fetch) des données
            Model::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        }
        catch (PDOException $e){
            // PDOEException $e -> on attrape l'erreur provoquée par le new PDO en cas d'échec
            // On affiche le
            die($e->getMessage());
        }

    }
}