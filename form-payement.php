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


  if(isset($_POST['add'])){
$Name=$_POST['Name'];
$payment_Sshedule=$_POST['payment_Sshedule'];
$Bill_Number=$_POST['Bill_Number'];
$Amount_Paid=$_POST['Amount_Paid'];
$Balance_amount=$_POST['Balance_amount'];
$Date=$_POST['Date'];


$query="INSERT INTO payements (Name,payment_Sshedule,Bill_Number,Amount_Paid,Balance_amount,Date) values('$Name','$payment_Sshedule','$Bill_Number' ,'$Amount_Paid','$Balance_amount','$Date') ";
 mysqli_query($connect,$query);
 header('location:payements.php');

}
// #delete delete data:

if (isset($_GET['delete'])){
  $id = $_GET['delete'] ?? "";
  echo $id;
  $connect->query("DELETE FROM  payements WHERE id = $id") or die ($connect->error);
  
  header('location:payements.php');

}

#edit selct data:
if (isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update= true;
  $payements =$connect->query("SELECT * FROM  payements  WHERE id = $id") or die ($connect->error);
  if($payements  -> num_rows> 0){
    $payements  = $payements-> fetch_array();
    $Name= $payements['Name'];
    $payment_Sshedule= $payements ['payment_Sshedule'];
    $Bill_Number= $payements ['Bill_Number'] ;
    $Amount_Paid= $payements['Amount_Paid'] ;
    $Balance_amount= $payements['Balance_amount'];
    $Date= $payements['Date'];
  }
}
if(isset($_POST['update']) && isset($_GET['edit'])){

  $id = $_GET['edit'];
  $Name=$_POST['Name'];
  $payment_Sshedulel=$_POST['payment_Sshedule'];
  $Bill_Number=$_POST['Bill_Number'];
  $Amount_Paid=$_POST['Amount_Paid']; 
  $Balance_amount=$_POST['Balance_amount']; 
  $Date=$_POST['Date']; 
  $connect->query("UPDATE  payements SET Name = '$Name', 
  payment_Sshedule= '$payment_Sshedule'
   ,Bill_Number= '$Bill_Number' 
   , Amount_Paid= '$Amount_Paid' ,
    Balance_amount= '$Balance_amount' ,
    Date= '$Date'  WHERE id ='$id'") or die ($connect->error);
  header('location: payements.php');
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
    //  include 'sidbar2.php';  
     ?>
<main class="container-fluid mt-0 mt-auto ">
        <div class=" cont row d-flex ">
            <div class=" d-flex justify-content-center align-item-center">
                <form action="" method="POST" class=" w-50">

                <h1 class="text-center text-secondary mt-3">payements informations :</h1>
                <h2 class="text-center text-primary">Saisissez les payements de l'apprenant</h2>
                     <div class="mb-2">
                      <label  class="form-label text-secondary">Name</label>
                      <input type="texte" class="form-control" name="Name" placeholder="name" value="<?php echo $Name ?>">
                    </div>
                     <div class="mb-2">
                      <label class="form-label text-secondary">payment_Sshedule</label>
                      <input type="number" class="form-control" name="payment_Sshedule" placeholder="" value="<?php echo $Amount_Paid ?>">
                    </div>
                    <div class="mb-2">
                    <label class="form-label text-secondary">Bill_Number</label>
                      <input type="number" value="<?php echo $Bill_Number ?>" class="form-control" name="Bill_Number" placeholder="Number">
                    </div>
                    <div class="mb-2">
                      <label  class="form-label text-secondary">Amount_Paid</label>
                      <input type="number" class="form-control"  name="Amount_Paid" placeholder="number" value="<?php echo $Amount_Paid ?>">
                    </div>
                    <div class="mb-4 mb-sm-2">
                      <label  class="form-label text-secondary" >Balance_amount</label>
                      <input type="numbre" class="form-control" name="Balance_amount" value="<?php echo $Balance_amount ?>">
                    </div>
                    <div class="mb-4 mb-sm-2">
                      <label  class="form-label text-secondary" >Date</label>
                      <input type="date" class="form-control" name="Date" value="<?php echo $Date ?>">
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