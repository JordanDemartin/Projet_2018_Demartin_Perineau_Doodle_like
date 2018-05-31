
<div class="connexion">
    <form action="#" method="post">
        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login" id="login">

        <label for="password">Mot de passe</label>
        <input type="password" name="passw" id="password">
        
        <input type="submit" value="Inscription">
    </form>
    <a href="<?= site_url('compte/motpasseoublier') ?>"><p>Mot de passe oublié</p></a>
    <a href="<?= site_url('compte/inscription') ?>"><p>créer un compte</p></a>

</div>
