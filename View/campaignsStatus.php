<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>Campaigns</h1>

        <ul class="list-group">
            <?php
            $id = str_replace('\'', '', $_GET['idnewsletter']);
           foreach(group::getStatusGroupById( $id ) as $Status)
           {
                foreach ( $Status as $aStatus)
                {
                   echo $aStatus->getDesignation();
                }

           }

            ?>
        </ul>

    </div>

</div><!-- /.container -->

<!-- FOOTER --> <?php include_once("templates/footer.php") ?>
