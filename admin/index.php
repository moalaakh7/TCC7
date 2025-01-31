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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../content/css/bootstrap.min.css">
	<title>Admin - Home</title>
</head>
<body class="container pt-5">
	<h1 class="center">Admin Options</h1>
	<div class="list-group">
  <a class="list-group-item list-group-item-action" href="depts/manage.php">Depts</a>
  <a class="list-group-item list-group-item-action" href="subjects/manage.php">Subjects</a>
  <a class="list-group-item list-group-item-action" href="tests/index.php">Tests</a>
  <a class="list-group-item list-group-item-action" href="users/manage.php">Users</a>
  <a class="list-group-item list-group-item-danger" href="../logout.php">LogOut</a>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../content/js/bootstrap.min.js"></script>
  </body>
</html>