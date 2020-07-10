<!-- Teacher Options -->
<?php
require '../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '2')
  {
      header('Location: '.'../index.php');
  }
    
  }

  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher - Home</title>
</head>
<body>

</body>