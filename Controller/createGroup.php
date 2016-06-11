<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");

$group  = new group(0,$_POST['GroupName'],$_POST['adressEmail']);
$idGroupCreated  = $group->createGroup();

foreach (User::getAllUser() as $item)
{
    echo $item->getName();

    foreach( $_POST["users"] as $value )
    {
        $valueToCompare = explode(";",$value );
        echo $valueToCompare[0];
        if($valueToCompare[0] == $item->getIdUser())
        {
            echo $idGroupCreated."  ".$item->idUser;
            group::addUserToGroup($idGroupCreated,$item->idUser);
        }
    }
}


//header("location:../View/groups.php");
var_dump($_POST)
?>