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

                        <?php
                        foreach (group::getAllGroup() as $item)
                        {
                            echo  "<tr><td>". $item->getGroupName() ."</td>";
                            echo  "<td>". $item->getAdress() ."</td>  </tr>";
                        }
                        ?>

                       <!--
                            <td>group a</td>
                            <td>azerty@example.com</td>
                        <tr>
                            <td>group 52</td>
                            <td>666@example.com</td>
                        </tr>
                        <tr>
                            <td>group ggg</td>
                            <td>aaa@example.com</td>
                        </tr> -->
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <form action="../Controller/createGroup.php" method="post" id="form">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">GroupName</label>
                                    <input type="text" class="form-control" id="recipient-name" name="GroupName">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">adressEmail</label>
                                    <textarea class="form-control" id="message-text" name = "adressEmail"></textarea>
                                </div>
                            <div class="side-by-side clearfix">
                                <div>
                                    <em>Multiple Select</em>
                                    <select data-placeholder="Users" multiple class="chosen-select-width" tabindex="16">
                                        <option value=""></option>
                                        <option>American Black Bear</option>
                                        <?php
                                        foreach (User::getAllUser() as $item)
                                        {
                                            echo "<option>".$item->getIdUser().";".$item->getName()."</option><br/>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button  onclick="submitform()" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <select id="elements" name="users[]" multiple size="5"></select>
                            <script>
                            function submitform()
                                {
                                var selectUser = document.getElementsByName("user");
                                for(var i = 0 ; selectUser.length; i++)
                                {
                                var x = document.getElementById("elements");
                                var option = document.createElement("option");
                                option.text = selectUser[i].innerHTML;
                                option.selected=true;
                                x.add(option);
                                }
                                document.forms["form"].submit();
                                }
                            </script>
                </form>

                    </div>
                </div>
            </div>

        </div><!-- /.container -->

<!-- FOOTER --> <?php include_once("templates/footer.php") ?>