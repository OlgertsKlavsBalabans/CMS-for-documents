<?php
session_start();


if(empty($_SESSION['login_user'])){
    echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
}
else{

if($_SESSION['user'] == 0){

$user_name=$_SESSION['login_user'];
$conn=new PDO('mysql:host=localhost; dbname=csm', 'root', '') or die(mysql_error());

?>


<!DOCTYPE html>
<html>

<head>
    <title>Administratora Panelis</title>
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
    <a href="register.php" style="float:right">Reģistrēt Lietotāju</a>
    <?php
    }
    ?>
</div>

<div class="row">
    <div class="leftcolumn">

        <div class="cardDifferent">
            <h2 align="center">Administratora Panelis</h2>
        </div>
        <div class="cardDifferent">


            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                <tr>

                    <th align="center">ID</th>
                    <th align="center">Vārds</th>
                    <th align="center">Uzvārds</th>
                    <th align="center">Vecums</th>
                    <th align="center">Dzimums</th>
                    <th align="center">Ē-pasts</th>
                    <th align="center">Lietotājvārds</th>
                    <th align="center">Atļauju līmenis</th>
                    <th align="center">Rediģēt</th>
                    <th align="center">Dzēst</th>
                </tr>
                </thead>
                <?php
                $query=$conn->query("select * from users order by id");
                while($row=$query->fetch()){
                    $id=$row['id'];
                    $f_name=$row['fname'];
                    $l_name=$row['lname'];
                    $age = $row['age'];
                    $gender = $row['gender'];
                    $email = $row['email'];
                    $username = $row['username'];
                    $access = $row['access'];
                    ?>
                    <tr>

                        <td>
                            &nbsp;<?php echo $id ;?>
                        </td>

                        <td>
                            &nbsp;<?php echo $f_name ;?>
                        </td>
                        
                        <td>
                            &nbsp;<?php echo $l_name ;?>
                        </td>
                        
                        <td>
                            &nbsp;<?php echo $age ;?>
                        </td>
                        
                        <td>
                            &nbsp;<?php echo $gender ;?>
                        </td>
                        
                        <td>
                            &nbsp;<?php echo $email ;?>
                        </td>
                        
                        <td>
                            &nbsp;<?php echo $username ;?>
                        </td>
                        
                        <td>
                            &nbsp;<?php echo $access ;?>
                        </td>
                        
                        <td>
                            <button class="alert-success"><a href="edit_user.php?edit=<?php echo $id;?>">Rediģēt</a></button>
                        </td>
                        
                        <td>
                            <button class="alert-success"><a href="delete.php?del=<?php echo $id;?>">Dzēst</a></button>
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
        <p>Kādam nolūkam paredzēta šī mājaslapa? Uzzini <a href ="why.html">šeit</a>!<br></p>
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
    echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
}
    
}