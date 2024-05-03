<?php
session_start();
if (!isset($_SESSION["userRole"])) {

  header("location: page-login.php ");
} else {
  if ($_SESSION["userRole"] != "Admin") {
    header("location: page-login.php ");
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="vendor/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
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
                                <h4>Events</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Events</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Events Management</a>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div id="calendar" class="app-fullcalendar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-intro-title">Calendar</h4>

                                    <div class="">
                                        <div id="external-events" class="my-3">
                                            <p>Drag and drop your event or click in the calendar</p>
                                            <div class="external-event" data-class="bg-primary"><i
                                                    class="fa fa-move"></i>New Theme Release</div>
                                            <div class="external-event" data-class="bg-success"><i
                                                    class="fa fa-move"></i>My Event
                                            </div>
                                            <div class="external-event" data-class="bg-warning"><i
                                                    class="fa fa-move"></i>Meet manager</div>
                                            <div class="external-event" data-class="bg-dark"><i
                                                    class="fa fa-move"></i>Create New theme</div>
                                        </div>
                                        <!-- checkbox -->
                                        <div class="checkbox custom-control checkbox-event custom-checkbox pt-3 pb-5">
                                            <input type="checkbox" class="custom-control-input" id="drop-remove">
                                            <label class="custom-control-label" for="drop-remove">Remove After
                                                Drop</label>
                                        </div>
                                        <a href="javascript:void()" data-toggle="modal" data-target="#add-category"
                                            class="btn btn-primary btn-event w-100">
                                            <span class="align-middle"><i class="ti-plus"></i></span> Create New
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- BEGIN MODAL -->
                        <div class="modal fade none-border" id="event-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><strong>Add New Event</strong></h4>
                                    </div>
                                    <div class="modal-body"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect"
                                            data-dismiss="modal">Close</button>
                                        <button type="button"
                                            class="btn btn-success save-event waves-effect waves-light">Create
                                            event</button>

                                        <button type="button"
                                            class="btn btn-danger delete-event waves-effect waves-light"
                                            data-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Add Category -->
                        <div class="modal fade none-border" id="add-category">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><strong>Add a category</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label">Category Name</label>
                                                    <input class="form-control form-white" placeholder="Enter name"
                                                        type="text" name="category-name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">Choose Category Color</label>
                                                    <select class="form-control form-white"
                                                        data-placeholder="Choose a color..." name="category-color">
                                                        <option value="success">Success</option>
                                                        <option value="danger">Danger</option>
                                                        <option value="info">Info</option>
                                                        <option value="pink">Pink</option>
                                                        <option value="primary">Primary</option>
                                                        <option value="warning">Warning</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect"
                                            data-dismiss="modal">Close</button>
                                        <button type="button"
                                            class="btn btn-danger waves-effect waves-light save-category"
                                            data-dismiss="modal">Save</button>
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
                    <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2020
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
    <!--removeIf(production)-->

    <!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="vendor/jqueryui/js/jquery-ui.min.js"></script>
    <script src="vendor/moment/moment.min.js"></script>

    <script src="vendor/fullcalendar/js/fullcalendar.min.js"></script>
    <script src="js/plugins-init/fullcalendar-init.js"></script>

</body>

</html>