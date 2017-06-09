<?php

require_once 'App/Database.php';


class Billet extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getBillets() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    public function ajouterBillet($titre, $contenu){
        $sql = 'INSERT INTO t_billet(BIL_DATE, BIL_TITRE, BIL_CONTENU ) VALUES (?,?,?)';
        $date = date('Y-m-d H:i:s');  // Récupère la date courante
        $this->executerRequete($sql, array($date, $titre, $contenu));
    }

    public function deleteBillet($idBillet){
        $sql = "DELETE FROM t_billet WHERE BIL_ID = ? ";
        $this->executerRequete($sql, array($idBillet));
    }

    public function editerBillet($idBillet,$titre, $contenu){

    }

}