<!-- Delete Dept -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }

  $DeptId = $_GET['id'];
  $DeleteDept = mysqli_query($conn , "DELETE FROM `tbldepts` WHERE Id = '$DeptId'");
  header('Location: '.'manage.php');

?>