
<div class="doudle">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#date" ).datepicker();
    } );
    </script>


    <form action="" method="post">

        <label for="date">Date: </label>
        <input type="text" name="date" id="date">


        <a href="<?= site_url('doudle/creation_1') ?>"><button type="button">retour</button></a>



    </form>



</div>
