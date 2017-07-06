<?php

if (isset($_SESSION['username'])) {?>

    <?php $this->titre = "Mon Blog - Administration" ?>

    <div class="col-md-12 thumbnail" style="background-color: grey; padding: 15px; margin-bottom: 1px;">

        <h3><i class="fa fa-user" aria-hidden="true"></i>
            Bienvenue Admin!</h3>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div id="accordeon" class="panel-group col-md-14 thumbnail"
                 style="background-color: grey;padding :10px;margin-bottom: 1px; ">
                <h4>Dashboard</h4>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a href="#item1" data-parent="#accordeon" data-toggle="collapse">
                                Billets
                            </a>
                        </h3>
                        <form method="post" action="index.php?action=createBillet">
                            <button type="submit" class="btn btn-primary btn-xs">Création de Billet</button>
                        </form>
                    </div>

                    <div class="panel-body">
                        <p>Il y a <?= $nbBillets['nbBillets'] ?> Billets publiés</p><br/>
                        <ul class="list-group">
                            <?php foreach ($billets as $billet): ?>

                                <li class="list-group-item">
                                    <p style="overflow-wrap: break-word"><?= $billet['titre'] ?></p>
                                    <p>le <?= $billet['date'] ?></p>

                                    <form method="post" action="index.php?action=edition&id=<?= $billet['id'] ?>">
                                        <button type="submit" class="btn btn-primary btn-xs">Modifier</button>
                                    </form>


                                    <form method="post" action="index.php?action=deleteBillet&id=<?= $billet['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-xs">Supprimer</button>
                                        <br/><br/><br/><br/>
                                    </form>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>


        </div>


        <!---------------------------------------------   -------------------------------------->


        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="#item3" data-parent="#accordeon" data-toggle="collapse">
                        <p>Il y a <?= $nbCommentairesSignales ?> commentaires signalés</p>

                    </a>
                </h3>
            </div>


            <div class="panel-body">
                <ul class="list-group">
                    <?php foreach ($commentairesSignales as $commentaireSignale) { ?>

                        <li class="list-group-item">
                            <p style="overflow-wrap: break-word"><?= $commentaireSignale['contenu']; ?></p>
                            <p>par <em><?= $commentaireSignale['auteur']; ?></em>
                                le <?= $commentaireSignale['date']; ?></p>

                            <form action="admin/validerCommentaire" method="post" style="display:inline;">
                                <button type="submit" class="btn btn-success btn-xs">OK</button>
                                <input type="hidden" name="id" value="<?= $commentaireSignale['id']; ?>">
                            </form>

                            <form action="admin/supprimerCommentaire" method="post" style="display:inline;">
                                <button type="submit" class="btn btn-warning btn-xs">Supprimer</button>
                                <input type="hidden" name="id" value="<?= $commentaireSignale['id']; ?>">
                            </form>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

        </div>

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="adminCommentaire">
                        Tous les Commentaires
                    </a>
                </h3>

            </div>
            <?php foreach ($commentaires as $commentaire) { ?>
                <div class="panel-body">
                    <ul class="list-group">
                        <li><h4 class="media-heading"
                                style="margin-top:10px; margin-left :10px;"><?= $commentaire['auteur'] ?></h4>
                        </li>
                        <li>
                            <p style="margin-top:10px; margin-left:10px; overflow-wrap: break-word"><?= $commentaire['contenu'] ?></p>
                        </li>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    </div>
    </div>
    <?php
} else {

    echo "Vous devez vous connecter";
}
?>


