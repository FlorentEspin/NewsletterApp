<?php
<<<<<<< HEAD
require("../Model/user.class.php");
require("../Model/ListGroup.php");
require("../Model/group.class.php");
require("../Model/newsletter.php");
require("../Model/attachment.php");

=======
    include("../auth/session.php");
    session_start();
>>>>>>> 09c45321a36dbf77f2bc9bf4900cec327f088675
?>

<<<<<<< HEAD
        <link rel="stylesheet" href="../web/css/cstyle.css">
        <link rel="stylesheet" href="../web/css/cprism.css">
        <link rel="stylesheet" href="../web/css/chosen.css">

        <title>Starter Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link href="../web/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../web/css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

    <br/><br/><br/><br/>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Newsletter web manager</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="users.php">Users</a></li>
                        <li class="active"><a href="groups.php">Groups</a></li>
                        <li><a href="campaigns.php">Campaign</a></li>
                        <li><a href="csv.php">Import CSV</a></li>
                        <li><a href="#">lOG IN / LOG OUT</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

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

        </select>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
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
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    </body>
</html>
=======
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
>>>>>>> 09c45321a36dbf77f2bc9bf4900cec327f088675
