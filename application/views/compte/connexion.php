
<div class="connexion">
    <form action=<?php echo current_url(); ?> method="post">
        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login" id="login" required value="<?php echo set_value('login');?>">

        <label for="password">Mot de passe</label>
        <input type="password" name="passw" id="password" required>
        <?php if ($valide!=''): ?>
            <p class="error"><?php echo $valide; ?></p>
        <?php endif; ?>


        <input type="submit" value="Connexion">
    </form>
    <p><a class="bouton" href="<?= site_url('compte/inscription') ?>">Créer un compte</a></p>

</div>
