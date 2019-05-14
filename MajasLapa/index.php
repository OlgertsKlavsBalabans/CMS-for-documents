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
		$db = mysqli_select_db($connection, "csm");
		$query = mysqli_query($connection, "select * from users where password='$password' AND username='$username'");
		$row = mysqli_fetch_row ($query);
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$username;	
			$_SESSION['user']=$row[8]; 
			$_SESSION['email']=$row[5]; 
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
<link rel="stylesheet" type="text/css" href="style.css">
	<title>iDala dokumentiem </title>
</head>

<body align="center">
	<div id="login">
	<script src="js/GiffyIndex.js" ></script>
	<h2 id="regisText">Pieslēgties lapai:</h2>
	<form action="" method="post">
		<label>Lietotājvārds:</label>
		<input id="name" name="username" placeholder="lietotajvards" type="text">
		<label>Parole:</label>
		<input id="password" name="password" placeholder="**********" type="password">
		<input name="submit" type="submit" value=" Ienākt ">
		<span><?php echo $error; ?></span>
	</form>
		
	<p>Kādam nolūkam paredzēta šī mājaslapa? Uzzini <a href ="why.html">šeit<a>!<br></p>
	</div>
</body>

</html>