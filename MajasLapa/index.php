<?php
session_start(); 
$error=''; 
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "<font color='red'><b><i><br>Nepareizs lietotājvārds un / vai parole!</i></b></font>";
	}
	else {
		$username=$_POST['username'];
		$password=$_POST['password'];

		$connection = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($connection, "writers");
		$query = mysqli_query($connection, "select * from registration where password='$password' AND username='$username'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; 
			header("location: profile.php"); 			
		}
		else {
			$error = "<font color='red'><b><i><br>Nepareizs lietotājvārds un / vai parole!</i></b></font>";
		}
	mysqli_close($connection);
	}
}

if(isset($_SESSION['login_user'])&& $_SESSION['login_user'] == true){
	print "<script language=\"Javascript\">document.location.href='profile.php' ;</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="favicon.ico" type="image/ico">
	<title>iDala | iedvesmo | dalies </title>
	<style>
	#login{
		background: rgba(230,233,205,0.7);
		padding: 4%;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	
	#regisText{
		background: rgba(209,201,168,0.8);
		padding: 5%;
	}
	</style>
</head>

<body align="center" background="start-background.jpg">
	<div id="login">
	<img src="source.gif" alt=""style="width:12.5em;height:13.12em;">
	<h2 id="regisText">Pieslēgties lapai:</h2>
	<form action="" method="post">
		<label>Lietotājvārds:</label>
		<input id="name" name="username" placeholder="lietotajvards" type="text">
		<label>Parole:</label>
		<input id="password" name="password" placeholder="**********" type="password">
		<input name="submit" type="submit" value=" Ienākt ">
		<span><?php echo $error; ?></span>
	</form>
		
	<p>Vēlies kļūt par reģistrētu lietotāju? Reģistrējies <a href ="register.php">šeit<a>!<br></p>
	<p>Kādam nolūkam paredzēta šī mājaslapa? Uzzini <a href ="why.html">šeit<a>!<br></p>
	</div>
</body>

</html>