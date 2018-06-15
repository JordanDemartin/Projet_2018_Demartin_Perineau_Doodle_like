<div class="compte">
    <h1>Mes doudles</h1>
    <?php foreach ($doudle as $value): ?>
        <p> <a href=<?php echo site_url("/doudle/resultat/").$value["cle"]; ?>><?php echo $value["titre"]." : ".$value["lieu"] ?></a> <?php echo $value['etat']; ?> <?php if ($value['etat']=="En cours"): ?>
                <a href= <?php echo site_url("/doudle/modetat/").$value["cle"]."/Clos"; ?>>clore</a>
            <?php else: ?>
                <a href=<?php echo site_url("/doudle/modetat/").$value["cle"]."/En_cours"; ?>>relancer</a>
        <?php endif; ?>
        <a href=<?php echo site_url("/doudle/modetat/").$value["cle"]."/supprimer"; ?>>supprimer</a> </p>
    <?php endforeach; ?>

</div>
