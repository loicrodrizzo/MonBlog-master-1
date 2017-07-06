<?php

namespace Lib\Modele;
use Lib\Library as LL;

class Connexion extends ModeleMaster
{
    public function login($username, $password)
    {

        $is_valid = LL\GUMP::is_valid($_POST, array(
            'username' => 'required|alpha_numeric',
            'password' => 'required|max_len,100|min_len,6'
        ));

        if($is_valid === true) {
            // continue
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
                        $_SESSION['username'] = $username;
                        header('Location: index.php?action=admin');
                    }
                    else{
                        echo 'Mauvais identifiant';
                        header('Location: index.php?action=connexion');
                    }
                }
                /* Fermeture requête base de donnée*/
                $reach->closeCursor();
            }
        } else {
            print_r($is_valid);
        }



    }

    public function logout(){
        /** On écrase le tableau de session */
        $_SESSION = array();

        /** On détruit la session */
        session_destroy();
        /** On redirige l'utilisateur vers l'accueil  */
        header("location:index.php");
    }

}


