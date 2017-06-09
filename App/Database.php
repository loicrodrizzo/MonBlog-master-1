<?php

/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO
 */
abstract class Modele {

    /** Objet PDO d'accès à la BD */
    private $bdd;

    /** Constantes de connexion à la base de données */


    const DB_HOST = 'localhost'     ;

    const DB_NAME = 'blog3'         ;

    const DB_USER = 'root'          ;

    const DB_PWD  = ''              ;



    /**
     * Exécute une requête SQL éventuellement paramétrée
     *
     * @param string $sql La requête SQL
     * @param array $valeurs Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     *
     */

    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        }
        else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     *
     * @return PDO L'objet PDO de connexion à la BDD
     */

    private function getBdd() {
        if ($this->bdd == null) {
            // Création de la connexion

            $this->bdd = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8',
                ''.self::DB_USER.'', ''.self::DB_PWD.'',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }

}