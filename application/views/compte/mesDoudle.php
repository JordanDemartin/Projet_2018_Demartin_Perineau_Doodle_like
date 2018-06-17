<div class="doudle_doudle">
    <h1>Mes doudles</h1>
    <?php foreach ($doudle as $value): ?>
        <p> <a href=<?php echo site_url("/doudle/resultat/").$value["cle"]; ?>><?php echo $value["titre"]." : ".$value["lieu"] ?></a>
        <?php if ($value['etat']=="En cours"): ?>
            <a class="case_arrondi vert" href= <?php echo site_url("/doudle/modetat/").$value["cle"]."/Clos"; ?>><?php echo $value['etat']; ?></a>
        <?php else: ?>
            <a class="case_arrondi rouge" href=<?php echo site_url("/doudle/modetat/").$value["cle"]."/En_cours"; ?>><?php echo $value['etat']; ?></a>
        <?php endif; ?>
        <a class="case_arrondi rouge" href=<?php echo site_url("/doudle/modetat/").$value["cle"]."/supprimer"; ?>>supprimer</a></p>
    <?php endforeach; ?>

</div>
