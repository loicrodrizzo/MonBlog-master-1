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

<?php foreach ($commentaires as $commentaire): ?>
<div style="margin-left: 50px;">
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>

    <?php if(isset($commentaire['id_parent'])) { ?>

    <p><?= $commentaire['auteur'] ?> répond :</p>
    <p><?= $commentaire['contenu'] ?></p>


    <?php } ?>

    <form method="post" action="index.php?action=commenter">

        <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo"  required />

        <br/>

        <textarea id="txtCommentaire" name="contenu" rows="4"
                  placeholder="Votre commentaire" required></textarea>

        <br/>

        <input type="hidden" name="id" value="<?= $billet['id'] ?>" />

        <input type="hidden"  name="id_parent" value="<?= $commentaire['id_parent'] = $commentaire['id'] ?>"/>

        <input type="submit" value="Commenter" />

    </form>
</div>
<?php endforeach; ?>

<hr/>

<form method="post" action="index.php?action=commenter">

    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo"  required />

    <br/>

    <textarea id="txtCommentaire" name="contenu" rows="4"
              placeholder="Votre commentaire" required></textarea>

    <br/>

    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />

    <input type="submit" value="Commenter" />


</form>