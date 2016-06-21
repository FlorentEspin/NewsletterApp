<?php
require_once ("../Model/status.php");
require_once ("../Model/concat_statususernewsletter.php");

require_once ("../Model/WebServicePATH.php");
$parts = parse_url($_SERVER['REQUEST_URI']);
parse_str($parts['query'], $query);

concat_statususernewsletter::unsubscribeUserByIdStatus($query['idStatus']);// getStatusById($query['idStatus']);
header("location:../View/campaignsViewer.php?idnewsletter=".$query['idneswletter']);
?>