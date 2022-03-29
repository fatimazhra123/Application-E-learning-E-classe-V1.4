<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";
$update= false;
$id = 0;
// Create connection
$connect = mysqli_connect($servername, $username, $password,$dbname) or die($connect->error);
echo 'connected';

#delete data:

if (isset($_GET['delete'])){
    $id = $_GET['delete'] ?? "";
    echo $id;
    $connect->query("DELETE FROM  course WHERE id = $id") or die ($connect->error);
    
    header('location:course.php');
  
  }