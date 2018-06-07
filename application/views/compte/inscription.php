<div class="connexion">
    <form action="" method="post">

        <label for="prenom" class="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="<?php echo set_value('prenom');?>">


        <label for="nom" class="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?php echo set_value('nom');?>">


        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login" id="login" value="<?php echo set_value('login');?>">
        <p><?php echo $compte; ?></p>


        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="<?php echo set_value('email');?>">


        <label for="password">Mot de passe</label>
        <input type="password" name="passw" id="password">


        <label for="password_c">Confirmer mot de passe</label>
        <input type="password" name="password_c" id="password_c">


        <input type="submit" value="Inscription">
    </form>
    <a href="<?= site_url('compte/motpasseoublier') ?>"><p>Mot de passe oublié</p></a>
    <a href="<?= site_url('compte/connexion') ?>"><p>Se connecter</p></a>

</div>
