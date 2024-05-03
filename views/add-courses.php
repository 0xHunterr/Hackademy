<?php

require_once("../controllers/coursecontroller.php");
require_once("../models/course.php");


session_start();
if (!isset($_SESSION["userRole"])) {

  header("location: page-login.php ");
} else {
  if ($_SESSION["userRole"] != "Admin") {
    header("location: page-login.php ");
  }
}

$errmsg="";

$coursecontroller = new coursecontroller;

$categories = $coursecontroller->getcategories() ;



//&&isset($_FILES["image"])
if(isset($_POST['name']) && isset($_POST['desc'])   )
{
        if(!empty($_POST['name'])&& !empty($_POST['desc']))
        {  
            
            $course = new course;
            $course->name = $_POST['name'];
            $course->description = $_POST['desc'];
            $course->coursecategoryid = $_POST['category'];


            $location = "images/courses/".date("h-i-s").$_FILES["image"]["name"];

            if(move_uploaded_file($_FILES["image"]["tmp_name"] ,$location))
            {
                $course->image = $location;
                
                if($coursecontroller->addcourse($course))
                {
                    header("location: all-courses.php");
                }
                else
                {
                    $errmsg="something went wrong..... Try Agian Later";
                }
            }
            
            else
            {
                $errmsg = "error in upload";
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
                            <h4>Add Course</h4>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Courses Details</h4>
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
                                <form action="add-courses.php" method="POST" enctype='multipart/form-data'>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Course Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Course Details</label>
                                                <textarea class="form-control" rows="3" name="desc"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <select name="category" id="largeSelect"
                                                    class="form-select form-select-lg">

                                                    <?php
                                                    foreach($categories as $category)
                                                    {
                                                        ?>

                                                    <option value=" <?php echo $category["id"] ?> ">
                                                        <?php echo $category["name"] ?></option>

                                                    <?php
                                                       
                                                    }
                                                
                                                ?>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group fallback w-100">
                                                <label class="form-label d-block">Course Photo</label>
                                                <input type="file" class="dropify" name="image">
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

    <!-- pickdate -->
    <script src="vendor/pickadate/picker.js"></script>
    <script src="vendor/pickadate/picker.time.js"></script>
    <script src="vendor/pickadate/picker.date.js"></script>

    <!-- Pickdate -->
    <script src="js/plugins-init/pickadate-init.js"></script>

</body>

</html>