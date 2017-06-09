<?php

class CreateUser extends Modele {


    /** Ajoute un compte utilisateur  dans la base */


    public function ajouterUser($id, $pseudo, $mdp)
    {

        $sql = 'INSERT INTO membres(id,pseudo,mdp)'
            . ' VALUES(?, ?, ?)';

        $this->executerRequete($sql, array($id,$pseudo,$mdp));

    }
}