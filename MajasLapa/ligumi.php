<?php
session_start();
$conn=new PDO('mysql:host=localhost; dbname=csm', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
    $name=$_FILES['photo']['name'];
    $size=$_FILES['photo']['size'];
    $type=$_FILES['photo']['type'];
    $temp=$_FILES['photo']['tmp_name'];
    $caption1=$_POST['caption'];
    $link=$_POST['link'];
    move_uploaded_file($temp,"upload/".$name);
    $query=$conn->query("insert into upload(name)values('$name')");
    if($query){
        header("location:ligumi.php");
    }
    else{
        die(mysql_error());
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title>iDala līgumi</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<body>

<div class="header">
  <h1>iDala līgumi</h1>
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
      <h2 align="center">iDala ievietotie līgumi</h2>
	</div>
      <div class="cardDifferent">
      <div class="row-fluid">
          <div class="span12">
              <div class="container">

                  <h1><p>Upload  And  Download Files</p></h1>
                  <br />
                  <br />
                  <form enctype="multipart/form-data" action="" name="form" method="post">
                      Select File
                      <input type="file" name="photo" id="photo" /></td>
                      <input type="submit" name="submit" id="submit" value="Submit" />
                  </form>
                  <br />
                  <br />
                  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                      <thead>
                      <tr>
                          <th width="90%" align="center">Files</th>
                          <th align="center">Action</th>
                      </tr>
                      </thead>
                      <?php
                      $query=$conn->query("select * from upload order by id desc");
                      while($row=$query->fetch()){
                          $name=$row['name'];
                          ?>
                          <tr>

                              <td>
                                  &nbsp;<?php echo $name ;?>
                              </td>
                              <td>
                                  <button class="alert-success"><a href="download.php?filename=<?php echo $name;?>">Download</a></button>
                              </td>
                          </tr>
                      <?php }?>
                  </table>
              </div>
          </div>
      </div>
  </div>

  <div class="rightcolumn">
    <div class="card">
      <h2>iDala</h2>
      <script src="js/Giffy.js"></script>
    </div>
	
    <div class="card">
		<h3>Informācija</h3>
		<p>Kādam nolūkam paredzēta šī mājaslapa? Uzzini <a href ="why.html">šeit<a>!<br></p>
    </div>
	
    <div class="card">
      <h3>Saistītas lapas</h3>
      <p><a href ="https://lv.wikipedia.org/wiki/Satura_p%C4%81rvald%C4%ABbas_sist%C4%93ma">Informācija par CMS</a><br></p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>iDala dokumentu pārvaldība</h2>
</div>

</body>
</html>