<!-- Edit Test Type -->
<?php
require '../../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../../index.php');
      exit();
  }


  $TestTypeId = $_GET['Id'];
  $GetTestType = mysqli_fetch_assoc($conn , "SELECT * FROM tbltesttype WHERE Id = '$TestTypeId'");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Test Type - Home</title>
</head>
<body>

</body>
</html>