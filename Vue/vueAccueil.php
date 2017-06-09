<?php $this->titre = "Mon Blog"; ?>

<header>
    <a href="index.php"><h1 id="titreBlog">Blog de Jean Forteroche</h1></a>
    <p>Je vous souhaite la bienvenue sur mon blog.</p>
    <p>Vous pouvez suivre l'avancement de mon roman par le biais d'episodes qui seront publié sur ce blog</p>
    <p>Bonne lecture à tous !</p>
</header>

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <time><?= $billet['date'] ?></time>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
