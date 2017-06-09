<?php

class Vue {

    // Nom du fichier associé à la vue
    private $fichier;
    
    // Titre de la vue (défini dans le fichier vue)
    private $titre;

    public function __construct($action) {
        // Détermination du nom du fichier vue à partir de l'action
        $this->fichier = "Vue/vue" . $action . ".php";

    }

    // Génère et affiche la vue
    public function generer($donnees) {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('Vue/gabarit.php',
                array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;



    }


    // Génère un fichier vue et renvoie le résultat produit
    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

    /**public function afficherpage($donnees) {

        $contenu = $this->genererFichier($this->fichier, $donnees);
        try {
            if ($_GET['action'] == 'creation') {
                $vue = $this->genererFichier('Vue/vueCreation.php',
                    array('titre' => $this->titre, 'contenu' => $contenu));
                echo $vue;
            }
            if ($_GET['action'] == 'edition') {
                $vue = $this->genererFichier('Vue/vueEdition.php',
                    array('titre' => $this->titre, 'contenu' => $contenu));
                echo $vue;
            }
            if ($_GET['action'] == 'connexion'){
                $vue = $this->genererFichier('Vue/vueConnexion.php',
                    array('titre' => $this->titre, 'contenu' => $contenu));
                echo $vue;
            }
            else {
                echo 'cette page n\'existe pas ';
            }
        }
        catch (Exception $e) {
            echo 'erreur';
        }
    }
     **/

}