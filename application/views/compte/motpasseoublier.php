<div class="connexion">
    <form action=<?php echo current_url(); ?> method="post">

        <label for="email">E-mail
        <input type="email" name="email" id="email" required>
        </label>


        <input type="submit" value="envoyer">
    </form>
    <p><a href="<?= site_url('compte/inscription') ?>">Créer un compte</a></p>
    <p><a href="<?= site_url('compte/connexion') ?>">Se connecter</a></p>

</div>
