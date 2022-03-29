<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";
$update= false;

// Create connection
$connect = mysqli_connect($servername, $username, $password,$dbname) or die($connect->error);
echo 'connected';

  if(isset($_POST['submit'])){
  $Title=$_POST['Title'];
  $description=$_POST['description'];
  $Price=$_POST['Price'];

  $query=("INSERT INTO course(Title,description, Price) VALUES('$Title','$description','$Price' ) ");
  mysqli_query($connect,$query);
  header('location: course.php');
 
}
#delete data:

if (isset($_GET['delete'])){
  $id = $_GET['delete'] ?? "";
  echo $id;
  $connect->query("DELETE FROM  course WHERE id = $id") or die ($connect->error);
  
  header('location:course.php');

}

#edit selct data:
if (isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update= true;
  $course=$connect->query("SELECT * FROM course  WHERE id = $id") or die ($connect->error);
  if($course -> num_rows> 0){
    $courses = $course-> fetch_array();
    $Title = $courses ['Title'];
    $description= $courses['description'];
    $Price= $courses ['Price'] ;
   
}
if(isset($_POST['update']) && isset($_GET['edit'])){

  $id = $_GET['edit'];
  $Title=$_POST['Title'];
  $description=$_POST['description'];
  $Price=$_POST['Price'];
  $connect->query("UPDATE course SET Title = '$Title',description ='$description' ,Price = '$Price' WHERE id ='$id'") or die ($connect->error);
  header('location: course.php');
}
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
        <link rel="stylesheet"
            href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
    <body>
 
 
      <main class="container-fluid mt-0 mt-auto ">
              <div class=" cont row d-flex ">
                  <div class=" d-flex justify-content-center align-item-center">
                      <form action="" method="POST" class=" w-50">
                        <h1 class="text-center text-secondary mt-3">COURSE :</h1>
                        <h2 class="text-center text-primary">Saisissez les courses de l'apprenant</h2>
                            <div class="mb-2">
                                <div class="mb-2">
                                <label class="form-label text-secondary ">Title</label>
                                <input type="text" class="form-control " id=""  placeholder="Entre your Title" name="Title"  value="<?php echo $Title ?>"> 
                                </div>
                                <div class="mb-2">
                                  <label  class="form-label text-secondary">description </label>
                                  <input type="text" class="form-control"  name="description " value="<?php echo $description ?>">
                                </div>
                                <div class="mb-4 mb-sm-2">
                                  <label  class="form-label text-secondary" >Price</label>
                                  <input type="number" class="form-control" name="Price" value="<?php echo $Price ?>">
                                </div>
                              </div>
                        <?php 
                          if($update==true):
                        ?>
                        <button class="btn btn-info text-white w-100" type="submit" name="update" value="update">Update</button>
                        <?php 
                          else:
                        ?>
                        <button class="btn btn-info text-white w-100"type="submit" name="submit">submit</button>
                        <?php 
                          endif;
                        ?>
                      </form>
                  </div>
              </div>
      </main>
  </body>
</html>