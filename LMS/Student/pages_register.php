<?php
require_once '../dbcon.php';
session_start();
if(isset($_SESSION['student login'])){
    header('location:index.php');
}

if(isset($_POST['student_register'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $student_id = $_POST['student_id'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $phone_no = $_POST['phone_no'];

    $inpur_errors = array();


    if(empty($first_name)){
        $inpur_errors ['first_name'] ="First name Field is required";

    }
    if(empty($last_name)){
        $inpur_errors ['last_name'] ="Last name Field is required";

    }
    if(empty($student_id)){
        $inpur_errors ['student_id'] ="Student id Field is required";

    }
    if(empty($department)){
        $inpur_errors ['department'] ="Department  Field is required";

    }
    if(empty($email)){
        $inpur_errors ['email'] ="Email Field is required";

    }
    if(empty($user_name)){
        $inpur_errors ['user_name'] ="User name Field is required";

    }
    if(empty($password)){
        $inpur_errors ['password'] ="Password Field is required";

    }

    if(empty($phone_no)){
        $inpur_errors ['phone_no'] ="Phone Number Field is required";
    }
if(count ($inpur_errors) == 0){

    $email_check =  mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `students` WHERE `email`='$email'");
    $email_check_row =mysqli_num_rows($email_check);

    if ($email_check_row == 0){
        $user_check =  mysqli_query(mysqli_connect('localhost','root','','lms'),"SELECT * FROM `students` WHERE `user_name`='$user_name'");
        $user_check_row =mysqli_num_rows($user_check);
        if ($user_check_row == 0){
            if (strlen($user_name)>4){
                if (strlen($password)>=6){
                    $password_hash = password_hash($password,PASSWORD_DEFAULT);
                    $result = mysqli_query(mysqli_connect('localhost','root','','lms'),"INSERT INTO `students`( `first_name`, `last_name`, `student_id`, `department`, `email`, `user_name`, `password`,`status`, `phone_no`) VALUES ( '$first_name','$last_name','$student_id','$department','$email','$user_name','$password_hash','0','$phone_no')");
                    if($result){
                        $success ="Registration is  Successful  ";
                    }
                    else {
                        $error ="Something Wrong";
                    }
                }
                else {
                    $password_exists =" Password more then 5 characters";
                }
            }
            else {
                $user_exists =" Username more then 5 characters";
            }
        }
        else {
            $user_exists =" This Username Already Exists";
        }

    }
    else {
        $email_exists =" This Email Already Exists";
    }

}

}

?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Students Registration</title>

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <div class="">
              <h3 class="text-center">Students Registration</h3>
                <?php
                if (isset($success)){
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?= $success ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>
                <?php
                if (isset($error)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($email_exists)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $email_exists ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($user_exists)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $user_exists ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($password_exists)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $password_exists ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>


            </div>
        </div>

        <div class="box">
            <!--SIGN IN FOM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="First Name" name="first_name" value="<?=isset($first_name) ? $first_name: '' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                             if (isset($inpur_errors ['first_name'])){
                                 echo '<span class="input-error">' .$inpur_errors ['first_name'].'</span>';

                             }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Last Name" name="last_name"value="<?=isset($last_name) ? $last_name: '' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($inpur_errors ['last_name'])){
                                echo '<span class="input-error">' .$inpur_errors ['last_name'].'</span>';

                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Student ID" name="student_id" value="<?=isset($student_id) ? $student_id: '' ?>">
                                <i class="fa fa-pencil"></i>
                            </span>
                            <?php
                            if (isset($inpur_errors ['student_id'])){
                                echo '<span class="input-error">' .$inpur_errors ['student_id'].'</span>';

                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Department" name="department" value="<?=isset($department) ? $department: '' ?>">
                                <i class="fa fa-paint-brush"></i>
                            </span>
                            <?php
                            if (isset($inpur_errors ['department'])){
                                echo '<span class="input-error">' .$inpur_errors ['department'].'</span>';

                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control"  placeholder="Email" name="email" value="<?=isset($email) ? $email: '' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if (isset($inpur_errors ['email'])){
                                echo '<span class="input-error">' .$inpur_errors ['email'].'</span>';

                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="User Name" name="user_name" value="<?=isset($user_name) ? $user_name: '' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if (isset($inpur_errors ['user_name'])){
                                echo '<span class="input-error">' .$inpur_errors ['user_name'].'</span>';

                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control"  placeholder="Password" name="password" >
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                            if (isset($inpur_errors ['password'])){
                                echo '<span class="input-error">' .$inpur_errors ['password'].'</span>';

                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Phone Number"name="phone_no" pattern="01[3|5|6|7|8|9][0-9]{8}" value="<?=isset($phone_no) ? $phone_no: '' ?>">
                                <i class="fa fa-phone"></i>
                            </span>
                            <?php
                            if (isset($inpur_errors ['phone_no'])){
                                echo '<span class="input-error">' .$inpur_errors ['phone_no'].'</span>';

                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="student_register" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="pages_sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


</html>
