<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>Campaigns</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th><strong>Group name</strong></th>
                <th><strong>Status</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach (newsletter::getAllnewsletter() as $aNewsletter)
            {
                echo "<tr><td>".$aNewsletter->getCampagneName()." </td>";

                echo "<td><a href =campaignsStatus.php?idnewsletter='".$aNewsletter->getIdnewsletter()."' />Click to see status </td>";

                echo "<td><form action=\"../Controller/updateCampaign.php\" method=\"post\"id='form".$aNewsletter->getIdnewsletter().$aNewsletter->getIdnewsletter()."'>
                            <a href='campaignsEditor.php?idcampaign=".$aNewsletter->getIdnewsletter()."' class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"/></td> </form>";

                echo "<td><form action='../Controller/deleteCampaign.php' method=\"get\" id='form".$aNewsletter->getIdnewsletter()."'>
                                  <a href='../Controller/deleteCampaign.php?idcampaign=".$aNewsletter->getIdnewsletter()."' class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"/>
                                  </form></tr></td>";


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
