<?php


/** A mettre dans LIB */


require_once 'Vue/Vue.php';



/** CHARGEMENT DES CLASSES A L'AIDE DE L'AUTOLOADER */
require_once 'App/Autoloader.php';
Autoloader::register();



class Routeur {

    /** Mettre les controleurs dans routerRequetes */

    /** @var ControleurAccueil  */
    private $ctrlAccueil;
    /** @var ControleurBillet  */
    private $ctrlBillet;

    /** On instancie les classes */
    public function __construct() {

        /** @var  ctrlBillet */
        $this->ctrlBillet = new ControleurBillet();
        /** @var  crtlConnexion */
        $this->crtlConnexion = new ControleurConnexion();
        /** @var  crtlPages */
        $this->crtlPages = new ControleurPages();
        /** @var  crtlAdmin */
        $this->crtlAdmin = new ControleurAdmin();

    }

    /** Route une requête entrante : exécution l'action associée */

    public function routerRequete() {

            /** s'il existe une action on execute la suite du programme */

            if (isset($_GET['action'])) {

                /**   -------------------------------- Les pages ------------------------------ */
                /** ___________________________________________________________________________ */

                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                }

                if ($_GET['action'] == 'createBillet') {
                    $this->ctrlBillet->creationBillet();
                }

                if ($_GET['action'] == 'connexion') {
                    $this->crtlConnexion->connexionPage();
                }

                if ($_GET['action'] == 'bibliographie') {
                    $this->crtlPages->bibliographiePage();
                }

                if ($_GET['action'] == 'contact') {
                    $this->crtlPages->contactPage();
                }

                if ($_GET['action'] == 'romans') {
                    $this->crtlPages->RomansPage();
                }


                /**   -------------------------------- Action de Connexion Admin ------------------------ */

                if ($_GET['action'] == 'admin') {
                    $this->crtlAdmin->AdminPage();
                }

                if ($_GET['action'] == 'login_user'){

                    $username = $this->getParametre($_POST, 'username');
                    $password = $this->getParametre($_POST, 'password');
                    $this->crtlConnexion->connect_user($username,$password);
                }

                if ($_GET['action'] == 'disconnect_user'){
                    $this->crtlConnexion->disconnect_user();
                }


                /**   -------------------------------- Action directe ------------------------------ */


                if ($_GET['action'] == 'creation') {
                    /** @var  $titre */
                    $titre = $this->getParametre($_POST, 'titre');
                    /** @var  $contenu */
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $this->ctrlBillet->creation($titre, $contenu);
                }

                if ($_GET['action'] == 'edition'){

                }

                if ($_GET['action'] == 'editBillet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->editPage($idBillet);

                }

                if ($_GET['action'] == 'deleteBillet') {
                    /** @var  $idBillet */
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->supprimer($idBillet);
                    header("location:index.php");

                }

                else if ($_GET['action'] == 'commenter') {
                    /** @var  $auteur */
                    $auteur = $this->getParametre($_POST, 'auteur');
                    /** @var  $contenu */
                    $contenu = $this->getParametre($_POST, 'contenu');
                    /** @var  $idBillet */
                    $idBillet = $this->getParametre($_POST, 'id');
                    /** @var  $idParent */
                    $idParent = $this->getParametre($_POST, 'id_parent');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet , $idParent);
                }
            }
            else {  // aucune action définie : affichage de l'accueil
                /** @var  ctrlAccueil */
                $this->ctrlAccueil = new ControleurAccueil();
                $this->ctrlAccueil->accueil();
            }

    }




    /** Affiche une erreur */

    public function erreur($msgErreur) {
        /** @var  $vue */
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    /** Recherche un paramètre dans un tableau */

    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
