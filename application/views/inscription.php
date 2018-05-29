<div class="connexion">
    <form action="#" method="post">

        <label for="prenom" class="prenom">Prénom
        <input type="text" name="prenom" id="prenom">
        </label>

        <label for="nom" class="nom">Nom
        <input type="text" name="nom" id="nom">
        </label>

        <label for="login">Nom d'utilisateur
        <input type="text" name="login" id="login">
        </label>

        <label for="email">E-mail
        <input type="email" name="email" id="email">
        </label>

        <label for="password">Mot de passe
        <input type="password" name="password" id="password">
        </label>

        <label for="password_c">Confirmer mot de passe
        <input type="password" name="password_c" id="password_c">
        </label>

        <input type="submit" value="Connexion">
    </form>
    <a href="<?= site_url('compte/motpasseoublier') ?>"><p>Mot de passe oublié</p></a>
    <a href="<?= site_url('compte/connexion') ?>"><p>Page de connexion</p></a>

</div>
