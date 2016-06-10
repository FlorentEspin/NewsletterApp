<?php
	function verify_pw($plain_pw, $hashed_pw)
	{
	    // (optional) change logic here for different hash algorithm
	    //return password_verify($plain_pw, $hashed_pw);
	    //return (md5($plain_pw)==$hashed_pw);
	    return ($plain_pw == $hashed_pw);
	}
	
	session_start();
	
	//DB configuration Variables
	$dbhost="mysql.montpellier.epsi.fr";
	$port=5206;
	$dbuser="tuan.nguyenngoc";
	$dbpass="epsi768CHX";
	$dbname="MessagerieNews";

	//PDO Database Connection
	try {
		$db = new PDO("mysql:host=".$dbhost.";port=".$port.";dbname=".$dbname, $dbuser, $dbpass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
	if(isset($_POST['submit'])){
		$errMsg = '';
		//username and password sent from Form
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username == '')
			$errMsg .= 'Veuillez rentrer le nom d\'utilisateur<br>';
		
		if($password == '')
			$errMsg .= 'Veuillez rentrer le mot de passe<br>';
		
		if($errMsg == ''){
			$records = $db->prepare('SELECT appUserId,appUserName,appUserPassword FROM appUsers WHERE appUserName = :username');

			$records->bindParam(':username', $username, PDO::PARAM_STR);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			//var_dump($results);
			if(count($results) > 0 && verify_pw($password, $results['appUserPassword'])){
				$_SESSION['username'] = $results['appUserName'];
				
				header('location:dashboard.php');
				exit;
			}else{
				$errMsg .= 'Utilisateur ou le mot de passe est incorrect !<br>';
			}
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Newsletter Application Home</title>
	<style type="text/css">
	body
	{
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
	}
	label
	{
		font-weight:bold;
		width:100px;
		font-size:14px;
	}
	.box
	{
		border:1px solid #006D9C;
		margin-left:10px;
		width:60%;
	}
	.submit{
		border:1px solid #006D9C;
		background-color:#006D9C;
		color:#FFFFFF;
		float:right;
		padding:2px;
	}
	</style>
</head>
<body bgcolor="#FFFFFF">
	
	<div align="center">
		<div class="tLink"><strong>Login:</strong> demo / demo </div><br />
		<div style="width:300px; border: solid 1px #006D9C; " align="left">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:12px;">'.$errMsg.'</div>';
				}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:3px;"><b>Connexion Newsletter Application</b></div>
			<div style="margin:30px">
				<form action="" method="post">
					<label>Nom d'utilisateur  :</label><input type="text" name="username" class="box"/><br /><br />
					<label>Mot de passe  :</label><input type="password" name="password" class="box" /><br/><br />
					<input type="submit" name='submit' value="Connecter" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
