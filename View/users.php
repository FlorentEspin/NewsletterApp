<?php
    include("../auth/session.php");
    session_start();
?>

<!-- HEADER, MENU --> <?php include_once("templates/header.php"); ?>

    <div class="container container-custom">

        <div class="starter-template">
            <h1>Users</h1>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><strong>User name</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach (User::getAllUser() as $item)
                {
                    echo  "<tr><td>". $item->getName() ."</td>";
                    echo  "<td>". $item->getAdress() ."</td>";


                    echo "<td><form action=\"../Controller/updateUser.php\" method=\"post\"id='form".$item->getIdUser().$item->getIdUser()."'>
                                <a href='userEditor.php?iduser=".$item->getIdUser()."' class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"/>
                                   </form></td>";

                    echo "<td><form action='../Controller/deleteUser.php' method=\"get\" id='form".$item->getIdUser()."'>
                                  <a href='../Controller/deleteUser.php?idUser=".$item->getIdUser()."' class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"/></form></td></tr>";
                }
                ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">add user</button>

            <!-- Modal -->
            <form action="../Controller/CreateUser.php" method="post" id="form">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">name</label>
                                <input type="text" class="form-control" id="recipient-name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">adressEmail</label>
                                <!-- <textarea class="form-control" id="message-text" name = "adressEmail"></textarea> -->
                                <input type="text" class="form-control" id="message-text" name="adressEmail">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button  onclick="submitform()" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>

    </div><!-- /.container -->

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="../web/bootstrap/js/bootstrap.min.js">
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
    <script src="../web/js/chosen.jquery.js" type="text/javascript"></script>
    <script src="../web/js/prism.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">

        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>


<!-- FOOTER --> <?php include_once("templates/footer.php") ?>