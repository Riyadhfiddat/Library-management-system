<?php

 require_once 'header.php';

?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                        <div class="row">

                            <?php
                            $data = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `students` ");
                             $total = mysqli_num_rows($data);

                            ?>
                            <!--BOX Style 1-->
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-darker-1">
                                    <a href="Students.php">
                                        <div class="panel-content">
                                            <h1 class="title color-w"><i class="fa fa-users"></i><?=' '.$total?></h1>
                                            <h4 class="subtitle color-lighter-1">Total Students</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--BOX Style 1-->

                            <?php
                            $data = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `librarian` ");
                            $total = mysqli_num_rows($data);

                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                                    <a href="#">
                                        <div class="panel-content">
                                            <h1 class="title color-light-1"> <i class="fa fa-user"></i> <?=' '.$total?> </h1>
                                            <h4 class="subtitle">Librarian</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--BOX Style 1-->
                            <?php
                            $data = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `books` ");
                            $total = mysqli_num_rows($data);


                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                    <a href="Manages%20Books.php">
                                        <div class="panel-content">
                                            <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?=' '.$total?> </h1>
                                            <h4 class="subtitle color-darker-1">Books</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--BOX Style 1-->
                            <?php
                            $dataq = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT SUM(`book_qty`) as total FROM books ");
                            $total_qty = mysqli_fetch_assoc($dataq);

                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                                    <a href="Manages%20Books.php">
                                        <div class="panel-content">
                                            <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?=' '.$total_qty['total']?> </h1>
                                            <h4 class="subtitle color-darker-1">Total Book Quantity</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <?php
                            $dataq = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT SUM(`available_qty`) as total FROM books ");
                            $total_qty = mysqli_fetch_assoc($dataq);

                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                                    <a href="Manages%20Books.php">
                                        <div class="panel-content">
                                            <h1 class="title"> <?=' '.$total_qty['total']?> </h1>
                                            <h4 class="subtitle">Total Available Books</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php

require_once 'footer.php';
?>