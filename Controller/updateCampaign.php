<?php
require("../Model/newsletter.php");

$campaign = new newsletter($_POST["idcampaigns"],$_POST["Name"],$_POST["HTML"]);
$campaign->updateNewsletter();
header("location:../View/campaigns.php");
var_dump($_POST)
?>