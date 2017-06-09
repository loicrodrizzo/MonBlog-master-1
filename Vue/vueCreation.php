<?php $this->titre = "Mon Blog - Nouveau Billet " ; ?>
<h1>Page de création de Billet</h1>
<div class="jumbotron">

    <form method="post" action="index.php?action=ajouterBillet">

        <label><input type="text" name="titre">Titre</input></label><br/>

        <!-- TINYmce pour ecrire du texte sans passer par du HTML -->
        <div id="myeditablediv">

            <label><input type="text"  name="contenu" >Ecrire votre Billet</input></label>

        </div>


        <label><input type="submit" name="addBillet">Ajouter un billet</input></label>
    </form>
</div>