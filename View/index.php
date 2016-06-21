<?php
include '../Controller/GenerateStatistique.php';
GenGraph();
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include_once("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>HOME PAGE</h1>
        <img src="../web/images/files.jpg" />

    </div>

</div><!-- /.container -->

<!-- FOOTER --> <?php include_once("templates/footer.php") ?>