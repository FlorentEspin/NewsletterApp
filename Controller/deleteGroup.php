<?php
require("../Model/group.class.php");
require ("../Model/user.class.php");

group::deleteGroupById($_GET["idgroup"]);


//header("location:../View/groups.php");
var_dump($_GET);

?>