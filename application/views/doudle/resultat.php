<div class="doudle_res">
    <p>titre : <?php echo $titre ?></p>
    <p>lieu : <?php echo $lieu ?></p>
    <p>description : <?php echo $descriptif ?></p>
    <p>lien : <a href=<?php echo site_url("/doudle/participer/").$cle; ?>><?php echo "http://".$_SERVER['HTTP_HOST'].site_url("/doudle/participer/").$cle; ?></a></p>

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
                    <th>aucune</th>
                <?php endif; ?>

            <?php endforeach; ?>
        </tr>
        <tr>
            <th>total</th>
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

    <a href=<?php echo site_url('/doudle/participer/').$cle; ?>>participer</a>
</div>
