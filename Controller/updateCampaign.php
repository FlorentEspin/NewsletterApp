<?php
require("../Model/newsletter.php");
$formatedHTMLBODY = preg_replace( "/\r|\n/", "", $_POST["rte1"] );
$campaign = new newsletter($_POST["idcampaigns"],$_POST["Name"],$formatedHTMLBODY);
$campaign->updateNewsletter();
header("location:../View/campaigns.php");
?>