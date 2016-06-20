<?php
include("../auth/session.php");

session_start();
?>

<!-- HEADER, MENU --> <?php include_once("templates/header.php"); ?>

<div class="container container-custom">

	<div class="starter-template">

		<!-- START Demo Code -->
		<form name="RTEDemo" action="demo.php" method="post" onsubmit="return submitForm();">
			<script language="JavaScript" type="text/javascript">
				<!--
				function submitForm() {
					//make sure hidden and iframe values are in sync for all rtes before submitting form
					updateRTEs();
					document.forms["form"].submit();
				}

				//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML, encHTML)
				initRTE("../web/AreaEditor/images/", "../web/AreaEditor/", "", true);
				//-->
			</script>
			<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

			<script language="JavaScript" type="text/javascript">
				<!--
				//build new richTextEditor
				var rte1 = new richTextEditor('rte1');
				<?php
				//format content for preloading
				if (!(isset($_POST["rte1"]))) {
					$content = "here's the " . chr(13) . "\"preloaded <b>content</b>\"";
					$content = rteSafe($content);
				} else {
					//retrieve posted value
					$content = rteSafe($_POST["rte1"]);
				}
				?>
				rte1.html = '<?=$content;?>';
				//rte1.toggleSrc = false;
				rte1.build();
				//-->
			</script>
			<p><input type="submit" name="submit" value="Submit" /></p>
		</form>
		<?php
		function rteSafe($strText) {
			//returns safe code for preloading in the RTE
			$tmpString = $strText;

			//convert all types of single quotes
			$tmpString = str_replace(chr(145), chr(39), $tmpString);
			$tmpString = str_replace(chr(146), chr(39), $tmpString);
			$tmpString = str_replace("'", "&#39;", $tmpString);

			//convert all types of double quotes
			$tmpString = str_replace(chr(147), chr(34), $tmpString);
			$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);

			//replace carriage returns & line feeds
			$tmpString = str_replace(chr(10), " ", $tmpString);
			$tmpString = str_replace(chr(13), " ", $tmpString);

			return $tmpString;
		}
		?>
	</div>

</div><!-- /.container -->



	<!-- FOOTER --> <?php include_once("templates/footer.php") ?>