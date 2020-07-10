<!-- Delete User -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }

  $UserId = $_GET['id'];
  $DeleteUser = mysqli_query($conn , "DELETE FROM `tblusers` WHERE Id = '$UserId'");
  header('Location: '.'manage.php');

?>