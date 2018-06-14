<div class="connexion">
    <form action=<?php echo current_url(); ?> method="post">

        <div class="div2elem">
            <label for="prenom" >Prénom</label>
            <input type="text" name="prenom" id="prenom" pattern="[a-zA-Z]+" required value="<?php echo set_value('prenom');?>">
        </div>

        <div class="div2elem">
            <label for="nom" >Nom</label>
            <input type="text" name="nom" id="nom" pattern="[a-zA-Z]+" required value="<?php echo set_value('nom');?>">
        </div>



        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login" id="login" required value="<?php echo set_value('login');?>">
        <p><?php echo $compte; ?></p>


        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" required value="<?php echo set_value('email');?>">


        <label for="password">Mot de passe</label>
        <input type="password" name="passw" required id="password">


        <label for="password_c">Confirmer mot de passe</label>
        <input type="password" name="password_c" required id="password_c">


        <input type="submit" value="Inscription">
    </form>
    <p><a href="<?= site_url('compte/motpasseoublier') ?>">Mot de passe oublié</a></p>
    <p><a href="<?= site_url('compte/connexion') ?>">Se connecter</a></p>

</div>
