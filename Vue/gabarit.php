<!DOCTYPE html>

<!-- cette vu est la vu principal du blog c'est sur cette page qu'on arrive quand on se connecte au site-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="Contenu/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Contenu/style.css" />
    <link  href="Contenu/javascript.js" />

    <script src="Contenu/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#myeditablediv',
            inline: true
        });
    </script>

    <title><?= $titre ?></title>

</head>

<body>

<div class="container">

    <div class="masthead">
        <h1 class="text-muted">Blog de Jean ForteRoche</h1>
        <nav>
            <ul class="nav nav-justified">
                <li class="active"><a href="index.php">Accueil</a></li>
                <li><a href="">Romans</a></li>
                <li><a href="index.php?page=bibliographie">Bibliographie</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>
            </ul>
        </nav>
    </div>

    <!-- Jumbotron -->
    <div class="jumbotron">
       <img src="Contenu/img/Bibliotheque.jpg" alt="photo livre"/>
    </div>

    <!-- Example row of columns -->
    <div class="row">
        <div class="col-sm-4">
            <h2>Prologue</h2>
            <!-- Contenu billet -->
            <p><a class="btn btn-primary" href="index.php?action=billet&id=8" role="button">Plus d'infos &raquo;</a></p>
        </div>
        <div class="col-sm-4">
            <h2>Episode 1</h2>
            <!-- Contenu billet -->
            <p><a class="btn btn-primary" href="index.php?action=billet&id=9" role="button">Plus d'infos  &raquo;</a></p>
        </div>
        <div class="col-sm-4">
            <h2>Episode 2</h2>
            <!-- Contenu billet -->
            <p><a class="btn btn-primary" href="index.php?action=billet&id=10" role="button">Plus d'infos  &raquo;</a></p>
        </div>
    </div>


    <div id="global">

        <div id="contenu">
            <?= $contenu ?>
        </div> <!-- #contenu -->
    </div>

    <article>
        <a href="<?= "index.php?action=createBillet"?>">Création de billet</a>
    </article>


    <!-- Site footer -->
    <footer class="footer">

        <p><a href="<?= "index.php?action=connexion"?>">Connexion</a></p><br/>

        <p>&copy; 2017 Rodrizzo</p>
    </footer>

</div> <!-- /container -->

</body>
</html>
