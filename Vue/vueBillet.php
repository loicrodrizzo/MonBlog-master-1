<?php $this->titre = "Mon Blog - " . $billet['titre']; ?>

<!-- cette vu permet d'afficher le billet sélectionné ainsi que ses commentaires-->

<article>
    <header>
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        <time><?= $billet['date'] ?></time>
    </header>
    <p><?= $billet['contenu'] ?></p>

    <form method="post" action="index.php?action=edition&id=<?= $billet['id']  ?>">
        <button type="submit">Modifier</button>
    </form>


    <form method="post" action="index.php?action=deleteBillet&id=<?= $billet['id']  ?>">
        <button type="submit">Supprimer</button>
    </form>

</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</header>
