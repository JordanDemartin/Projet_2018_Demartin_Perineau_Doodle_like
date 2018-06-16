<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre; ?></title>
    <?php  echo link_tag('assets/css/style.css'); ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>

    <header>
        <a href=<?php echo site_url('/'); ?>><img src="<?=base_url();?>/assets/image/logo.png" alt="doodle"></a>

        <div class="bare">
            <?php if ($compte['connecter']): ?>
                <a class="bouton" href=<?php echo site_url('/doudle/creation'); ?>>Créer un Doudle</a>
                <a class="bouton" href=<?php echo site_url('/compte/mesDoudle'); ?>>Mes doudles</a>
            <?php endif; ?>
        </div>

        <div class="compte">
            <?php if ($compte['connecter']): ?>
                <?php echo $compte['contenue']; ?>
            <?php endif; ?>

            <?php if ($compte['connecter']): ?>
                <a class="bouton" href=<?php echo site_url('/compte/deconnexion'); ?>>Déconnexion</a>
            <?php else: ?>
                <a class="bouton" href=<?php echo site_url('/compte/connexion'); ?>>Connexion</a>
            <?php endif; ?>
        </div>
    </header>

    <div class="page">
        <?php echo $page; ?>
    </div>


</body>
</html>
