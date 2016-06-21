<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>Campaigns Status</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID Status</th>
                <th>Status</th>
                <th>User</th>


            </tr>
            </thead>
            <tbody>

            <?php
            $id = str_replace('\'', '', $_GET['idnewsletter']);
           foreach(group::getStatusGroupById( $id ) as $Status)
           {
                foreach ( $Status as $aStatus)
                {

                   echo "<tr><td>".$aStatus->getId()."</td>";
                   echo "<td>".$aStatus->getDesignation()."</td>";
                    foreach (user::getUserByStatusId($aStatus->getId()) as $user) {
                        echo "<td>" . $user->getName(). "</td></tr>";
                    }

                }

           }

            ?>
            </tbody>
        </table>


    </div>

</div><!-- /.container -->

<!-- FOOTER --> <?php include_once("templates/footer.php") ?>
