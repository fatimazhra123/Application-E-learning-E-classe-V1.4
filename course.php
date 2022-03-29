
<?php
    session_start();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";
// Create connection
$connect =mysqli_connect($servername, $username, $password,$dbname);

echo "connected";

?>

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
    <title>course</title>


</head >

<body >
    <!-- sid_bar -->

    <?php 
     include 'sidbar2.php';  
     ?>
    <!-- navbar -->

    <div class=" navbar navbar-light  bg-white p-2 col-12  d-flex justify-content-between ">

<img class="econsNav" src="skip-start-circle.svg" alt="econs">
<div class="d-flex ">
    <div class=" d-flex align-items-end justify-content-md-end mt-3 mt-md-0">
        <input class=" rounded form-control form-control-dark me-3 " type="text" placeholder="Search"
            aria-label="Search">
    </div>

    <img src="bell.svg" alt="IMAG">
</div>

<div class=" d-flex main-container.flex-sm-row.flex-column  container bg-light  justify-content-between py-3">
<div >
    <p class="fw-bold "></p>
</div>
<div>
 

    <div>
                <i class="fas fa-sort mx-3 text-info "></i>
                <button type="button" class="btn btn-info text-white  " data-bs-toggle="modal" data-bs-target="#exampleModal">ADD NEW COURSES</button>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD NEW COURSES</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form action="" method="POST">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Entre your name" name="Title">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">description </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required  placeholder="Entre your email" name="description">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="Entre your phone" name="Price">
                          </div>

                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="submit">ADD NEW COURSES</button>
                        </form>
                        <?php
                          if(isset($_POST['submit'])){
                            $Title=$_POST['Title'];
                            $description=$_POST['description'];
                            $Price=$_POST['Price'];
                          
                            $query=("INSERT INTO course(Title,description, Price) VALUES('$Title','$description','$Price' ) ");
                            mysqli_query($connect,$query);
                           
                           
                          }
                        
                        
                        ?>
                      </div>
                      







</div>
</div>
</div>
</div>

</div>
</div>
</div>
    <!-- tableau -->
    <div id="page-content-wrapper">

        <div class="container-fluid px-3 mt-4">
            <div class="table-responsive ">
                <table class="table table-borderless course">




                    <table class="table table-borderless" style="width: 100%;">
                   
                   
                    <?php
      echo" <tr  class=' align-middle border-5 border-light text-secondary  5'>
     
      <th>Title</th>
      <th>description</th>
      <th>Price</th>
     
    </tr>";
      
       ?>
           </thead>
       
    <?php
      $req="SELECT * FROM course ";
      $res = $connect -> query($req);
      if($res  -> num_rows > 0){
        
        while( $course = $res-> fetch_assoc()): ?>
    <tr class='bg-white align-middle border-5 border-light' class='text-secondary'>
     
    <td class='py-3'> <?php echo $course ['Title']?></td>
       <td class='py-3'> <?php echo $course['description']?></td>
       <td class='py-3'> <?php echo $course ['Price']?></td>
       <td class=></td>
       <td class='py-3'>
       <a href="form-course.php?edit=<?php echo $course['id'];?>" type='button' class="btn  btn-sm">
         <i class="fas fa-pen pe-2 text-info"></i>
       </a>
       </td>
       <td class="py-3">
       <a href="form-course.php?delete=<?php echo $course['id'];?>" type="button" class="btn  btn-sm">
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