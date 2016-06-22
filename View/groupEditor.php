<?php
   	include("../auth/session.php");
	session_start();
 include("templates/header.php");
?>

<div class="container container-custom">

    <div class="starter-template">
        <h1>Groups editor</h1>
        <form action="../Controller/updateGroup.php" method="post">
         <?php

         foreach(group::getGroupById($_GET['idgroup']) as $aGroup) {
             echo "<input type='hidden' name='idgroups' value='". $aGroup->getId() . "'></br>";
             echo "<label>ID Group : " . $aGroup->getId() . "</label><br/></br>";
             echo "Group Name: <input type=\"text\" name='GroupName' value='" . $aGroup->getGroupName() . "'><br/></br>";
             echo "Group Adress: <input type=\"text\" name='GroupAdress' value='" . $aGroup->getAdress() . "'></br>";

             echo " <div></br>
        <select data-placeholder=\"Users\" multiple class=\"chosen-select-width\" tabindex=\"16\">
            <option value=\"\"></option>";

             foreach (User::getAllUser() as $item)
             {
                 $tempUser = null;
                 foreach ($aGroup->getAllUserFromGroup() as $aGroupItem)
                 {
                     $user = User::getUserById($aGroupItem->getIdUser());
                     if($user->getIdUser() == $item->getIdUser())
                       {
                           $tempUser = $user;
                           var_dump($tempUser);
                       }
                 }
                 if($tempUser != null) {
                     if ($tempUser->getIdUser() == $item->getIdUser())
                         echo "<option selected>" . $tempUser->getIdUser() . ";" . $tempUser->getName() . "</option><br/>";
                 }
                 else
                     echo "<option>" . $item->getIdUser() . ";" . $item->getName() . "</option><br/>";

             }
             echo "</select></div>";

         }
            ?>

        </br>

        <button  onclick="submitform()" class="btn btn-primary">Save changes</button>

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
