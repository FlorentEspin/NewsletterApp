<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");
require ("../Model/newsletter.php");
$idgroup = str_replace('"', "", $_POST["SelectGroup"]);

$newsletter = new Newsletter(0,$_POST["CampaignName"],$_POST["rte1"]);
$newsletter->createNewsletter($_POST["SelectGroup"]);
var_dump($newsletter);
echo $idgroup;

//header("location:../View/Campaigns.php");
var_dump($_POST)
?>