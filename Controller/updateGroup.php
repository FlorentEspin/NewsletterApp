<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");
require ("../Model/concat_usergroup.php");

concat_usergroup::deleteConcatGroupByIdGroup($_POST["idgroups"]);
foreach( $_POST["users"] as $value )
{
    $valueToCompare = explode(";",$value );
    group::addUserToGroup($_POST["idgroups"],$valueToCompare[0]);
}


header("location:../View/groups.php");
var_dump($_POST)
?>