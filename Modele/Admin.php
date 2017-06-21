<?php

require_once 'App/Database.php';


class Admin extends Modele
{
    public function getAdmin()
    {
        $reponse = 'SELECT username  FROM users';
        $reach = $this->executerRequete($reponse, array());

        while ($donnees = $reach->fetch()) {
            session_start();
            $_SESSION['username'] = $donnees['username'];
            return $_SESSION;
        }

    }

}


