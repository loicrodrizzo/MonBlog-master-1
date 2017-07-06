<?php $this->titre = "Mon Blog"; ?>
<div class="row">
    <div class="col-md-12">

        <!--Post data-->
        <div class="jumbotron">
            <header>
                <p>Je vous souhaite la bienvenue sur mon blog.</p>
                <p>Vous pouvez suivre l'avancement de mon roman par le biais d'episodes qui seront publié sur ce
                    blog</p>
                <p>Bonne lecture à tous !</p>
            </header>
        </div>
    </div>

    <div class="col-md-12">

        <div class="jumbotron">
            <h2>Articles Récents</h2>
            <?php foreach ($billets as $billet):
            ?>

            <!--Section: Blog v.4-->
            <section class="section section-blog-fw">

                <!--First row-->
                <div class="row">
                    <div class="col-md-12">

                        <!--Post data-->
                        <div class="jumbotron">
                            <article>
                                <header>
                                    <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                                        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
                                    </a>
                                    <time><?= $billet['date'] ?></time>
                                </header>
                                <p><?= substr($billet['contenu'], 0, 45).'...'; ?></p>
                            </article>
                        </div>
                    </div>
                </div>

                <hr/>
                <?php endforeach; ?>


        </div>


    </div>
</div>

