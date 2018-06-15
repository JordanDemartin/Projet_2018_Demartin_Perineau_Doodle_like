<div class="doudle_res">
    <p>Titre : <?php echo $titre ?></p>
    <p>Lieu : <?php echo $lieu ?></p>
    <p>Description : <?php echo $descriptif ?></p>
    <p>État : <?php echo $etat; ?></p>
    <?php if ($etat==="En cours"): ?>
        <p>Lien : <a href=<?php echo site_url("/doudle/participer/").$cle; ?>><?php echo "http://".$_SERVER['HTTP_HOST'].site_url("/doudle/participer/").$cle; ?></a></p>
    <?php endif; ?>

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
                    <th><?php echo $value['jour']."/".$value['mois']."/".$value['annee']." ".$value['heure'].":".$value['minu']; ?></th>
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
                    <th class=<?php echo $value; ?>>
                        <?php echo $value; ?>
                    </th>
                <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>


    </table>
    <?php if ($etat==="En cours"): ?>
        <a href=<?php echo site_url('/doudle/participer/').$cle; ?>>Participer</a>
    <?php endif; ?>

</div>
