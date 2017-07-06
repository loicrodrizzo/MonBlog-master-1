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