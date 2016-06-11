<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");

$group  = new group(0,$_POST['GroupName'],$_POST['adressEmail']);
$idGroupCreated  = $group->createGroup();
var_dump($idGroupCreated);
foreach (User::getAllUser() as $item)
{
    echo $item->getName() ."<br/>";

    foreach( $_POST["users"] as $value )
    {
        $valueToCompare = explode(";",$value );
        echo "splited : ". $valueToCompare[0] ."== ".$item->getIdUser()."<br/>";
        if($valueToCompare[0] == $item->getIdUser())
        {
            echo "idgroup : " .$idGroupCreated."  ".$item->getIdUser()."<br/>";
            group::addUserToGroup($idGroupCreated,$item->getIdUser());
        }
    }
}


header("location:../View/groups.php");
var_dump($_POST)
?>