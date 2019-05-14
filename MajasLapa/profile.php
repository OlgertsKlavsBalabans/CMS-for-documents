<?php
$hostname = "localhost";
$username = "user";
$password = "";
$databaseName="writers";

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "writers");
if(isset($_REQUEST["submit"])) {
	$name=$_REQUEST["name"];
	$email=$_REQUEST["email"];
	$title=$_REQUEST["title"];
	$content=$_REQUEST["content"];
	mysqli_query($conn, "insert into writing(name, email, title, content)values('$name', '$email','$title', '$content')");
}

?>

<!DOCTYPE html>
<html>

<head>
<title>iDala</title>
<link rel="icon" href="favicon.ico" type="image/ico">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
  <h1>iDala</h1>
  <p>CMS dokumentu pārvaldībai tiešsaistē</p>
</div>

<div class="topnav">
  <a href="profile.php">Augšupielādēt</a>
  <a href="pavadzimes.php">Pavadzīmes</a>
   <a href="rekini.php">Rēķini</a>
    <a href="ligumi.php">Līgumi</a>
	 <a href="citi.php">Citi dokumenti</a>
  <a href="logout.php" style="float:right">Iziet</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
		<h2>Augšupielādēt iDala jaunu dokumentu</h2>
		<form action="" method="post" id="formaa">
		Autors: <br>
		<textarea placeholder="Autora pseidonīms / vārds, uzvārds" name="name" id="name" cols="100" rows="1" value='<?php if(isset($_POST['name'])) echo $_POST['name']; ?>'></textarea><br/>	
		Epasta adrese saziņai: <br>
		<textarea placeholder="piemers@piemers.lv" name="email" id="email" cols="100" rows="1" value='<?php if(isset($_POST['email'])) echo $_POST['email']; ?>'></textarea><br/>	
		Virsraksts: <br>
		<textarea placeholder="Darba virsraksts" name="title" id="title" cols="100" rows="1" value='<?php if(isset($_POST['title'])) echo $_POST['title']; ?>'></textarea><br/>	
		Darbs: <br>
		<textarea placeholder="Teksts" name="content" id="content" cols="100" rows="20" value='<?php if(isset($_POST['content'])) echo $_POST['content']; ?>'></textarea><br/>
		<input type="submit" value="Ievietot" name="submit" id="sumbit" onclick="myFunction()"/>
		</form> <br>
<script>
var formaa = document.getElementById('formaa');
function validateForm(event) {
	
	var name = document.getElementById('name');
	var email = document.getElementById('email');
	var title = document.getElementById('title');
	var content = document.getElementById('content');
	var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	if (name.value === "" ) {
		alert("Ievadiet vārdu!");	
		event.preventDefault(); //Apturēt formas nosūtīšanu		
	}
	else if(email.value === "") {
		alert("Norādiet e-pasta adresi!");
		event.preventDefault(); 
	}
	else if (!(email.value.match(emailformat))) {
		alert("Epasta adrese nav atpazīta! Epasta adreses piemērs: vardsuzvards@piemers.lv");
		event.preventDefault(); 	
	}
	else if (title.value === "" ) {
		alert("Ievadiet virsrakstu!");	
		event.preventDefault(); 	
	}
	else if(content.value === "" ) {
		alert("Ievadiet tekstu laukā 'darbs'!");	
		event.preventDefault(); 	
	}
	formaa.submit();
}
formaa.addEventListener("submit", validateForm, false);
</script>

    </div>
	
 
  </div>

  <div class="rightcolumn">
    <div id="imageTag">
      <h2>iDala</h2>
      <script src="js/Giffy.js"></script>
    </div>
	
    <div class="card">
		<h3>Informācija</h3>
		<p>Kādam nolūkam paredzēta šī mājaslapa? Uzzini <a href ="why.html">šeit<a>!<br></p>
    </div>
	
    <div class="card">
      <h3>Saistītas lapas</h3>
       <p><a href ="https://lv.wikipedia.org/wiki/Satura_p%C4%81rvald%C4%ABbas_sist%C4%93ma">Informācija par CMS<a><br></p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>iDala dokumentu pārvaldība</h2>
</div>



</body>
</html>