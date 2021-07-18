<?php

 require_once 'header.php';
?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
<?php

?>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>All Books</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class=" table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Book issue Date</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $student_id=$_SESSION['student_id'];
                           $result= mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT issue_book.issue_date, books.book_name,books.book_image FROM books INNER JOIN issue_book ON issue_book.book_id = books.id
WHERE issue_book.students_id= '$student_id'");
                            while ($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td><?= $row['book_name']?></td>
                                    <td><img width="70px" src="../images/Books/<?= $row['book_image']?>"></td>
                                    <td><?= $row['issue_date']?></td>
                                </tr>
                               <?php
                            }
                            ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php

require_once 'footer.php';
?>