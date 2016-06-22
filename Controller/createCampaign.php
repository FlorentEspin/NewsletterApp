<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");
require ("../Model/newsletter.php");
$idgroup = str_replace('"', "", $_POST["SelectGroup"]);


$formatedHTMLBODY = preg_replace( "/\r|\n/", "", $_POST["rte1"] );
var_dump($formatedHTMLBODY );

$newsletter = new Newsletter(0,$_POST["CampaignName"],$formatedHTMLBODY );
$newsletter->createNewsletter($_POST["SelectGroup"]);
echo $idgroup;

header("location:../View/Campaigns.php");
?>