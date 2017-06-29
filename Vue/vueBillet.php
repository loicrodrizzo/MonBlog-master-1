<?php $this->titre = "Mon Blog - " . $billet['titre']; ?>

<!-- cette vu permet d'afficher le billet sélectionné ainsi que ses commentaires-->
<section class="section section-blog-fw">
<article>

    <header>

        <!--First row-->
        <div class="row">
            <div class="col-lg-12">
                <!--Featured image-->
                <div class="view overlay hm-white-slight">
                    <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(53).jpg">
                </div>
                <!--Post data-->
                <div class="jumbotron">
                    <h1><?= $billet['titre'] ?></h1>
                        <p><time><?= $billet['date'] ?><br/><br/></time></p>
                    <div class="excerpt">
                        <p><?= $billet['contenu'] ?></p><br/><br/>
                    </div>

                </div>
                <!--Excerpt-->

            </div>
        </div>
    </header>
</section>
    <?php if (isset($_SESSION['username'])) { ?>
    <div class="rows">
        <div class="col-sm-2">
            <form method="post" action="index.php?action=edition&id=<?= $billet['id'] ?>">
                <button type="submit" class="btn btn-primary btn-xs">Modifier</button>
            </form>
        </div>
        <div class="col-sm-4">
            <form method="post" action="index.php?action=deleteBillet&id=<?= $billet['id'] ?>">
                <button type="submit" class="btn btn-danger btn-xs">Supprimer</button>
                <br/><br/><br/><br/>
            </form>
        </div>
        <?php } ?>
    </div>
</article>

<div class="tab-pane" id="add-comment">

    <form action="index.php?action=commenter&id=<?= $billet['id'] ?>" method="post" class="form-horizontal"
          id="commentForm" role="form">
        <div class="form-group">

            <div class="col-sm-8">
                <label>Laisser un commentaire à <?= $billet['titre'] ?></label>
                <textarea class="form-control" name="addComment" id="addComment" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8">
                <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span
                        class="glyphicon glyphicon-send"></span> Envoyer
                </button>
            </div>
        </div>
    </form>
</div>
<hr/>
<article>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>

    <?php foreach ($commentaires as $commentaire): ?>
        <div class="thumbnail">
            <h4 class="media-heading" style="margin-top:10px; margin-left :10px;"><?= $commentaire['auteur'] ?></h4>
            <p style="margin-top:10px; margin-left:10px; overflow-wrap: break-word"><?= $commentaire['contenu'] ?></p>
        </div>

        <div>
            <form action="index.php?action=signaler" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $commentaire['id'] ?>">
                <button type="submit" class="btn btn-warning btn-xs">Signaler</button>
            </form>
        </div>
        <div class="modal fade" id="formulaire_<?= $commentaire['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">x</button>
                        <h4 class="modal-title">Votre réponse</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-reply" action="billet/repondre" method="post">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="auteur" id="auteur" required>
                            </div>
                            <div class="form-group">
                                <label for="commentaire">Message</label>
                                <textarea class="form-control" name="contenu" id="contenu" required></textarea>
                            </div>
                            <input type="hidden" name="id" value="<?= $commentaire['id'] ?>">
                            <button type="submit" class="btn btn-default">Envoyer</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-left :40px; margin-top :20px;">
        </div>
    <?php endforeach; ?>
</article>
