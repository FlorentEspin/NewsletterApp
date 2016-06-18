<?php
   	include("../auth/session.php");
	session_start();
 include("templates/header.php");
?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>User editor</h1>
        <form action="../Controller/updateUser.php" method="post">
         <?php
    echo $_GET['iduser'];
         $aUser = User::getUserById($_GET['iduser']);
         {
             echo "<input type='hidden' name='idusers' value='". $aUser->getIdUser() . "'>";
             echo "<label>ID Group : " . $aUser->getIdUser() . "</label><br/>";
             echo "User Name: <input type=\"text\" name='Name' value='" . $aUser->getName() . "'><br/>";
             echo "User Adress: <input type=\"text\" name='Adresse' value='" . $aUser->getAdress() . "'>";
             echo " <div>";
         }
            ?>
        <button  onclick="submitform()" class="btn btn-primary">Save changes</button>
            <script>
            function submitform()
            {
                document.forms["form"].submit();
            }
        </script>
        </form>

    </div>




</div><!-- /.container -->
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
