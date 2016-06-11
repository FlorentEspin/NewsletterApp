<?php
   	include("../auth/session.php");
	session_start();
?>

<!-- HEADER, MENU --> <?php include("templates/header.php"); ?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>Groups</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Group name</th>
                <th>Email</th>
                <th>Users</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach (newsletter::getAllnewsletter() as $aNewsletter)
            {
                echo "<li class='list-group-item'><a href =campaignsEditor.php?idnewsletter='".$aNewsletter->getIdnewsletter()."'>".$aNewsletter->getCampagneName()."</li>";
            }
            ?>

            </tbody>
        </table>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
           add newsletter
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
