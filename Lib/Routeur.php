<?php


namespace Lib;

require_once 'Vue.php';


class Routeur {

    /** Déclaration des Variable Private*/
    private $crtlPages;
    private $crtlAdmin;
    private $ctrlBillet;
    private $crtlConnexion;
    private $ctrlAccueil;

        /** Route une requête entrante : exécution l'action associée */
        public function routerRequete() {

                /** s'il existe une action on execute la suite du programme */
                if (isset($_GET['action'])) {
                    /**   -------------------------------- Les pages ------------------------------ */
                    /** ___________________________________________________________________________ */

                    if ($_GET['action'] == 'billet') {
                        /** @var  ctrlBillet */
                    $this->ctrlBillet = new Controleur\ControleurBillet();
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    }
                    else
                        throw new \Exception("Identifiant de billet non valide");
                }

                if ($_GET['action'] == 'createBillet') {
                    /** @var  ctrlBillet */
                    $this->ctrlBillet = new Controleur\ControleurBillet();
                    $this->ctrlBillet->creationBillet();
                }

                if ($_GET['action'] == 'connexion') {
                    /** @var  crtlConnexion */
                    $this->crtlConnexion = new Controleur\ControleurConnexion();
                    $this->crtlConnexion->connexionPage();
                }

                if ($_GET['action'] == 'bibliographie') {
                    /** @var  crtlPages */
                    $this->crtlPages = new Controleur\ControleurPages();
                    $this->crtlPages->bibliographiePage();
                }

                if ($_GET['action'] == 'contact') {
                    /** @var  crtlPages */
                    $this->crtlPages = new Controleur\ControleurPages();
                    $this->crtlPages->contactPage();
                }

                if ($_GET['action'] == 'romans') {
                    /** @var  crtlPages */
                    $this->crtlPages = new Controleur\ControleurPages();
                    $this->crtlPages->RomansPage();
                }

                /**   -------------------------------- Action de Connexion Admin ------------------------ */

                if ($_GET['action'] == 'admin') {
                    /** @var  crtlAdmin */
                    $this->crtlAdmin = new Controleur\ControleurAdmin();
                    $this->crtlAdmin->AdminPage();
                }

                if ($_GET['action'] == 'login_user'){
                    /** @var  crtlConnexion */
                    $this->crtlConnexion = new Controleur\ControleurConnexion();
                    $username = $this->getParametre($_POST, 'username');
                    $password = $this->getParametre($_POST, 'password');
                    $this->crtlConnexion->connect_user($username,$password);
                }

                if ($_GET['action'] == 'disconnect_user'){
                    /** @var  crtlConnexion */
                    $this->crtlConnexion = new Controleur\ControleurConnexion();
                    $this->crtlConnexion->disconnect_user();
                }

                /**   -------------------------------- Action directe ------------------------------ */

                if ($_GET['action'] == 'creation') {
                    /** @var  ctrlBillet */
                    $this->ctrlBillet = new Controleur\ControleurBillet();
                    /** @var  $titre */
                    $titre = $this->getParametre($_POST, 'titre');
                    /** @var  $contenu */
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $this->ctrlBillet->creation($titre, $contenu);
                }


                if ($_GET['action'] == 'edition'){
                    $idBillet = $this->getParametre($_POST,"id");
                    $titre = $this->getParametre($_POST,"titre");
                    $contenu = $this->getParametre($_POST,"contenu");
                    $this->ctrlBillet->update($titre, $contenu, $idBillet);
                }

                if ($_GET['action'] == 'editBillet') {
                    /** @var  ctrlBillet */
                    $this->ctrlBillet = new Controleur\ControleurBillet();
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->editPage($idBillet);
                }

                if ($_GET['action'] == 'deleteBillet') {
                    /** @var  ctrlBillet */
                    $this->ctrlBillet = new Controleur\ControleurBillet();
                    /** @var  $idBillet */
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->supprimer($idBillet);
                    header("location:index.php");
                }


                /** ==================================== LES COMMENTAIRES ===================================================== */

                if ($_GET['action'] == 'signalerCommentaire'){
                    $idCommentaire = $this->getParametre($_GET,"id");
                    $this->ctrlBillet->signaler($idCommentaire);

                }


                else if ($_GET['action'] == 'commenter') {
                    /** @var  ctrlBillet */
                    $this->ctrlBillet = new Controleur\ControleurBillet();
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
                $this->ctrlAccueil = new Controleur\ControleurAccueil();
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
            throw new \Exception("Paramètre '$nom' absent");
    }

}
