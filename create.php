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

// if(isset($_POST['update']) && !isset($_GET["edit"])){
  if(isset($_POST['add'])){
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Phone=$_POST['Phone'];
$Enroll_Number=$_POST['Enroll_Number'];


$query="INSERT INTO students(Name,Email,Phone,Enroll_Number) values('$Name','$Email',$Phone ,$Enroll_Number) ";
 mysqli_query($connect,$query);
 header('location: students.php');

}
// #delete delete data:

if (isset($_GET['delete'])){
  $id = $_GET['delete'] ?? "";
  echo $id;
  $connect->query("DELETE FROM students WHERE id = $id") or die ($connect->error);
  
  header('location:students.php');

}

#edit selct data:
if (isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update= true;
  $students=$connect->query("SELECT * FROM students WHERE id = $id") or die ($connect->error);
  if($students -> num_rows> 0){
    $student = $students-> fetch_array();
    $Name = $student ['Name'];
    $Email= $student ['Email'];
    $Phone= $student ['Phone'] ;
    $Enroll_Number= $student['Enroll_Number'] ;
    $date = $student['Date_of_admission'];

  }
}
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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="../css/style_total.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!---->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
  <!-- sid_bar -->
<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
 
}
html,body{
  background-color:	#DCDCDC;
 }
.nav__bar {
   background-color: #FAFFC1;
   width: 300px;
   height: 1000px;
   left: 0px;
   top: 0px;
   }
   .form{
     margin-left: 0px;
   }
       .logoo {
   
         width: 120px;
      
   
       }
   
       .paragraph {
         transform: translateY(-31Px);
         margin-left: 44px;
       }
   
       .List_ {
         transform: translateY(30Px);
         margin-left: 30px;
         gap: 19px;
   
       }
       .List_ :hover {
         background-color: #00C1FE
       }
   
       .NavNav {
         width: 974px;
         height: 60px;
         left: 230px;
       }
   
       .imgNave {
         width: 660px;
       }
   

.nav__bar {
  background-color: #FAFFC1;
  width: 300px;
  height: 1000px;
  left: 0px;
  top: 0px;
  }
  .form{
    margin-left: 0px;
  }
      .logoo {
  
        width: 120px;}

     
       table{
         margin-left: 250px;
       }
       .logo{
         width: 120px;
        
       }

      .paragraph {
        transform: translateY(-31Px);
        margin-left: 44px;
      }
  
      .List_ {
        transform: translateY(30Px);
        margin-left: 30px;
        gap: 19px;
  
      }
      .List_ :hover {
        background-color: #00C1FE
      }
  
      .NavNav {
        width: 974px;
        height: 60px;
        left: 230px;
      }
  
      .imgNave {
        width: 660px;
      }
  
    
      table{
        margin-left: 250px;
      }
      .logo{
        width: 120px;
       
      }
     



</style>
  <?php 
     include 'sidbar2.php';  
     ?>
<main class="container-fluid mt-0 mt-auto ">
        <div class=" cont row d-flex ">
            <div class=" d-flex justify-content-center align-item-center">
                <form action="" method="POST" class=" w-50">

                <h1 class="text-center text-secondary mt-3">Students informations :</h1>
                <h2 class="text-center text-primary">Saisissez les informations de l'apprenant</h2>
                     <div class="mb-2">
                      <label  class="form-label text-secondary">Name</label>
                      <input type="texte" class="form-control" name="Name" placeholder="name" value="<?php echo $Name ?>">
                    </div>
                     <div class="mb-2">
                      <label class="form-label text-secondary">Email</label>
                      <input type="Email" class="form-control" name="Email" placeholder="Enter your email" value="<?php echo $Email ?>">
                    </div>
                    <div class="mb-2">
                    <label class="form-label text-secondary">Phone</label>
                      <input type="number" value="<?php echo $Phone ?>" class="form-control" name="Phone" placeholder="Number">
                    </div>
                    <div class="mb-2">
                      <label  class="form-label text-secondary">Number</label>
                      <input type="number" class="form-control"  name="Enroll_Number" placeholder="number" value="<?php echo $Enroll_Number ?>">
                    </div>
                    <div class="mb-4 mb-sm-2">
                      <label  class="form-label text-secondary" >Date</label>
                      <input type="date" class="form-control" name="Date_of_admission" value="<?php echo $date ?>">
                    </div>
                    <?php 
                      if($update==true):
                    ?>
                    <button class="btn btn-info text-white w-100" type="submit" name="update" value="update">Update</button>
                    <?php 
                      else:
                    ?>
                    <button class="btn btn-info text-white w-100"type="submit" name="add">submit</button>
                    <?php 
                      endif;
                    ?>
                  </form>
                  </div>
        </div>
    </main>
</body>
</html>