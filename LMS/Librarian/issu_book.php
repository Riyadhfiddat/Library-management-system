<?php

require_once 'header.php';

if(isset($_POST['issue_book'])){
    $students_id= $_POST['students_id'];
    $book_id=$_POST['book_id'];
    $issue_date=$_POST['issue_date'];
    $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"INSERT INTO `issue_book`( `students_id`, `book_id`, `issue_date`) VALUES ('$students_id','$book_id','$issue_date')");

if($result){
    mysqli_query(mysqli_connect('localhost','root','','lms'),"UPDATE `books` SET`available_qty` = `available_qty`-1 WHERE `id`='$book_id'");
?>
    <script type="text/javascript">
        alert('Book Issued Successfully');
    </script>
<?php
}

else{

    ?>
    <script type="text/javascript">
        alert('Book  Not Issue');
    </script>
    <?php
}

}

?>

<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript: avoid(0)">Issue Book</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline" method="post" action="">
                            <div class="form-group">


                                <select class="form-control" name="students_id">
                                    <option value="">Selection</option>
                                    <?php
                                    $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `students`where `status`='1'");
                                    while ($row = mysqli_fetch_assoc($result))
                                    {?>
                                    <option value="<?=$row['id'] ?>"><?=ucwords($row['first_name'].' '.$row['last_name']).'  - '.$row['student_id'] ?></option>

                                     <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <button name="search" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if(isset($_POST['search'])){
                 $id= $_POST['students_id'];
                    $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `students`where id ='$id' and `status`='1'");
                    $row = mysqli_fetch_assoc($result);
                   ?>
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">Students Name</label>
                                        <input type="text" class="form-control" id="name" value="<?=ucwords($row['first_name'].' '.$row['last_name'])?>" readonly>
                                        <input type="hidden"value="<?= $row['id']?>" name="students_id">
                                    </div>
                                    <div class="form-group">
                                        <label>Book Name</label>
                                        <select class="form-control" name="book_id">
                                            <option value="">Selection</option>
                                            <?php
                                            $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `books` WHERE `available_qty`> 0");
                                            while ($row = mysqli_fetch_assoc($result))
                                            {?>
                                                <option value="<?=$row['id'] ?>"><?=$row['book_name'] ?></option>

                                                <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label>Book Issue Date</label>
                                        <input class="form-control"  name="issue_date" type="text" value="<?=date('d-m-y') ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="issue_book" class="btn btn-primary">Save Issue Book</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php

require_once 'footer.php';
?>
