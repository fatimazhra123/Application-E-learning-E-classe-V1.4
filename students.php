
<?php
    session_start();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";
// Create connection
$conn =mysqli_connect($servername, $username, $password,$dbname);


if(isset($_POST['add'])){
    $image = $_POST['image'] ;
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
    $Enroll_Number=$_POST['Enroll_Number'];
    $Date_of_admission=$_POST['Date_of_admission'];
    
    $query="INSERT INTO students(image,Name,Email,Phone,Enroll_Number,Date_of_admission) values('$image','$Name','$Email',$Phone ,$Enroll_Number,$Date_of_admission) ";
     mysqli_query($connect,$query);
     header('location: students.php');
    
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="students.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/3a3f417346.js" crossorigin="anonymous" defer></script>
    <title>students</title>


</head >

<body >
    <!-- sid_bar -->

    <?php 
     include 'sidbar2.php';  
     ?>
    <!-- navbar -->

    <?php include './nav-bar3.php ';   ?>
      <div>
                            <i class="fas fa-sort mx-3 text-info "></i>
                           


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD NEW STUDENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  action= "" method="POST">
      <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image </label>
            <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Entre your image" name="image">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name </label>
            <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Entre your name" name="Name" >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email </label>
            <input type="email" class="form-control" id="exampleInputEmail1" required  placeholder="Entre your email" name="Email" >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">phone </label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entre your phone" name="Phone" >
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Enroll Number</label>
            <input type="text" class="form-control mb-4" placeholder="Entre your Enroll" required id="exampleInputPassword1"   name="Enroll_Number">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Date of admission</label>
            <input type="date" class="form-control mb-4" placeholder="Entre your date" required id="exampleInputPassword1"  name="Date_of_admission">
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add">ADD NEW STUDENT</button>
        </form>

      </div>
     
    </div>
  </div>
</div>
                        </div>
    <!--  tableau --> 
    <div id="page-content-wrapper">

        <div class="container-fluid px-3 mt-4">
            <div class="table-responsive ">
                <table class="table table-borderless payments">




                    <table class="table table-borderless" style="width: 100%;">
                   
            
      echo" <tr  class=' align-middle border-5 border-light text-secondary  5'>
     
      <th> image</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Enroll_Number</th>
      <th>Date_of_admission </th>
    
    </tr>";
      
       ?>
           </thead>
       
    <?php
      $req="SELECT * FROM students ";
      $res = $conn -> query($req);
      if($res -> num_rows > 0){
        
        while( $student = $res -> fetch_assoc()): ?>
    <tr class='bg-white align-middle border-5 border-light' class='text-secondary'>
  
       <td class='py-3'><img src=' image/<?php echo $student ['image']?>'alt="user" style="width: 50px;" > </td>
       <td class='py-3'> <?php echo $student ['Name']?></td>
       <td class='py-3'> <?php echo $student ['Email']?></td>
       <td class='py-3'> <?php echo $student ['Phone']?></td>
       <td class='py-3'> <?php echo $student ['Enroll_Number']?></td>
       <td class='py-3'> <?php echo $student ['Date_of_admission']?></td>
       <td class='py-3'>
       <a href="create.php?edit=<?php echo $student['id'];?>" type='button' class="btn  btn-sm">
         <i class="fas fa-pen pe-2 text-info"></i>
       </a>
       </td>
       <td class="py-3">
       <a href="create.php?delete=<?php echo $student['id'];?>" type="button" class="btn  btn-sm">
         <i class="fas fa-trash text-info"></i>
       </a>
     </td>
     </tr>
     <?php endwhile; } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

</body>



</html> 