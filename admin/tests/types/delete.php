<!-- Delete Test Type -->
<?php
require '../../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../../index.php');
      exit();
  }

  $TestTypeId = $_GET['id'];
  $DeleteDept = mysqli_query($conn , "DELETE FROM `tbltesttype` WHERE Id = '$TestTypeId'");
  header('Location: '.'manage.php');

?>