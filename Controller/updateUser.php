<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");
require ("../Model/concat_usergroup.php");

$user = new User($_POST["idusers"],$_POST["Name"],$_POST["Adresse"]);
$user->updateUser();
header("location:../View/users.php");
var_dump($_POST)
?>