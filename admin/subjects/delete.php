<!-- Delete Subject -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }

  $SubjectId = $_GET['id'];
  $DeleteDept = mysqli_query($conn , "DELETE FROM `tblsubjects` WHERE Id = '$SubjectId'");
  header('Location: '.'manage.php');

?>