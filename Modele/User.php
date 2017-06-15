<?php

Class User  extends Modele {

    /** Affiche la liste des utilisateurs */
    public function getUsers() {
        $sql = 'select id as id, pseudo as pseudo,'
            . ' from membres '
            . ' order by id desc';
        $users = $this->executerRequete($sql);
        return $users;
    }

    /** Affiche les informations sur un utilisateur */
    public function getUser($id) {
        $sql = 'select id as id, pseudo as pseudo,'
            . ' from membre'
            . ' where id=?';
        $users = $this->executerRequete($sql, array($id));
        if ($users->rowCount() > 0)
            return $users->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun User ne correspond à l'identifiant '$users'");
    }

    /** Connection de l'utilisateur */
    public function connectUser($pseudo , $mdp ){

        session_start();
        $sql = 'select id as id , pseudo as pseudo , mdp as mdp from membre';

        $users = $this->executerRequete($sql , array($pseudo,$mdp));

        if (isset($_POST) && !empty($_POST["pseudo"] && $_POST["mdp"])) {
            if ($pseudo === $_POST["pseudo"] AND $mdp === $_POST["mdp"]) {

            } else {
                throw new Exception("Aucun User ne correspond à l'identifiant '$users'");
            }
        }
        else{

        }
    }



    /** Déconnecte l'utilisateur  */
    public function deconnectUser()
    {
        session_destroy();
        header("Location : index.php");
    }



    /** fonction qui permet de savoir si l'utiliateur est connecté */
    static function isLogged()
    {
        if(isset($_SESSION["Auth"]) && isset($_SESSION["pseudo"]) && isset($_SESSION["mdp"]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}