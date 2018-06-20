<div class="doudle_res">
    <div class="description">
        <h1><?php echo $titre ?></h1>
        <p>Lieu : <?php echo $lieu ?></p>
        <p>Description : <?php echo $descriptif ?></p>
        <p>État :<?php if ($etat=="En cours"): ?>
            <a class="case_arrondi vert" href= <?php echo site_url("/doudle/modetat/").$cle."/Clos"; ?>><?php echo $etat; ?></a>
        <?php else: ?>
            <a class="case_arrondi rouge" href=<?php echo site_url("/doudle/modetat/").$cle."/En_cours"; ?>><?php echo $etat; ?></a>
        <?php endif; ?><a class="case_arrondi rouge" href=<?php echo site_url("/doudle/modetat/").$cle."/supprimer"; ?>>supprimer</a></p>
        <?php if ($etat==="En cours"): ?>
            <p>Lien pour participer : <a href=<?php echo site_url("/doudle/participer/").$cle; ?>><?php echo "http://".$_SERVER['HTTP_HOST'].site_url("/doudle/participer/").$cle; ?></a></p>
        <?php endif; ?>


    </div>
    <table>
        <tr>
            <th></th>
            <?php foreach ($dates as $value): ?>
                <?php foreach ($value as $key => $valu) {
                    if (strlen($valu)==1) {
                        $value[$key]="0".$valu;
                    }
                } ?>
                <?php if ($value['jour'] !==null): ?>
                    <th><?php echo $value['jour']."/".$value['mois']."/".$value['annee'];?><br><?php echo $value['heure'].":".$value['minu']; ?></th>
                <?php else: ?>
                    <th>Aucune des dates</th>
                <?php endif; ?>

            <?php endforeach; ?>
        </tr>
        <tr>
            <th>Total</th>
            <?php foreach ($total as $value): ?>
                <th><?php echo $value; ?></th>
            <?php endforeach; ?>
        </tr>
        <?php if ($personnes!=null): ?>
            <?php foreach ($personnes as $pers): ?>
                <tr>
                <th><?php echo $pers["prenom"]." ".$pers['nom']; ?></th>

                <?php foreach ($pers['dates'] as $value): ?>
                    <th>
                        <div class=<?php echo $value; ?>>

                        </div>
                    </th>
                <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>

</div>
