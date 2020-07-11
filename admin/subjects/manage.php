<!-- Manage Subjects -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }

  $GetSubjects = mysqli_fetch_assoc($conn , "SELECT tblsubjects.* , tbldepts.Dept from tblsubjects
                                          INNER JOIN tbldepts on tblsubjects.IdDept = tbldepts.Id");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Subjects - Home</title>
</head>
<body>

</body>
</html>