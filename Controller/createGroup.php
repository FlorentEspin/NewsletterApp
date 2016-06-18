<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");

$group  = new group(0,$_POST['GroupName'],$_POST['adressEmail']);
$idGroupCreated  = $group->createGroup();
foreach (User::getAllUser() as $item)
{
    foreach( $_POST["users"] as $value )
    {
        $valueToCompare = explode(";",$value );
        if($valueToCompare[0] == $item->getIdUser())
        {
            group::addUserToGroup($idGroupCreated,$item->getIdUser());
        }
    }
}


header("location:../View/groups.php");
?>