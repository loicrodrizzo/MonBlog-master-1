<?php
if (isset($_SESSION['username'])) {
    ?>

    <?php
    $this->titre = "Mon Blog - Administration" ?>

    <div class="col-sm-12 thumbnail" style="background-color: grey; padding: 15px; margin-bottom: 1px;">

        <h3><i class="fa fa-user" aria-hidden="true"></i>
            Bienvenue Admin!</h3>
    </div>

    <div class="col-sm-12">
        <div class="row">
            <div id="accordeon" class="panel-group col-sm-4 thumbnail"
                 style="background-color: grey;padding :10px;margin-bottom: 1px; ">
                <h4>Dashboard</h4>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a href="#item1" data-parent="#accordeon" data-toggle="collapse">
                                Billets

                            </a>
                        </h3>
                    </div>
                    <div id="item1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="list-group">
                                <!-- AJOUTER LA LISTE DES BILLETS -->
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a href="#item3" data-parent="#accordeon" data-toggle="collapse">
                                Commentaires signalés
                            </a>
                        </h3>
                    </div>
                    <?php if ($nbCommentairesSignales != 0) { ?>
                        <div id="item3" class="panel-collapse collapse">
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
                        </div><?php } ?>
                </div>

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a href="adminCommentaire">
                                Tous les Commentaires
                                <!-- Afficher les commentaires -->

                            </a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {

    echo "Vous devez vous connecter";
}
?>


