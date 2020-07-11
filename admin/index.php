<!-- Admin Options -->
<?php
require '../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../index.php');
  }
    
  

  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin - Home</title>
</head>
<body>

</body>
</html>