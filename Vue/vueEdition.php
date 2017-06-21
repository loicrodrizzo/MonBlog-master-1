<?php $this->titre = "Mon Blog - Edition le billet" ; ?>



<article>

    <p></p>

    <form method="post" action="index.php?action=editer">
        <div id="myeditablediv">

            <label><textarea name="contenu"><?=$billet['contenu']?></textarea></label>

        </div>

        <label><input type="submit" name="submitEdition"/>Valider</label>
    </form>

</article>
