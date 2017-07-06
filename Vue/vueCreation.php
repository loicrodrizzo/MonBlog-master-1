<?php $this->titre = "Mon Blog - Nouveau Billet "; ?>


<article>
    <div class="col-md-12">
        <div class="row">
            <div class="jumbotron">
                <h2>Page de création de Billet</h2>
                <form method="post" action="index.php?action=creation">

                    <label>Titre :<input name="titre"/></label>
                    <div class="myeditablediv">
                        <label>Contenu :<textarea name="contenu"></textarea></label>
                    </div>
                    <label><input type="submit" name="submitEdition"/>Valider</label>
                </form>
            </div>
        </div>
    </div>
</article>