<?php

require_once 'App/Database.php';


class Connexion extends Modele
{

    public function login($username, $password)
    {
        if (empty($username)) {
            $errors = "L'identifiant n'a pas été saisit";
            var_dump($errors);
        } elseif (empty($password)) {
            $errors = "Le mot de passe n'a pas été saisit";
            var_dump($errors);
        } else {
            /* Recueil du contenu de la base de donnée */
            $reponse = 'SELECT username,password FROM users';
            $reach = $this->executerRequete($reponse, array($username, $password));
            var_dump($reach);
            while ($donnees = $reach->fetch()) {

                if ($donnees['username'] == $username AND $password == $donnees['password']) {
                    /* Définission de variable session */

                    session_start();
                    $_SESSION['username'] = $username;


                    header('Location: index.php?action=admin');

                }
                else{
                    echo 'Mauvaus identifiant';
                    header('Location: index.php?action=connexion');
                }


            }

            /* Fermeture requête base de donnée*/
            $reach->closeCursor();

        }


    }

    public function logout(){
        /** On écrase le tableau de session */
        $_SESSION = array();

        /** On détruit la session */
        session_destroy();

        /**puis ensuite il faudra rediriger ta page avec un */
        header("location:index.php");



    }

}


