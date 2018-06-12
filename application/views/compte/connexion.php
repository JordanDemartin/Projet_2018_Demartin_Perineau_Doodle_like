
<div class="connexion">
    <form action=<?php echo current_url(); ?> method="post">
        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login" id="login" required value="<?php echo set_value('login');?>">

        <label for="password">Mot de passe</label>
        <input type="password" name="passw" id="password" required>
        <p><?php echo $valide; ?></p>

        <input type="submit" value="Connexion">
    </form>
    <p><a href="<?= site_url('compte/motpasseoublier') ?>">Mot de passe oublié</a></p>
    <p><a href="<?= site_url('compte/inscription') ?>">créer un compte</a></p>

</div>
