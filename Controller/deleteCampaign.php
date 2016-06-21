<?php
require("../Model/group.class.php");
require ("../Model/newsletter.php");

newsletter::deleteNewsletterById($_GET["idcampaign"]);

header("location:../View/campaigns.php");
var_dump($_GET);

?>