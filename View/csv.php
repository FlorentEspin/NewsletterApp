<?php
include("../auth/session.php");
session_start();
?>

<!-- HEADER, MENU --> <?php include_once("templates/header.php"); ?>

<div class="container container-custom">

	<div class="starter-template">
		<h1>CSV Import</h1>

		<form action="../Controller/uploadCsv.php" method="post" enctype="multipart/form-data">
			<input id="input-1" class="file" type="file" name="csv" value="" />
			<input type="submit" name="submit" value="Save" />
		</form>



		</div>

	</div><!-- /.container -->

	<!-- FOOTER --> <?php include_once("templates/footer.php") ?>