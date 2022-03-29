<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";
$update= false;
$id = 0;
// Create connection
$connect = mysqli_connect($servername, $username, $password,$dbname);
echo"connected";
if(isset($_POST['update']) && isset($_GET['edit'])){

    $id = $_GET['edit'];
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
    $Enroll_Number=$_POST['Enroll_Number']; 
    $connect->query("UPDATE students SET Name = '$Name', Email= '$Email' ,Phone= '$Phone' , Enroll_Number= '$Enroll_Number' WHERE id ='$id'") or die ($connect->error);
    header('location: students.php');
  }
  
  ?>
  