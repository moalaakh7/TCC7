<!-- Edit Dept -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }


  $DeptId = $_GET['Id'];
  $GetDept = mysqli_fetch_assoc($conn , "SELECT * FROM tbldepts WHERE Id = '$DeptId'");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Depts - Home</title>
</head>
<body>

</body>
</html>