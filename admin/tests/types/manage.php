<!-- Manage Test Type -->
<?php
require '../../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../../index.php');
      exit();
  }

  $GetTypes = mysqli_fetch_assoc($conn , "SELECT * FROM `tbltesttype`");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Test Type - Home</title>
</head>
<body>

</body>
</html>