<?php


/**
 **************************************************************************
 * Classe abstraite Modèle.                                               *
 * Centralise les services d'accès à une base de données.                 *
 **************************************************************************
*/
require_once 'dev.php';


    class Database extends Dev {

    /** Objet PDO d'accès à la BD */

    private $bdd;

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     *
     * @return PDO L'objet PDO de connexion à la BDD
     */

    protected function getBdd() {
        if ($this->bdd == null) {
            // Création de la connexion

            $this->bdd = new \PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8',
                ''.self::DB_USER.'', ''.self::DB_PWD.'',
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }

}