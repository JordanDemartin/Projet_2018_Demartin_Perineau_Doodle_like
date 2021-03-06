<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $( ".calendrier" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
} );
</script>

<div class="doudle">

    <form action=<?php echo current_url(); ?> method="post">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" maxlength="50" required value="<?php echo set_value('titre');?>">

        <label for="lieu">Lieu</label>
        <input type="text" name="lieu" id="lieu" maxlength="50" required value="<?php echo set_value('lieu');?>">

        <label for="description">Description</label>
        <textarea name="description" id="description" maxlength="200"><?php echo set_value('description');?></textarea>

        <br><br>


        <?php for ($i=0; $i<$nombre_date ;$i++): ?>
            <div class="date">
                <label for="date_<?php echo $i ?>">Date :</label>
                <input type="text" name="date_<?php echo $i ?>" pattern="(0[1-9]|[1-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/\d\d\d\d" required id="date_<?php echo $i ?>" class="calendrier" value=<?php echo set_value('date_'.$i);?>>
                <label for="heure_<?php echo $i ?>">Heure :</label>
                <input type="text" name="heure_<?php echo $i ?>" id="heure_<?php echo $i ?>" pattern="([0-1][0-9])|2[0-3]|([0-9])" required value=<?php echo set_value('heure_'.$i);?>> : <input type="text" name="minute_<?php echo $i ?>" pattern="([0-5][0-9])|([0-9])" required value=<?php echo set_value('minute_'.$i);?>>
            </div>
        <?php endfor; ?>

        <button type="submit" class="div2" formaction=<?php echo site_url('/doudle/creation/').($nombre_date) ?>>Valider</button>
        <button type="submit" class="div4" formnovalidate formaction=<?php echo site_url('/doudle/creation/').($nombre_date+1) ?>>Ajouter date</button>
        <button type="submit" class="div4fin" formnovalidate formaction=<?php echo site_url('/doudle/creation/').($nombre_date-1)."/true" ?>>Enlever date</button>

    </form>

</div>
