<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>Campaigns</h1>

        <ul class="list-group">
            <li class="list-group-item">campagne de mail n°1</li>
            <li class="list-group-item">campagne de mail n°12</li>
            <li class="list-group-item">campagne de mail n°27</li>
        </ul>

    </div>

</div><!-- /.container -->

<!-- FOOTER --> <?php include_once("templates/footer.php") ?>
