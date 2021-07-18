<?php

require_once 'header.php';
if(isset($_GET['updateprofile'])) {
    $id = base64_decode($_GET['updateprofile']);

}
?>


    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><a href="#">Profile Update</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php
$result = mysqli_query(mysqli_connect('localhost','root','','lms'),"Select * FROM `students` WHERE `id`='$id'");
$row= mysqli_fetch_assoc($result);


?>
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Profile</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="modal-body">
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name"

                                                       value="<?= $row['first_name'] ?>" required>
                                                <br>
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                       value="<?= $row['last_name'] ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="student_id">Student ID</label>
                                                <input type="text" class="form-control" id="student_id"
                                                       name="student_id"
                                                       value="<?= $row['student_id'] ?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label for="department"> Department</label>
                                                <input type="text" class="form-control" id="department"
                                                       name="department"
                                                       value="<?= $row['department'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email"
                                                       name="email"
                                                       value="<?= $row['email'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_name">User Name</label>
                                                <input type="text" class="form-control" id="user_name"
                                                       name="user_name"
                                                       value="<?= $row['user_name'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_no">Phone Number</label>
                                                <input type="phone" class="form-control" id="phone_no" name="phone_no"
                                                       value="<?= $row['phone_no'] ?>" required>
                                            </div>


                                            <br>
                                            <div class="form-group">
                                                <button type="submit" name="update-profile" class="btn btn-primary">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php

if(isset($_POST['update-profile'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $student_id = $_POST['student_id'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $phone_no = $_POST['phone_no'];
    $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'lms'), "UPDATE `students` SET `first_name`= '$first_name',`last_name`= '$last_name',`student_id`='$last_name',`department`='$department',`email`='$email',`user_name`='$user_name',`phone_no`='$phone_no' WHERE `id`='$id'");
    if ($result) {
        ?>
        <script type="text/javascript">
            alert('Profile Update Successfully');
            javascript:history.go(-1);
        </script>
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
            alert(' Update Error');
        </script>
        <?php
    }


}



require_once 'footer.php';
?>