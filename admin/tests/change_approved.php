<!-- Delete Subject -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }

  $Test = $_GET['id'];

  $DeleteDept = mysqli_query($conn , "UPDATE tbltests SET `IsApproved` = IF (`IsApproved`, 0, 1) WHERE Id = '$Test'");
  header('Location: '.'manage.php');

?>