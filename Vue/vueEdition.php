<?php $this->titre = "Mon Blog - Edition le billet" ; ?>

<article>
    <header>
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        <time><?= $billet['date'] ?></time>
    </header>
    <p></p>

    <form method="post" action="index.php?action=editerBillet">
        <div id="myeditablediv">

            <textarea name="contenu"><?= $billet['contenu'] ?></textarea>

        </div>

        <label><input type="submit" name="submitEdition"/>Valider</label>
    </form>

</article>
