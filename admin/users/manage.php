<!-- Manage Users -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }

  $GetUsers = mysqli_fetch_assoc($conn , "SELECT tblusers.* , tbldepts.Dept FROM tblusers 
                                          INNER JOIN tbldepts ON tblusers.IdDept = tbldepts.Id;");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Users - Home</title>
</head>
<body>

</body>
</html>