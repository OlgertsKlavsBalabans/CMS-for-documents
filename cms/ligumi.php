<?php
session_start();
//include 'filesLigumi.php';


if(empty($_SESSION['login_user'])){
    echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
}
else{
$msg = '';


if($_SESSION['user'] == '0' || $_SESSION['user'] == '1'){

include 'filesLigumi.php';
$user_name=$_SESSION['login_user'];
$e_mail = $_SESSION['email'];


$conn=new PDO('mysql:host=localhost; dbname=csm', 'root', '') or die(mysql_error());
    

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
  <a href="pavadzimes.php">Pavadzīmes</a>
   <a href="rekini.php">Rēķini</a>
    <a href="ligumi.php">Līgumi</a>
	 <a href="citi.php">Citi dokumenti</a>
    <a href="logout.php" style="float:right">Iziet</a>
    <?php
    if($_SESSION['user'] == 0){
    ?>
    <a href="admin.php" style="float:right">ADMIN CP</a>
    <?php
    }
    ?>
</div>

<div class="row">
  <div class="leftcolumn">
   
    <div class="cardDifferent">
      <h2 align="center">iDala ievietotie līgumi</h2>
	</div>
      <div align="center" class="cardDifferent">
                
                <?php
                date_default_timezone_set("Europe/Riga");
                
                $date =  "".date("Y.m.d")."";   
   
                ?>
                <h5><font color="blue"><?php echo $msg ;?></font></h5>
          
                  <form  enctype="multipart/form-data" action="" name="form" method="post">
                      <input type="file" name="myfile"> <br><br>
                    <button type="submit" name="save">Augšupielādēt</button>
                  </form>
                  <br />
                  <br />
                  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                      <thead>
                      <tr>

                          <th width="15%" align="center">Datums un Laiks</th>
                          <th align="center">Lietotājs</th>
                          <th width="10%" align="center">Ē-Pasts</th>
                          <th width="60%" align="center">Fails</th>
                          <th width="30%" align="center">Izmērs</th>
                          <th align="center">Dzēst</th>
                          <th align="center">Lejupladēt</th>
                          <th align="center">Lejupielāžu skaits</th>
                      </tr>
                      </thead>
                      <?php
                      $query=$conn->query("select * from ligumi order by id desc");
                      while($row=$query->fetch()){
                          $name=$row['name'];
                          $user_name=$row['user_name'];
                          $id = $row['id'];
                          $emails = $row['mail'];
                          $size = $row['size'];
                          $downloads = $row['downloads'];
                          $date = $row['date'];
                          ?>
                          <tr>

                            
                              <td>
                                  &nbsp;<?php echo $date ;?>
                              </td>
                              
                              <td>
                                  &nbsp;<?php echo $user_name ;?>
                              </td>
                              
                              <td>
                                  &nbsp;<?php echo $emails;?>
                              </td>

                              <td>
                                  &nbsp;<?php echo $name ;?>
                              </td>
                              
                               <td>
                                  &nbsp;<?php echo floor($size / 1000) . ' KB'; ?>
                              </td>
                              
                              <td>
                                  <button class="alert-success"><a href="ligumi.php?del=<?php echo $id;?>">Dzēst</a></button>
                              </td>

                              <td>
                                  <button class="alert-success"><a href="ligumi.php?file_id=<?php echo $id;?>">Lejupielādēt</a></button>
                              </td>
                              
                              <td>
                                  &nbsp;<?php echo $downloads ;?>
                              </td>
                          </tr>
                      <?php }?>
                  </table>
      </div>
  </div>

 <div class="rightcolumn">
  <div class ="card">
	<h2>iDala</h2>
	</div>
	<div class ="card">
    <div id="imageTag">
	<h2> This is you </h2>
      
      <script src="js/Giffy.js"></script> 
    </div>
	</div>
	
    <div class="card">
		<h3>Informācija</h3>
        <p>Kādam nolūkam paredzēta šī mājaslapa? Uzzini <a href ="why.html">šeit!</a><br></p>
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
<?php
}else{
    session_destroy();
    echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
}
}
?>