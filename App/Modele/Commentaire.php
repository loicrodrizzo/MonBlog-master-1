<?php

namespace Lib\Modele;

class Commentaire extends ModeleMaster
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


    /** --------------------------------  Ajout de commentaire --------------------- */

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet, $idParent)
    {
        $sql = 'INSERT INTO t_commentaire(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID, COM_PARENT)'
            . ' VALUES(?, ?, ?, ?, ?)';
        $date = date('Y-m-d H:i:s');  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet, $idParent));

    }


    //Renvoie le nombre total de commentaires
    public function getNombreCommentaires()
    {
        $sql='SELECT COUNT(*) as nbCommentaires from t_commentaire';
        $resultat = $this->executerRequete($sql);
        $ligne=$resultat->fetch();
        return $ligne['nbCommentaires'];
    }

    /** ===================================  GESTION COMMENTAIRES SIGNALES ============================================================*/

    //Renvoie le nombre de commentaires signalés
    public function getNombreCommentairesSignales()
    {
        $sql='SELECT COUNT(*) as nbCommentairesSignales from t_commentaire WHERE COM_SIGN=1';
        $resultat=$this->executerRequete($sql);
        $ligne=$resultat->fetch();
        var_dump($ligne['nbCommentairesSignales']);
        return $ligne['nbCommentairesSignales'];

    }

    //Signale un commentaire
    public function signalerCommentaire($idCommentaire)
    {
        $sql ='UPDATE T_COMMENTAIRE SET COM_SIGN=1 WHERE COM_ID =?';
        $this->executerRequete($sql,array($idCommentaire));
    }

    //Retourne les commentaires signalés
    public function getCommentairesSignales()
    {
        $sql = ('SELECT COM_ID AS id, COM_DATE as date, COM_AUTEUR AS auteur, COM_CONTENU AS contenu FROM t_commentaire WHERE COM_SIGN =1 ORDER BY COM_ID DESC');
        $commentairesSignales = $this->executerRequete($sql);
        return $commentairesSignales;
    }

    /** ===================================  GESTION COMMENTAIRES  ============================================================*/

    public function deleteCommentaire($idCommentaire)
    {
        $sql=('DELETE FROM T_COMMENTAIRE WHERE COM_ID=?');
        $this->executerRequete($sql, array($idCommentaire));
    }
    public function validateCommentaire($idCommentaire)
    {
        $sql=('UPDATE T_COMMENTAIRE SET COM_SIGN=0 WHERE COM_ID=?');
        $this->executerRequete($sql,array($idCommentaire));
    }





}