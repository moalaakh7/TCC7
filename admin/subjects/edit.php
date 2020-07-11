<!-- Edit Subject -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }


  $SubjectId = $_GET['Id'];
  $GetSubject = mysqli_fetch_assoc($conn , "SELECT * FROM tblsubjects WHERE Id = '$SubjectId'");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Subjects - Home</title>
</head>
<body>

</body>
</html>