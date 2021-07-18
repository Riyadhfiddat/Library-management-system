<?php
require_once '../dbcon.php';
  if(isset($_GET['bookdelete'])){
      $id = base64_decode($_GET['bookdelete']);
      mysqli_query(mysqli_connect('localhost','root','','lms'),"DELETE FROM `books` WHERE `id`='$id'");
      header('location:Manages Books.php');
}
?>
