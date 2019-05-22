<?php

if(empty($_SESSION['login_user'])){
    echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
}
else{

if($_SESSION['user'] == '0' || $_SESSION['user'] == '1'){
    
$user_name=$_SESSION['login_user'];
$e_mail = $_SESSION['email'];

// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'csm');

$sql = "SELECT * FROM ligumi";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files in ligumi
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    
    //$filename = strtolower(htmlentities($filename)); 
    $filename = str_replace(get_html_translation_table(), "-", $filename);
    $filename = str_replace(" ", "_", $filename);
    $filename = preg_replace("/[-]+/i", "-", $filename);
    
    
    $sql_e = "SELECT * FROM ligumi WHERE name='$filename'";
  	$res_e = mysqli_query($conn, $sql_e);
        
    
    // destination of the file on the server
    $destination = 'ligumi/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['doc', 'pdf', 'docx', 'xls', 'xlsx','odt'])) {
        $msg = 'Faila paplašinājumam ir jabūt - .doc, docx, .pdf, .xls, .xlsx, ,odt';
    } elseif ($_FILES['myfile']['size'] > 3000000) { // file shouldn't be larger than 1Megabyte
        $msg = 'Fails ir par lielu (Maksimālais faila izmērs = 3MB)!';
    }elseif (mysqli_num_rows($res_e) > 0) {
           $msg = 'Fails ar tādu nosakumu jau eksistē!';
    }else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO ligumi (user_name, mail ,name, size, downloads) VALUES ('$user_name','$e_mail','$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                $msg = 'Fails veiksmīgi augšupielādēts';
            }
        } else {
            $msg = 'Neizdevās augšupielādēt!';
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM ligumi WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'ligumi/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('ligumi/' . $file['name']));
        readfile('ligumi/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE ligumi SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}

//Delete files

if (isset($_GET['del'])) {
    
    if($_SESSION['user'] == 0){
        
        
    $id = $_GET['del'];

    // fetch file to download from database
    $sql = "SELECT * FROM ligumi WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);
    
    $filepath = 'ligumi/' . $file['name'];
    
    if(unlink($filepath)) //echo "Deleted file 
        ;
    
    $sql2 = "DELETE FROM ligumi WHERE id=$id";
    $result = mysqli_query($conn, $sql2);

    echo "<meta http-equiv='refresh' content='0;url=/cms/ligumi.php'>";
    exit;
        
    }else{
        echo "<meta http-equiv='refresh' content='0;url=/cms/ligumi.php'>";
    }
}
    
}else{
    session_destroy();
    echo "<meta http-equiv='refresh' content='0;url=/cms/index.php'>";
}
}