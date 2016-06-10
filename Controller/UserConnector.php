<?php
require_once("../Model/user.class.php");

$log = $_POST["login"];
$password = $_POST["password"];

user::getAllUser();
?>