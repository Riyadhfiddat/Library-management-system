<?php
require_once '../dbcon.php';
$id= base64_decode($_GET['id']);

mysqli_query(mysqli_connect('localhost','root','','lms'), "UPDATE  `students` SET `status`='1' WHERE `id` = '$id'");
header('location:Students.php');

?>
