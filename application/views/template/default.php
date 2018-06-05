<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre; ?></title>
    <?php  echo link_tag('assets/css/style.css'); ?>
</head>
<body>

    <div class="entete">
        <img src="<?=base_url();?>/assets/image/logo.png" alt="doodle">
        <div class="compte">
            <a href=<?php echo $compte['lien']; ?>><?php echo $compte['contenue']; ?></a>
        </div>
    </div>

    <div class="page">
        <?php echo $page; ?>
    </div>


</body>
</html>
