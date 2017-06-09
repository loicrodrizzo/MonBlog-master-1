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
}