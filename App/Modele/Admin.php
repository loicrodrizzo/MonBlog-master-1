<?php


namespace Lib\Modele;

class Admin extends ModeleMaster
{
    public function getAdmin()
    {
        $reponse = 'SELECT username  FROM users';
        $reach = $this->executerRequete($reponse, array());

        while ($donnees = $reach->fetch()) {
            $_SESSION['username'] = $donnees['username'];
            return $_SESSION;
        }

    }

}


