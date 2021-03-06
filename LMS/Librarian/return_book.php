<?php

require_once 'header.php';
?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript: avoid(0)">Return Books</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Return Books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Student ID</th>
                            <th>Phone Number</th>
                            <th>Book Name</th>

                            <th>Book Issue Date</th>
                            <th>Return Book</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT issue_book.id, issue_book.book_id,issue_book.issue_date, students.first_name,students.last_name,students.student_id,students.phone_no,books.book_name,books.book_image FROM issue_book INNER JOIN students ON students.ID = issue_book.students_id INNER JOIN books ON books.id= issue_book.book_id
 WHERE issue_book.book_return_date =''");
                        while ($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?=ucwords( $row['first_name'] .' '.$row['last_name']) ?></td>
                                <td><?= $row['student_id'] ?></td>
                                <td><?= $row['phone_no'] ?></td>
                                <td><?= $row['book_name'] ?></td>
                                <td><?= $row['issue_date'] ?></td>
                                <td><a href="return_book.php? id= <?= $row['id'] ?>&bookid=<?= $row['book_id'] ?>"> Return Book</a></td>

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


<?php
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $bookid= $_GET['bookid'];
    $date = date('d-m-y');

    $result=mysqli_query(mysqli_connect('localhost','root','','lms'),"UPDATE `issue_book` SET `book_return_date`='$date' WHERE id='$id'");
    if($result){
        mysqli_query(mysqli_connect('localhost','root','','lms'),"UPDATE `books` SET `available_qty` = `available_qty`+1 WHERE `id`='$bookid'");
        ?>
        <script type="text/javascript">
            alert('Book Return Successfully');
            javascript:history.go(-1);
        </script>
<?php
    }
    else{
        ?>
        <script type="text/javascript">
            alert('Error');
        </script>
        <?php
    }
}
?>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php

require_once 'footer.php';
?>
