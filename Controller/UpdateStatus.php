<?php
require_once ("../Model/status.php");
require_once ("../Model/WebServicePATH.php");
$parts = parse_url($_SERVER['REQUEST_URI']);
parse_str($parts['query'], $query);

$status = status::getStatusById($query['idStatus']);

if($status[0]->getDesignation() == 'TBD')
{
    $status[0]->setDesignation(1);
}
else
{
    $status[0]->setDesignation($status[0]->getDesignation()+1);
}

$status[0]->updateStatus();
header("location:../View/campaignsViewer.php?idnewsletter=".$query['idneswletter']);
?>