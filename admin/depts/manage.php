<!-- Manage Depts -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }

  $GetDepts = mysqli_fetch_assoc($conn , "SELECT * FROM `tbldepts`");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Depts - Home</title>
</head>
<body>

</body>
</html>