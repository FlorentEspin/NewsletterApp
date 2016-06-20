<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom" xmlns="http://www.w3.org/1999/html">

    <div class="starter-template">
        <form name="formCreate" action="../Controller/createCampaign.php" method="post">
            <div>
                Campagne Name :
                <input type="text" name ="CampaignName">
            </div>
            <div>
                select a group :
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
                <div class="starter-template">

                    Campagne text :
                    <name="RTEDemo" action="../Controller/createCampaign.php" method="post" onsubmit="return submitForm();">
                        <script language="JavaScript" type="text/javascript">
                            <!--
                            function submitForm() {
                                //make sure hidden and iframe values are in sync for all rtes before submitting form

                               updateRTEs();
                                document.forms["form"].submit();
                                return true;
                            }

                            //Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML, encHTML)
                            initRTE("../web/AreaEditor/images/", "../web/AreaEditor/", "", true);
                            //-->
                        </script>
                        <noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

                        <script language="JavaScript" type="text/javascript">
                            <!--
                            //build new richTextEditor
                            var rte1 = new richTextEditor('rte1');
                            <?php
                            //format content for preloading
                            if (!(isset($_POST["rte1"]))) {
                                $content = "";
                                $content = rteSafe($content);
                            } else {
                                //retrieve posted value
                                $content = rteSafe($_POST["rte1"]);
                            }
                            ?>
                            rte1.html = '<?=$content;?>';
                            //rte1.toggleSrc = false;
                            rte1.build();
                            //-->
                        </script>
                    <?php
                    function rteSafe($strText) {
                        //returns safe code for preloading in the RTE
                        $tmpString = $strText;

                        //convert all types of single quotes
                        $tmpString = str_replace(chr(145), chr(39), $tmpString);
                        $tmpString = str_replace(chr(146), chr(39), $tmpString);
                        $tmpString = str_replace("'", "&#39;", $tmpString);

                        //convert all types of double quotes
                        $tmpString = str_replace(chr(147), chr(34), $tmpString);
                        $tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);

                        //replace carriage returns & line feeds
                        $tmpString = str_replace(chr(10), " ", $tmpString);
                        $tmpString = str_replace(chr(13), " ", $tmpString);

                        return $tmpString;
                    }
                    ?>
                </div>
            </div>
            <button  onclick="submitForm()" class="btn btn-primary">Save changes</button>
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
