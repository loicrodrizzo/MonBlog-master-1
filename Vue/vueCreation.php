<?php $this->titre = "Mon Blog - Nouveau Billet " ; ?>
<h1>Page de création de Billet</h1>
<div class="jumbotron">

    <div class="col-md-8">
        <div class="row">
            <form method="post" action="index.php?action=creation">
                <div id="myeditablediv">

                    <label><textarea name="contenu"></textarea></label>

                </div>

                <label><input type="submit" name="submitEdition"/>Valider</label>
            </form>
        </div>
    </div>
</div>