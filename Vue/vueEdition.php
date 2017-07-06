<?php $this->titre = "Mon Blog - Edition le billet"; ?>


<div class="jumbotron">

    <div class="col-md-8">
        <div class="row">
            <div class="jumbotron">
            <form method="post" action="index.php?action=creation">
                <div class="myeditablediv">

                    <label><textarea name="contenu"><?= $billet['contenu'] ?></textarea></label>

                </div>

                <label><input type="submit" name="submitEdition"/>Valider</label>
            </form>
            </div>
        </div>
    </div>

</div>
