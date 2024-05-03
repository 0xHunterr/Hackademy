<?php

    require_once("../models/training.php");
    require_once("../controllers/trainingcontroller.php");


    $trainingcontroller = new trainingcontroller; 
    $trainings = $trainingcontroller->getall_trainings();

    $deletemsg= false;

    session_start();
if (!isset($_SESSION["userRole"])) {

  header("location: page-login.php ");
} else {
  if ($_SESSION["userRole"] != "Admin") {
    header("location: page-login.php ");
  }
}

if( isset($_POST["delete"]) )
{
    if(!empty($_POST["traingingId"]))
    {
        if($trainingcontroller->delete_training($_POST["traingingId"]))
        {
            $deletemsg = true;
            $traingings = $trainingcontroller->getall_trainings();
        }
    }
}



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
                            <h4>All trainings</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">trainings</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">All trainings</a></li>
                        </ol>
                    </div>
                </div>


                <?php
                    
                    if(count($trainings)==0)
                    {
                        ?>
                <div class="alert alert-warning"><strong>No trainings Avalible</strong></div>



                <?php
                    }
                    else
                    {

                        ?>
                <div class="row">
                    <?php
                        foreach($trainings as $training) //the problem
                        {
                           ?>

                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="card">
            
                            <div class="card-body">
                                <h4> <?php echo $training["name"]  ?> </h4>
                                <ul class="list-group mb-3 list-group-flush">

                                    <li class="list-group-item px-0 d-flex justify-content-between">
                                        <span><i
                                                class="fa fa-graduation-cap text-primary mr-2"></i><strong>Description</strong></span>

                                    </li>
                                    <div>
                                        <?php echo $training["description"]  ?>
                                    </div>


                                </ul>
                                <div>
                                    <form action="all-trainings.php" method="POST">
                                        <input name="traingingId" type="hidden" value=" <?php echo $training["id"]?> ">
                                        <button type="submit" name="delete" class="btn btn-outline-danger">
                                            <span class="tf-icons bx bx-trash"></span>
                                            Delete
                                        </button>
                                    </form>

                                </div>
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


                <?php
            if ($deletemsg == true) {
            ?>
                <div data-delay="2000"
                    class="bs-toast toast  fade toast-placement-ex top-0 start-50 translate-middle-x show bg-info"
                    role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="bx bx-trash me-2"></i>
                        <div class="me-auto fw-semibold">Deleted Succesfully</div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
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