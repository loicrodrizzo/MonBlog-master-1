<?php

require_once 'App/Database.php';

/** Corriger extends Modele */

class Commentaire extends Modele
{

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT COM_ID as id, COM_DATE as date,'
            . ' COM_AUTEUR as auteur, COM_CONTENU as contenu FROM t_commentaire'
            . ' WHERE BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    /** --------------------------  Affiche les commentaires imbriqués ------------------------------ */

    public function afficherCommentaires($idBillet)
    {

        /**  Niveau d'imbrication 0 */

        $sql0 = 'SELECT COM_ID as id, COM_DATE as date,'
            .' COM_AUTEUR as auteur, COM_CONTENU as contenu , COM_PARENT as id_parent FROM t_commentaire '
            .'WHERE (COM_PARENT = 0 AND BIL_ID='.$idBillet.')';

        $commentsList0= $this->executerRequete($sql0, array($idBillet));


        foreach ($commentsList0 as $comment0) {


            /** margin left : 0 px */
            echo '<div style="margin-left: 0px">';
            echo $comment0['auteur'].'<br/>';
            echo $comment0['contenu'].'<br/>'.'<br/>';
            echo '</div>';

            /** ---------------------------  Niveau d'imbrication 1 ---------------------------------------- */

            $sql1 = 'SELECT COM_ID as id, COM_DATE as date,'
                .' COM_AUTEUR as auteur, COM_CONTENU as contenu , COM_PARENT as id_parent FROM t_commentaire '
                .'WHERE COM_PARENT = ' . $comment0['id'] . '';

            $commentsList1= $this->executerRequete($sql1, array($idBillet));


            if (count($commentsList1)>0 ) {

                /** Pour chaque sous commentaire */

                foreach ($commentsList1 as $comment1) {
                    /** margin left : 25 px */
                    echo '<div style="margin-left: 25px">';
                    echo '<p>'.$comment1['auteur'].'</p><br/>';
                    echo $comment1['contenu'].'<br/>'.'<br/>';
                    echo '</div>';

                    /** --------------------------- Niveau d'imbrication 2 -----------------------------------------*/

                    $sql2 = 'SELECT COM_ID as id, COM_DATE as date,'
                        .' COM_AUTEUR as auteur, COM_CONTENU as contenu , COM_PARENT as id_parent FROM t_commentaire '
                        .'WHERE COM_PARENT = ' . $comment1['id'] . '';
                    $commentsList2= $this->executerRequete($sql2, array($idBillet));

                    if (count($commentsList2)>0 ) {

                        /** Pour chaque sous-commentaire */

                        foreach ($commentsList2 as $comment2) {

                            /** margin-left : 50px */
                            echo '<div classstyle="margin-left: 50px">';
                            echo $comment2['auteur'].'<br/>';
                            echo $comment2['contenu'].'<br/>'.'<br/>';
                            echo '</div>';

                            /** ---------------------------------- Niveau d'imbrication 3 -------------------------------------------*/

                            $sql3 = 'SELECT COM_ID as id, COM_DATE as date,'
                                .' COM_AUTEUR as auteur, COM_CONTENU as contenu , COM_PARENT as id_parent FROM t_commentaire '
                                .'WHERE COM_PARENT = ' . $comment2['id'] . '';
                            $commentsList3= $this->executerRequete($sql3, array($idBillet));

                            if (count($commentsList3)>0 ) {

                                /** Pour chaque sous-commentaire */
                                foreach ($commentsList3 as $comment3) {

                                    /** margin-left : 75px */
                                    echo '<div style="margin-left: 75px">';
                                    echo $comment3['auteur'].'<br/>';
                                    echo $comment3['contenu'].'<br/>'.'<br/>';
                                    echo '</div>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }


    /** --------------------------------  Ajout de commentaire --------------------- */

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet, $idParent)
    {
        $sql = 'INSERT INTO t_commentaire(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID, COM_PARENT)'
            . ' VALUES(?, ?, ?, ?, ?)';
        $date = date('Y-m-d H:i:s');  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet, $idParent));

    }

    public function getNombreCommentaires(){

    }
















































}