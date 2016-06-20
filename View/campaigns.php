<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>Groups</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Group name</th>
                <th>Email</th>
                <th>Users</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach (newsletter::getAllnewsletter() as $aNewsletter)
            {
                echo "<tr><td><a href =campaignsEditor.php?idnewsletter='".$aNewsletter->getIdnewsletter()."' />".$aNewsletter->getCampagneName()." </td>";
                echo "<td><a href =campaignsStatus.php?idnewsletter='".$aNewsletter->getIdnewsletter()."' />Click to see status </td></tr>";
            }
            ?>

            </tbody>
        </table>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" >
          <a href="campaignsCreator.php"> add newsletter </a>
        </button>


    </div>
</div>
</div>

</div><!-- /.container -->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="../web/bootstrap/js/bootstrap.min.js">
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="../web/js/chosen.jquery.js" type="text/javascript"></script>
<script src="../web/js/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">

    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
</script>


<!-- FOOTER --> <?php include_once("templates/footer.php") ?>
