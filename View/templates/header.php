<?php
	include("../auth/session.php");    //user authentification check
    
	//require_once Model foler
	require_once("../Model/user.class.php");
	require_once("../Model/ListGroup.php");
	require_once("../Model/group.class.php");
	require_once("../Model/newsletter.php");
	require_once("../Model/attachment.php");
    require_once("../Model/concat_usergroup.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">

        <link rel="stylesheet" href="../web/css/cstyle.css">
        <link rel="stylesheet" href="../web/css/cprism.css">
        <link rel="stylesheet" href="../web/css/chosen.css">

        <!-- Bootstrap core CSS -->
        <link href="../web/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../web/css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <title>Newsletter Web Application</title>
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                    	<li><a class="navbar-brand" href=".">Newsletter Web Manager</a></li>
                        <li><a href="users.php">Utilisateurs</a></li>
                        <li><a href="groups.php">Groupes de diffusion</a></li>
                        <li><a href="campaigns.php">Campagne de Newsletter</a></li>
                        <li><a href="csv.php">Importer un groupe format CSV</a></li>
                        <li><a href="../auth/logout.php">Déconnexion</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>