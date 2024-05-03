<?php

//require_once("models/course.php");
//require_once("controllers/coursecontroller.php");




session_start();
if (!isset($_SESSION["userRole"])) {

  header("location: page-login.php ");
} else {
  if ($_SESSION["userRole"] != "Admin") {
    header("location: page-login.php ");
  }
}


//$courses = $coursecontroller->getallcourses();















?>







<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="vendor/jqvmap/css/jqvmap.min.css">
    <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/skin-2.css">
    <style>
    .welcom {
        position: relative;
        left: 20%;
        background-color: #6673fd;
        border-radius: 20px;
        margin-top: 150px;
        padding: 100px;
        width: 50%;
        transform: translate(10%, 10%);
    }

    .welcom h2 {
        font-size: 2rem;


    }

    .welcom span {
        font-size: 2rem;
        color: white;
        text-transform: capitalize;

    }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php
       
        require_once("includes/navheader.php");
       ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
            
                ***********************************-->


        <?php

                require_once("includes/header.php");
            
            ?>



        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php

        require_once("includes/sidebar.php");
    ?>





        <div class="welcom">
            <h1>
                Hi Welcom Back <span> <?php echo $_SESSION["userName"] ?></span>

            </h1>
        </div>

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>

    <!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>

    <!-- Chart sparkline plugin files -->
    <script src="vendor/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Demo scripts -->
    <script src="js/dashboard/dashboard-3.js"></script>

    <!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>

</html>