<?php
/**
 * Created by PhpStorm.
 * User: Nox
 * Date: 27/05/2016
 * Time: 14:58
 */?>


<form method="post" action="../Controller/UserConnector.php">

<legend>Connexion au Panel</legend>

<div class="form-group">
    <label class="col-lg-2 control-label">Login</label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="login" placeholder="Login">
    </div>
</div><br/><br/><br/>

<div class="form-group">
    <label class="col-lg-2 control-label">Mot de passe</label>
    <div class="col-lg-10">
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
    </div>
</div>

<br/><br/><center><button type="submit" name="submit" class="btn btn-primary">Connexion</button></center>
</form>
