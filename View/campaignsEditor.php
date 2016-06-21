<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">

        <h1>Campaign editor</h1>

        <form action="../Controller/updateCampaign.php" method="post">
         <?php
        echo $_GET['idcampaign'];
         $aNewsletter = newsletter::getNewsletterByID($_GET['idcampaign']);
         {
             echo "<input type='hidden' name='idcampaigns' value='". $aNewsletter->getIdnewsletter() . "'>";
             echo "<label>ID campaign : " . $aNewsletter->getIdnewsletter() . "</label><br/>";
             echo "Campaign Name: <input type=\"text\" name='Name' value='" . $aNewsletter->getCampagneName() . "'><br/>";
             echo "HTML Body: <input type=\"text\" name='HTML' value='" . $aNewsletter->getHtmlBody() . "'>";
             /*echo "HTML Body: <textarea name='HTML'>" . $aNewsletter->getHtmlBody() . "</textarea>";*/
             echo " <div>";
         }
            ?>
        <button  onclick="submitform()" class="btn btn-primary">Save changes</button>
            <script>
            function submitform()
            {
                document.forms["form"].submit();
            }
        </script>
        </form>

    </div>

</div><!-- /.container -->
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
