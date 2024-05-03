﻿<?php

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


$errmsg="";

$usercontroller = new usercontroller;

$useres = $usercontroller->getusers() ;
$roles = $usercontroller->getroles() ;




if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])  )
{
        if(!empty($_POST['name'])&& !empty($_POST['email']) && !empty($_POST['password']))
        {  
            
            $user = new user;
            $role = new role;
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->roleid = $_POST['roleId'];

            $role->roleid = $_POST['roleId'];
            $role->roleid = $_POST['roleId'];
            

           

          

            
             
                
                if($usercontroller->adduser($user))
                {
                    header("location: all-students.php");
                }
                else
                {
                    $errmsg="something went wrong..... Try Agian Later";
                }
           
            
        }
        else
        {
          $errmsg ="please fill all the fields";
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

    <!-- Pick date -->
    <link rel="stylesheet" href="vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">

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
                            <h4>Add User</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">User</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Add User</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Details</h4>
                                <?php
                                        if($errmsg!="")
                                        {
                                            ?>
                                <div class="alert alert-warning"><strong>Warning!</strong>
                                    <?php
                                            echo $errmsg; 
                                            ?>
                                </div>

                                <?php
                                        }
                                    
                                    ?>
                            </div>

                            <div class="card-body">
                                <form action="add-student.php" method="POST" enctype='multipart/form-data'>
                                    <div class="row" style="margin:20px;">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">User Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>



                                        <div class="row" style="margin:20px;">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">User email</label>
                                                    <input type="text" class="form-control" name="email">
                                                </div>
                                            </div>

                                            <br>
                                            <hr>

                                            <div class="row" style="margin:20px; width: 60%;">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">User password</label>
                                                        <input type="password" class="form-control" name="password">
                                                    </div>
                                                </div>

                                                <br>
                                                <hr>

                                                <div class="row" style="margin:20px;">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <select name="roleId" id="largeSelect"
                                                                class="form-select form-select-lg">

                                                                <?php
                                                    foreach($roles as $role)
                                                    {
                                                        ?>

                                                                <option value=" <?php echo $role["id"] ?> ">

                                                                    <?php echo $role["name"] ?></option>

                                                                <?php
                                                       
                                                    }
                                                
                                                ?>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>

                                                </div>
                                            </div>
                                </form>
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

    <!-- pickdate -->
    <script src="vendor/pickadate/picker.js"></script>
    <script src="vendor/pickadate/picker.time.js"></script>
    <script src="vendor/pickadate/picker.date.js"></script>

    <!-- Pickdate -->
    <script src="js/plugins-init/pickadate-init.js"></script>

</body>

</html>