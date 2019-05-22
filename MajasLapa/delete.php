<?php
session_start();

if(empty($_SESSION['login_user'])){
    echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
}
else{

if($_SESSION['user'] == 0){
 
    
    if( isset($_GET['del']))
	{  
        if($_SESSION['user'] == 0){
		$id = $_GET['del'];
        $sqlLink = mysqli_connect('localhost', 'root', '', 'csm');
		$sql= "DELETE FROM users WHERE id='$id'";
		$res= mysqli_query($sqlLink, $sql) or die("Failed".mysqli_error());
		echo "<meta http-equiv='refresh' content='0;url=/cms/admin.php'>";
        }else{
             echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
        }
	}
       
}else{
    echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
}
}
?>