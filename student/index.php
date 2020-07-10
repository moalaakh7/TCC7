<!-- Student Options -->
<?php
require '../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '3' || $_SESSION['IdDept'] <> '4' || $_SESSION['IdDept'] <> '5' )
  {
      header('Location: '.'../index.php');
  }
    
  }

  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Student - Home</title>
</head>
<body>

</body>