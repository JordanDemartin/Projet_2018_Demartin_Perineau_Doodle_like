<div class="doudle">
    <p>lien : <a href=<?php echo current_url(); ?>><?php echo current_url(); ?></a></p>
    <form action=<?php echo current_url(); ?> method="post">
        <div class="div2elem">
            <label for="prenom" >Prénom</label>
            <input type="text" name="prenom" id="prenom" required value="<?php echo set_value('prenom');?>">
        </div>

        <div class="div2elem">
            <label for="nom" >Nom</label>
            <input type="text" name="nom" id="nom" required value="<?php echo set_value('nom');?>">
        </div>
        <table>
            <tr>
                <th>date</th>
                <th>heure</th>
                <th></th>
            </tr>
        </table>

    </form>

</div>