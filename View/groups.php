<?php
    include("../auth/session.php");
    session_start();
?>

<!-- HEADER, MENU --> <?php include_once("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>Groups</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Group name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>group a</td>
                    <td>azerty@example.com</td>
                </tr>
                <tr>
                    <td>group 52</td>
                    <td>666@example.com</td>
                </tr>
                <tr>
                    <td>group ggg</td>
                    <td>aaa@example.com</td>
                </tr>
            </tbody>
        </table>

    </div>

</div><!-- /.container -->

<!-- FOOTER --> <?php include_once("templates/footer.php") ?>