<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include_once("templates/header.php"); ?>
    
<div class="container container-custom">

    <div class="starter-template">
        <h1>CSV Import</h1>

        <label class="control-label">Select File</label>
        <input id="input-1" type="file" class="file">

    </div>

</div><!-- /.container -->

<!-- FOOTER --> <?php include_once("templates/footer.php") ?>