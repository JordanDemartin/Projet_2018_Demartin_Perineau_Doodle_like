<div class="doudle">
    <form action=<?php echo current_url(); ?> method="post">
        <div class="div2">
            <label for="prenom" >Prénom</label>
            <input type="text" name="prenom" pattern="[a-zA-Z]+" id="prenom" required value="<?php echo set_value('prenom');?>">
        </div>

        <div class="div2fin">
            <label for="nom" >Nom</label>
            <input type="text" name="nom" pattern="[a-zA-Z]+" id="nom" required value="<?php echo set_value('nom');?>">
        </div>
        <table>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th></th>
            </tr>
            <?php foreach ($dates as $value): ?>
                <?php foreach ($value as $key => $valu) {
                    if (strlen($valu)==1) {
                        $value[$key]="0".$valu;
                    }
                } ?>
                <?php if ($value['jour'] !==null): ?>
                    <tr>
                        <th><?php echo $value['jour']."/".$value['mois']."/".$value['annee']; ?></th>
                        <th><?php echo $value['heure'].":".$value['minu']; ?></th>
                        <th><input type="checkbox" name="valider[]" value=<?php echo $value['cleDate'] ?>></th>
                    </tr>
                <?php endif; ?>

            <?php endforeach; ?>
        </table>

        <input type="submit" value="valider">

    </form>

</div>
