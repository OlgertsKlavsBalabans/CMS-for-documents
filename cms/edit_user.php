<?php
session_start();

if(empty($_SESSION['login_user'])){
    echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
}
else{

if($_SESSION['user'] == 0){
 
    
    if( isset($_GET['edit']))
	{  
        if($_SESSION['user'] == 0){
		$id = $_GET['edit'];
            
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$res= mysqli_query($sqlLink,"SELECT * FROM users WHERE id='$id'");
		$row= mysqli_fetch_array($res);
        
		//echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
        }else{
             echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
        }
	
    }
    
    if( isset($_POST['fname']) && $_POST['fname'] != '')
	{
        $id = $_POST['id'];
		$fname = $_POST['fname'];
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$sql     = "UPDATE users SET fname='$fname' WHERE id='$id'";
		$res 	 = mysqli_query($sqlLink,$sql) or die("Could not update".mysqli_error());
        echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
	}
    
    if( isset($_POST['lname']) && $_POST['lname'] != '')
	{
        $id = $_POST['id'];
		$lname = $_POST['lname'];
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$sql     = "UPDATE users SET lname='$lname' WHERE id='$id'";
		$res 	 = mysqli_query($sqlLink,$sql) or die("Could not update".mysqli_error());
        echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
	}
    
    if( isset($_POST['age']) && $_POST['age'] != '')
	{
        $id = $_POST['id'];
		$age = $_POST['age'];
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$sql     = "UPDATE users SET age='$age' WHERE id='$id'";
		$res 	 = mysqli_query($sqlLink,$sql) or die("Could not update".mysqli_error());
        echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
	}
    if( isset($_POST['access']) && $_POST['access'] != '')
	{
        $id = $_POST['id'];
		$access = $_POST['access'];
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$sql     = "UPDATE users SET access='$access' WHERE id='$id'";
		$res 	 = mysqli_query($sqlLink,$sql) or die("Could not update".mysqli_error());
        echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
	}
    if( isset($_POST['gender']) && $_POST['gender'] != '')
	{
        $id = $_POST['id'];
		$gender = $_POST['gender'];
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$sql     = "UPDATE users SET gender='$gender' WHERE id='$id'";
		$res 	 = mysqli_query($sqlLink,$sql) or die("Could not update".mysqli_error());
        echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
	}
    if( isset($_POST['password']) && $_POST['password'] != '')
	{
        $id = $_POST['id'];
		$password = $_POST['password'];
        $password = sha1($password);
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$sql     = "UPDATE users SET password='$password' WHERE id='$id'";
		$res 	 = mysqli_query($sqlLink,$sql) or die("Could not update".mysqli_error());
        echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
	}
    
    if( isset($_POST['email']) && $_POST['email'] != '')
	{
        $id = $_POST['id'];
        $email = $_POST['email'];
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
        $sql_e = "SELECT * FROM users WHERE email='$email'";
        $res_e = mysqli_query($sqlLink, $sql_e);
        
        if(mysqli_num_rows($res_e) > 0){
            echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
        }else{
            
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$res= mysqli_query($sqlLink,"SELECT * FROM users WHERE id='$id'");
		$row= mysqli_fetch_array($res);
        
        $emailCheck = $row[5];  
            
		$sql     = "UPDATE users SET email='$email' WHERE id='$id'";
		$res 	 = mysqli_query($sqlLink,$sql) or die("Could not update".mysqli_error());
        
        //echo $emailCheck;
        //echo $email;
        
        $sql_l= mysqli_query($sqlLink,"UPDATE ligumi SET mail='$email' WHERE mail='$emailCheck'");
        $sql_l= mysqli_query($sqlLink,"UPDATE rekini SET mail='$email' WHERE mail='$emailCheck'");
        $sql_l= mysqli_query($sqlLink,"UPDATE citi SET mail='$email' WHERE mail='$emailCheck'");
        $sql_l= mysqli_query($sqlLink,"UPDATE pavadzimes SET mail='$email' WHERE mail='$emailCheck'");
                  
   
        echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
	}}
    
    
    if( isset($_POST['username']) && $_POST['username'] != '')
	{
        $id = $_POST['id'];
        $username = $_POST['username'];
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
        $sql_e = "SELECT * FROM users WHERE username='$username'";
        $res_e = mysqli_query($sqlLink, $sql_e);
        
        if(mysqli_num_rows($res_e) > 0){
            echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
        }else{
            
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$res= mysqli_query($sqlLink,"SELECT * FROM users WHERE id='$id'");
		$row= mysqli_fetch_array($res);
        
        $userCheck = $row[6];  
        
            
		$sql     = "UPDATE users SET username='$username' WHERE id='$id'";
		$res 	 = mysqli_query($sqlLink,$sql) or die("Could not update".mysqli_error());
        

        
        $sql_l= mysqli_query($sqlLink,"UPDATE ligumi SET user_name='$username' WHERE user_name='$userCheck'");
        $sql_l= mysqli_query($sqlLink,"UPDATE rekini SET user_name='$username' WHERE user_name='$userCheck'");
        $sql_l= mysqli_query($sqlLink,"UPDATE citi SET user_name='$username' WHERE user_name='$userCheck'");
        $sql_l= mysqli_query($sqlLink,"UPDATE pavadzimes SET user_name='$username' WHERE user_name='$userCheck'");
                  
   
        echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
	}}
    
    if( isset($_POST['test']) && $_POST['test'] == ''){
       echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>"; 
    }
    
    
    }else{
       echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>" ;
    }
    
    
    
?>

<html>

<head>
	<link rel="icon" href="favicon.ico" type="image/ico">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Pievienoties</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
 
<body background="start-background.jpg">
<br><br><br>
<form action="edit_user.php" method="post" id="forma">
<table align="center">
    <p> <h2 align="center" id="regisText">Redigēt Lietotāju</h2> <p>
<input type="hidden" name="id" value="<?php echo $row[0]?>"><br/>
<h5 align="center">* Pirms mainiet lietotajā E-Pastu un/vai Lietotājvārdu,
    <br> parliecinieties vai lietotājs ir izlogojies. </h5>
<h5 align="center">Vai arī to nobloķējiet un nomainiet E-Pastu un/vai Lietotājvārdu. </h5>
<input type="hidden" name="test" value=""><br/>
<tr>
<td>Vārds:</td>
<td><input type="text" name="fname" placeholder="Ievadiet savu vārdu" id="name"></td>
</tr>

<tr>
<td>Uzvārds:</td>
<td><input type="text" name="lname" placeholder="Ievadiet savu uzvārdu"id="surname"></td>
</tr>

<tr>
<td>Vecums:</td>
<td><input type="number" name="age" min="0" max="110" placeholder="12" id="age"><br></td>
</tr>

<tr>
<td>Dzimums</td>
<td><input type="radio" name="gender" value="Vīrietis" id="gender">Vīrietis</td>
</tr>

<tr>
<td></td>
<td><input type="radio" name="gender" value="Sieviete" id="gender" placeholder="12">Sieviete</td>
</tr>
 
<tr>
<td>E-pasts:</td>
<td><input type="email" name="email" placeholder="piemers@piemers.lv" id="email"></td>
</tr>
 
<tr>
<td>Lietotājvārds: </td>
<td><input type="text" name="username" placeholder="Ievadiet lietotājvārdu" id="username"></td>
</tr>
 
<tr>
<td>Parole:</td>
<td><input type="password" name="password" placeholder="******" id="password"></td>
</tr>
<tr>

<tr>
<td>Piekļuves līmenis</td>
<td><input type="radio" name = "access" value = "0" placeholder="1" id="access"> Administrators</td>
</tr>
<tr>
<tr>
<td></td>
<td><input type="radio" name = "access" value = "1" placeholder="1" id="access">Lietotājs</td>
</tr>
<tr>
<td></td>
<td><input type="radio" name = "access" value = "2" placeholder="1" id="access">Bloķēts</td>
</tr>
<tr>

<tr>

<tr>
<td></td>
    <td><input type="submit" name="submit" value="Atjaunot Datus"></td>
</tr>
</table>
<tr>
<td></td>
</tr>
<br>
<p><a href="/cms/admin.php">Uz Administracijas paneli</a></p>
<p><a href="why.html">Informācija</a></p>

</form>


</body>
</html>

  
    
<?php   
}
?>