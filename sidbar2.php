

<div class="row flex fixed-top ">
<div
    class="col-auto col-md-3 col-xl-2  col-lg-2 px-sm-2 px-0 nav__bar position-fexsed position-absolute top-0 start-0">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">

   
        <h3 class="border-start border-info border-5 fw-bold  chadow fs-5 text-dark fs-3"> E-classe </h3>
        <div class="Admin rounded-circle text-center ">
            <img class="logo rounded-circle mt-4" src="image project classe.png" alt="logo">

            <h1 class="fs-4 fw-bold mb-1 text-center text-dark   d-none d-sm-block "> 
                    <?php  echo $_SESSION['USERNAME'];  ?> </h1>
                <p class="fs-5 f text-center text-info  d-none d-sm-block">Admin</p>
        </div>

        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start  List " >
           <li class= "form">
            <a href="index.php" class="nav-link align-middle px-0  <?php if( basename($_SERVER['REQUEST_URI'])=="index.php"){ echo "bg-info";}else{echo"bg-transparent";};?>">
                <i class="fas fa-home text-dark"></i>
                <span class="ms-1 d-none d-sm-inline text-dark">Home</span>
            </a>
            </li>
            <li class="form">
                <a href="course.php" class="nav-link align-middle px-0 ">
                    <i class="far fa-bookmark text-dark"></i>
                    <span class="ms-1 d-none d-sm-inline text-dark ">Course</span>
                </a>
            </li>
            <li class="form  ">
                <a href="students.php" class="nav-link align-middle px-0  <?php if( basename($_SERVER['REQUEST_URI'])=="students.php"){ echo "bg-info";}else{echo"bg-transparent";};?> ">
                    <i class="fas fa-graduation-cap text-dark"></i>
                    <span class="ms-1 d-none d-sm-inline text-dark ">Students</span>
                </a>
            </li>
            <li class="form  ">
                <a href="payements.php" class="nav-link align-middle px-0  <?php if( basename($_SERVER['REQUEST_URI'])=="payements.php"){ echo "bg-info";}else{echo"bg-transparent";};?>">
                    <i class="fas fa-dollar-sign text-dark"></i>
                    <span class="ms-1 d-none d-sm-inline text-dark ">Payment</span>
                </a>
            </li>
            <li class="form">
                <a href="#" class="nav-link align-middle px-0 ">
                    <img src="file-earmark-bar-graph (1).svg" alt="econs">
                    <span class="ms-1 d-none d-sm-inline text-dark ">Report</span>
                </a>
            </li>
            <li class="form  ">
                <a href="#" class="nav-link align-middle px-0 ">
                    <i class="fas fa-sliders-h text-dark"></i>
                    <span class="ms-1 d-none d-sm-inline text-dark ">Setting</span>
                </a>
            </li>
        </ul>

        <div class="logout">
            <a href="logout.php" class="nav-link align-middle px-0 mt-5 ps-3  ">
                <span class="ms-1 d-none d-sm-inline text-dark fs-5">Logout </span> <i
                    class="fas fa-sign-out-alt text-dark"></i>
            </a>
        </div>

    </div>
</div>


</div>


