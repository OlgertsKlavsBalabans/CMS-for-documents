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
<title>iDala rekini</title>
<link rel="icon" href="favicon.ico" type="image/ico">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class="header">
  <h1>iDala rekini</h1>
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
   
    <div class="cardDifferent">
      <h2 align="center">iDala ievietotie rēķini</h2>
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
      <p><a href ="https://lv.wikipedia.org/wiki/Satura_p%C4%81rvald%C4%ABbas_sist%C4%93ma">Informācija par CMS<a><br></p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>iDala dokumentu pārvaldība</h2>
</div>

</body>
</html>