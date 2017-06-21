<?php $this->titre = "Mon Blog - Page de connexion " ;


if(empty($_SESSION['username'])){?>
    <h1>Connexion</h1>

    <form method="POST" action="index.php?action=login_user">
        <div id="centrer_div">
            <label for="identifiant"> Pseudo / Mail :</label>
            <input type="text" name="username" /><br/><br/>

            <label for="mdp"> Mot de passe :</label>
            <input type="password" name="password" /><br/><br/>
        </div>

        <input type="submit" value="Valider" name="submit"/><br/><br/><br/>

    </form>
<?php }
else{
    header("Location:index.php?action=admin");
}?>
