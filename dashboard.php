
<?php
session_start();

if(!isset($_SESSION['USERNAME'])){
    header("location:index.php");
}

?>

<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";
// Create connection
$conn =mysqli_connect($servername, $username, $password,$dbname);

$studentsS=$conn->query("SELECT COUNT(id) As NumberStudent FROM students");
$student= $studentsS->fetch_array() ;
$student= $student[0];

$coursse=$conn->query("SELECT COUNT(id) As NumberCourses FROM course");
$courss= $coursse->fetch_array() ;
$courss= $courss[0];

$payements=$conn->query("SELECT SUM(Amount_Paid ) FROM payements");
$payements= $payements->fetch_array() ;
$payements= $payements[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dashbaord.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/3a3f417346.js" crossorigin="anonymous" defer></script>
    <title>dashboard</title>
    <style>
    .logoo {

        width: 140px;

    }

    .admin {
        transform: translateY(-31Px);
        margin-left: 44px;
    }
    .side-bar{
      height: 800px;
    }

    .Logout {
        transform: translateY(40Px);
        
    }

    .List_ {
        transform: translateY(30Px);
        margin-left: 30px;
        gap: 19px;

    }

    .List_ :hover {
        background-color: #00C1FE;
        border-radius: 5px;
    }

    .cards .carditems {
        border-radius: 8px;

        width: 200px;
        height: 150px;
    }

    .cards {

        position: absolute;
        top: 80px;
        left: 24%;
    }

    .carditems--blue {
        background-color: #F0F9FF;
    }

    .carditems--blue i {
        color: #74C1ED;
    }

    .carditems--rose {
        background-color: #FEF6FB;
    }

    .carditems--rose i {
        color: #EE95C5;
    }

    .carditems--yellow {
        background-color: #FEFBEC;
    }

    .carditems--yellow i {
        color: #00C1FE;
    }

    .carditems--gradient {
        background: linear-gradient(110.42deg, #00C1FE 18.27%, #FAFFC1 91.84%);
    }

    .card__items--gradient i {
        color: #FFFFFF;
    }

    #nbr {
        position: absolute;
        right: 10px;
        bottom: 10px;
    }



    .econs {
        width: 27px;
    }

    .econs2 {
        width: 27px;
    }

    .econsNav {
        margin-left: 300px;
    }

    .card_1 {
        position: absolute;
        width: 255px;
        height: 157px;
        left: 300px;
        top: 90px;

        background: #F0F9FF;
        border-radius: 8px;
    }


    @media screen and (min-width: 576px) {
        .side-bar {

            background-color: #FAFFC1;

        }


    }


    @media screen and (min-width: 984px) {
        .side-bar {

            background-color: #FAFFC1;

        }
    }
    </style>
</head>

<body>

    <main>

        <!-- NAVBAR -->
        <?php include 'nav.php';   ?>

        <!-- cart -->

        <?php include 'card.php';   ?>
        <!-- side-bar -->

        <?php include 'sid bare.php'; ?>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>


</html>