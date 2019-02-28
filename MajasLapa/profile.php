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
<title>Ievietot darbu iDala</title>
<link rel="icon" href="favicon.ico" type="image/ico">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial;
    padding: 10px;
}

.header {
    padding: 30px;
    text-align: center;
    background: white;
}

.header h1 {
    font-size: 50px;
}

.topnav {
    overflow: hidden;
    background-color: #B3976D;
}

.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.topnav a:hover {
    background-color: #D1C9A8;
    color: black;
}

.leftcolumn {   
    float: left;
    width: 75%;
}

.rightcolumn {
    float: left;
    width: 25%;
    padding-left: 20px;
}

.card {
    background-color: white;
    padding: 20px;
    margin-top: 20px;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

.footer {
    padding: 20px;
    text-align: center;
    background: #ddd;
    margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
    .leftcolumn, .rightcolumn {   
        width: 100%;
        padding: 0;
    }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
    .topnav a {
        float: none;
        width: 100%;
    }
}

textarea {
   resize: none;
   width: 100%;
}
</style>
</head>

<body background="start-background.jpg">

<div class="header">
  <h1>iDala</h1>
  <p>Jūs rakstāt, mēs palīdzam saglabāt, dalīties, iedvesmoties</p>
</div>

<div class="topnav">
  <a href="profile.php">Ievietot darbu</a>
  <a href="allwritings.php">iDala darbi</a>
  <a href="logout.php" style="float:right">Iziet</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
		<h2>Ievietot iDala jaunu darbu</h2>
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
    <div class="card">
      <h2>iDala</h2>
      <img src="source.gif" alt=""style="width:12.5em;height:13.12em;">
    </div>
	
    <div class="card">
		<h3>Informācija</h3>
		<p>Kādam nolūkam paredzēta šī mājaslapa? Uzzini <a href ="why.html">šeit<a>!<br></p>
    </div>
	
    <div class="card">
      <h3>Saistītas lapas</h3>
       <p><a href ="http://rakstnieciba.lv/">Latvijas Rakstnieku savienība<a><br></p>
	   <p><a href ="http://rakstu.lv/">Literārā Akadēmija<a><br></p>
	   <p><a href ="http://literatura.lv/lv/post/index">Literatūras jaunumi<a><br></p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>iDala - iedvesmo un dalies</h2>
</div>



</body>
</html>