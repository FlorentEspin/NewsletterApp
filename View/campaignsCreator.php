<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom" xmlns="http://www.w3.org/1999/html">

    <div class="starter-template">
        <form action="../Controller/createCampaign.php" method="post">
            <div>
                <input type="text" name ="CampaignName">
            </div>
            <div>
                <select name="SelectGroup">
                    <?php
                    foreach (group::getAllGroup() as $aGroup)
                    {
                        echo " <option value='".$aGroup->getId()."'>".$aGroup->getGroupName()."</option>";
                    }
                    ?>

                </select>
            </div>
            <div>
                <textarea rows="4" cols="50" name="HtmlBody">
                </textarea>
            </div>
            <input type="submit" value="create campaign">
        </form>
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
