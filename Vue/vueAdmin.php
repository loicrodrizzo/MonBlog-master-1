<?php
if(isset($_SESSION['username'])){?>

    <h1> DASHBOARD ADMIN </h1>

    <h2>Bienvenue <?= $_SESSION['username'] ?></h2>


    <article>
        <a href="<?= "index.php?action=createBillet" ?>">Création de billet</a>
    </article>


    <!-- ----------------------- liste des articles ---------------------------------------------- -->
    <div class="liste_articles">

        <?php
        $counter_billets = 0;
        foreach ($billets as $billet):
            $counter_billets ++;
            ?>
            <article>
                <header>
                    <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
                    </a>
                    <time><?= $billet['date'] ?></time>
                </header>
                <form method="POST" action="index.php?action=deleteBillet&id=<?= $billet['id']  ?>"">
                    <button type="submit">Supprimer</button>
                </form>
                <form method="post" action="index.php?action=editBillet&id=<?= $billet['id']  ?>">
                    <button type="submit">Modifier</button>
                </form>

            </article>
            <hr />
        <?php endforeach;

        echo 'il y a : '.$counter_billets.' Articles sur votre Blog';
        ?>



    </div>

    <!-- ----------------------- liste des commentaires ------------------------------------------ -->
    <div class="liste_commentaires">











    </div>




<?php
}
else{

    echo "Vous devez vous connecter";
}
?>


