<div class="doudle">

    <form action="" method="post">
        <label for="titre">titre</label>
        <input type="text" name="titre" id="titre" value="<?php echo set_value('titre');?>">

        <label for="lieu">lieu</label>
        <input type="text" name="lieu" id="lieu" value="<?php echo set_value('lieu');?>">

        <label for="description">description</label>
        <textarea name="description" id="description" rows="9" cols="80"><?php echo set_value('description');?></textarea>

        <input type="submit" value="continuer">
    </form>

</div>
