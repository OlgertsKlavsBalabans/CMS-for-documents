<?php
$hostname = "localhost";
$username = "user";
$password = "";
$databaseName="writers";

$conn = mysqli_connect("localhost", "root", "");

mysqli_select_db($conn, "writers");
?>

<!DOCTYPE html>
<html>

<head>
<title>iDala darbu lapa</title>
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
.cardDifferent {
    background-color: #E6E9CD;
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
}
</style>
</head>

<body background="start-background.jpg">

<div class="header">
  <h1>iDala darbu lapa</h1>
  <p>Jūs rakstāt, mēs palīdzam saglabāt, dalīties, iedvesmoties</p>
</div>

<div class="topnav">
  <a href="profile.php">Ievietot darbu</a>
  <a href="allwritings.php">iDala darbi</a>
  <a href="logout.php" style="float:right">Iziet no profila</a>
</div>

<div class="row">
  <div class="leftcolumn">
   
    <div class="cardDifferent">
      <h2 align="center">iDala ievietotie darbi</h2>
	</div>
<?php
$sql = "SELECT id, name, email, title, content FROM writing ORDER BY id DESC;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
	while($row = $result->fetch_assoc()) {
        echo " <div class='card'><br> <b>Autors:</b> " . $row["name"].  " <br> <b>Epasta adrese:</b> " . $row["email"].  "<br><b>Virsraksts:</b> " . $row["title"].  "<br> <b>Darbs:</b> " . $row["content"]. "<br><br> </div>";
	} 
}
else {
	echo "<div class='card'> Nav ievietots neviens darbs! </div>";
}
?>  
 
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