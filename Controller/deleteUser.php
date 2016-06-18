<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");

User::deleteUserById($_GET["idUser"]);


header("location:../View/users.php");
var_dump($_GET);

?>