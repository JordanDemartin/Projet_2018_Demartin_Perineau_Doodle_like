<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nom; ?></title>
    <?php  echo link_tag('asset/css/style.css'); ?>
</head>
<body>

    <div class="entete">
        <img src="<?=base_url();?>/asset/image/logo.png" alt="doodle">
    </div>

    <div class="page">
        <?php echo $page; ?>
    </div>


</body>
</html>
