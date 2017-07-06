<?php


/**
 **************************************************************************
 * Classe abstraite Modèle.                                               *
 * Centralise les services d'accès à une base de données.                 *
 **************************************************************************
 */
require_once 'Configuration.php';

class Database extends Configuration
{

    /** Objet PDO d'accès à la BD */

    private static $bdd;

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     *
     * @return PDO L'objet PDO de connexion à la BDD
     */

    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
    protected function getBdd()
    {
        if (self::$bdd === null) {
            // Récupération des paramètres de configuration
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            //Création de la connexion
            self::$bdd = new \PDO($dsn, $login, $mdp, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }

}