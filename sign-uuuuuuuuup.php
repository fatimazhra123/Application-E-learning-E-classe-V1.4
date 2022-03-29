<?php
    session_start();
    if(isset($_SESSION['USERNAME'])){
      header("location: dashboard.php");
  }
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname ="e_classe_db";
  // Create connection
  $connect = mysqli_connect($servername, $username, $password,$dbname);

  if(isset($_POST['Signup'])){
    $USERNAME = $_POST["USERNAME"] ;
    $Email = $_POST["Email"] ;
    $password= $_POST["password"] ;
    $confirm_passw = $_POST["confirm_passw"];
    
    
    $query="INSERT INTO comptes(USERNAME,Email, password,confirm_passw) values ('$USERNAME','$Email','$password','$confirm_passw')";
     if(mysqli_query($connect,$query)) {
       header('location: index.php');
     } else {
     }
    }
?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
 </head>
    
<body>
  <main>
     <div class="login d-flex justify-content-center align-items-center">
      <div class="bg-white p-3  rounded-3 " id="log">
       
          <div class=" ">
            <h1 class="border-start px-2 m-3 border-info border-5 fw-bold fs-3">
               E-classe
            </h1>
          </div>
          <div class=" text-center ">
            <h2 class="text-uppercase fs-5"> Sign up </h2>
            <p class=" text-muted "> Enter your information  to register a new accont</p>  
          </div>
    
    
     <?php 
            if(isset($_SESSION['message_error'])){

                echo "<div class='alert alert-danger' role='alert'>";
                echo  $_SESSION["message_error"];
              //  A simple danger alert—check it out!
                echo "</div>";
                $_SESSION["message_error"] = null;
            }      
     
     ?>
         <form  id ="form" method="POST" onsubmit="return validation()">
         
          <div class="form-group">
          <div class="form-group mt-3">
            <label >hello :</label>
            <input type="text" class="form-control" id="hello"  name="USERNAME" value="" placeholder="">
            <span id="emailid" ></span>
          </div>
              <label >Username :</label>
              <input type="text" class="form-control" id="USERNAME"  name="USERNAME" value="" placeholder="Entre your Name" >
              <span id="nameid" ></span>
          </div>
          <div class="form-group mt-3">
            <label >Email :</label>
            <input type="text" class="form-control" id="Email"  name="Email" value="" placeholder="Entre your email">
            <span id="emailid" ></span>
          </div>
          <div class="form-group mt-3">
            <label >Password :</label>
            <input type="password" class="form-control" name = "password"  value="" id="password" placeholder="Entre your password">
            <span id="passwordid" ></span>
          </div>
          <div class="form-group mt-3">
            <label >Confirme Password :</label>
            <input type="password" class="form-control mb-4" name = "confirm_passw"  value="" id="confirm_passw" placeholder="Confirme your Password">
            <span id="Confirmpasswordid" ></span>
          </div>

         <button type="submit"class="btn  btn-info w-100 text-white text-uppercase  "  value="Sign in" name="Signup"> 
          Sign up
          </button>
          <div class="mt-3 text-center">
            <span class="text-muted">
            have already an account? 
            </span>
             <a class="text-info text-decoration-underline" href="index.php"> <span>Login her</span></a> 
          </div>
        </form>
      </div>
    </div>
  </main>
  <script src="codess.js"> </script>
</body>

</html>