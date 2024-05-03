<?php

require_once("../controllers/coursecontroller.php");
require_once("../models/course.php");



session_start();
if (!isset($_SESSION["userRole"])) {

  header("location: page-login.php ");
} else {
  if ($_SESSION["userRole"] != "User" && $_SESSION["userRole"] != "Admin") {
    header("location: page-login.php ");
  }
}


$errmsg="";


$coursecontroller = new coursecontroller;





if( isset($_GET["id"]) )
{   
    if(!empty($_GET["id"]))
    {
        $courses = $coursecontroller->getegorycourses($_GET["id"]);
    }
    else
    {
        header("location : user.php");
    }
}
else
{
    header("location : user.php");
}


$categories = $coursecontroller->getcategories() ;


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">

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
                require_once("requeires/navheader.php");
            ?>

        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php 
                require_once("requeires/header.php");
            ?>



        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
        require_once("requeires/sidebar.php");

            ?>
        <!--**********************************
            Sidebar end
        ***********************************-->




        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>All Courses</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="user.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Courses</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">All Courses</a></li>
                        </ol>
                    </div>
                </div>


                <?php
                    
                    if(count($courses)==0)
                    {
                        ?>
                <div class="alert alert-warning"><strong>No Courses Avalible</strong></div>



                <?php
                    }
                    else
                    {

                        ?>
                <div class="row">
                    <?php
                        foreach($courses as $course)
                        {
                           ?>

                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="card">
                            <img class="img-fluid" src=" <?php echo $course["image"]  ?>" alt="course image">
                            <div class="card-body">
                                <h4> <?php echo $course["name"]  ?> </h4>
                                <ul class="list-group mb-3 list-group-flush">

                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span><i
                                                class="fa fa-graduation-cap text-primary mr-2"></i><strong>Description</strong></span>

                                    </li>
                                    <div>
                                        <?php echo $course["description"]  ?>
                                    </div>


                                </ul>

                            </div>
                        </div>

                    </div>

                    <?php
                        }
                        ?>




                </div>

                <?php


                      
                    }
                    



            

            ?>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

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

    <!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>

</html>