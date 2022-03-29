<?PHP session_start();
if (isset($_SESSION['USERNAME'])) {
    header("location:dashboard.php");
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_classe_db";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>LEARNING APPLICATION</title>
</head>

<body class="SINGN-IN">
    <section class="h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h3 class="border-start border-info border-5 fw-bold chadow m-3">
                            E-classe
                        </h3>

                        <div class="text-center">
                            <h3 class="my-3 ms-5 ps-2">SINGN IN</h3>
                            <p class="text-muted ms-lg-5 fs-14">
                                <span>Enter your credentials to access your account</span>
                            </p>
                        </div>

                        <?php
                        if (isset($_SESSION['message_error'])) {

                            echo "<div class='alert alert-danger' role='alert'>";
                            echo  $_SESSION["message_error"];
                            echo "</div>";
                            $_SESSION["message_error"] = null;
                        }

                        ?>
                        <form class="" method="POST" action="fonction_sign-in.php" onsubmit="return validation()">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input class="form-control text-muted shadow-none" id="exampleInputEmail1" value="<?php echo $_COOKIE['Email'] ?? ""; ?>" type="Email" name="Email" placeholder="Entrer your Address " />
                                <div class="invalid-feedback">Email is invalid</div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input class="form-control text-muted shadow-none" value="<?php echo $_COOKIE['Password'] ?? ""; ?>" type="Password" id="exampleInputPassword1" name="Password" placeholder="Entrer your Password  " />
                            </div>

                            <div class="col-md-12 mt-4 d-grid gap-2">
                                <button type="submit" class="btn btn-primary" name="login">SIGN IN</button>
                            </div>
                            <div class="form-check form-switch ms-2 mb-2">
                                <input name="remember" class="form-check-input" type="checkbox">
                                <label class="form-check-label" for="box">Remember me</label>
                            </div>

                            <div class="mt-3 text-center">
                                <span class="text-muted">
                                    don't have account
                                </span>
                                <a class="text-info text-decoration-underline" href="sign-uuuuuuuuup.php"> <span>Register</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>