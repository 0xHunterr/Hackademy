<?php

require_once("../controllers/usercontroller.php");

require_once("../models/user.php");
require_once("../models/role.php");


session_start();
if (!isset($_SESSION["userRole"])) {

  header("location: page-login.php ");
} else {
  if ($_SESSION["userRole"] != "Admin") {
    header("location: page-login.php ");
  }
}

$usercontroller = new usercontroller;

 
    $users = $usercontroller->getalluseres();
    //$roles = $usercontroller->getroles() ;
   

    $deletemsg= false;


    if( isset($_POST["delete"]) )
    {
        if(!empty($_POST["userId"]))
        {
            if($usercontroller->deleteuseres($_POST["userId"]))
            {
                $deletemsg = true;
                $users = $usercontroller->getalluseres();
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
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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

        <<!--********************************** Nav header start ***********************************-->
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
                                <h4>All Student</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">Students</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">All Student</a></li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="row tab-content">
                                <div id="list-view" class="tab-pane fade active show col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">All Users List </h4>
                                            <a href="add-student.php" class="btn btn-primary">+ Add new</a>
                                        </div>



                                        <?php
                                        
                                        if( count($users)==0 )
                                        {

                                            ?>
                                        <div class="alert alert-warning"><strong>No users Avalible</strong></div>
                                        <?php

                                        }
                                        else
                                        {
                                            ?>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example3" class="display" style="min-width: 845px">
                                                    <thead>
                                                        <tr>



                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Password</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                        <?php
                                                    
                                                        foreach($users as $user)
                                                        {
                                                            ?>
                                                        <tr>






                                                            <td><?php echo $user["name"] ?></td>

                                                            <td><?php echo $user["email"] ?></td>
                                                            <?php $hashedPassword = password_hash($user["password"],PASSWORD_DEFAULT) ;
                                                            
                                                            ?>

                                                            <td><?php echo $hashedPassword  ?>
                                                            </td>

                                                            <td>

                                                                <form action="all-students.php" method="POST">
                                                                    <input name="userId" type="hidden"
                                                                        value=" <?php echo $user["id"]?> ">
                                                                    <button type="submit" name="delete"
                                                                        class="btn btn-outline-danger">

                                                                        Delete
                                                                    </button>
                                                                </form>


                                                            </td>
                                                        </tr>

                                                        <?php
                                                        }
                                                    
                                                    ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <?php
                                        }
                                       
                                    
                                    
                                    ?>









                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

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
                    <p>Copyright © Designed &amp; Developed by <a href="../index.php" target="_blank">Out Team</a> 2022
                    </p>
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

    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

    <!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>

</html>