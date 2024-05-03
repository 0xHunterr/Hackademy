<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>



            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Courses</span>
                </a>


                <ul aria-expanded="false">


                    <?php
                        foreach ($categories as $category) {
                        ?>
                    <li class="menu-item">
                        <a href="coursecategory.php?id=<?php echo $category['id'] ?>">
                            <div>
                                <?php echo $category['name'] ?>
                            </div>


                        </a>
                    </li>
                    <?php
                        }

                        ?>








                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">trainings</span>
                </a>


                <ul aria-expanded="false">
                <li><a href="usertrainings.php">show trainings</a></li>

                </ul>
            </li>








            <li class="nav-label">Extra</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-th-list"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                   
                    <li><a href="page-login.php">Login</a></li>

                </ul>
            </li>
        </ul>
    </div>
</div>