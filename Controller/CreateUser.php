<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");

$user  = new user(0,$_POST['name'],$_POST['adressEmail']);
$idGroupCreated  = $user->createUser();


header("location:../View/users.php");
var_dump($_POST)
?>