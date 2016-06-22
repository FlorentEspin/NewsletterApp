<?php
include("../auth/session.php");
session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>Campaigns </h1>

        <ul class="list-group">
            <?php

            foreach(newsletter::getNewslettersByID($_GET['idnewsletter']) as $aNewsletterItem)
            {
                 Echo "Campagne Name : ".$aNewsletterItem->getCampagneName();

                Echo "<br/> CampagneBody : ".$aNewsletterItem->getHtmlBody();

            }

            ?>
        </ul>

    </div>

</div><!-- /.container -->

<!-- FOOTER --> <?php include_once("templates/footer.php") ?>
