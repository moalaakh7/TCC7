<!-- Edit Dept -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }


  $DeptId = $_GET['id'];
  $GetDept = mysqli_query($conn , "SELECT * FROM tbldepts WHERE Id = '$DeptId'");
  if ($GetDept) {
  	$GetDeptExcu = mysqli_fetch_assoc($GetDept);
  }

  if (isset($_POST['btnedit'])) {
    
    $Dept = $_POST['dept'];
  	mysqli_query($conn, "UPDATE tbldepts SET Dept = '$Dept' WHERE Id = '$DeptId' ");
  	 header('Location: '.'manage.php');
  	 exit();
  			
  }

?>

<!DOCTYPE html>
<html>
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../content/css/bootstrap.min.css">
	<title>Edit Depts - Home</title>
</head>
<body class="container pt-5">


<h1>Edit Dept</h1>
<form method="post">
	<div class="input-group mb-3">
	<?php
	   echo "<input type='text' name='dept' class='form-control' value='".$GetDeptExcu['Dept']."'  aria-describedby='button-addon2'>";
	  ?>
  
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="btnedit" id="button-addon2">Edit</button>
  </div>
</div>
</form>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../../content/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
  </body>
</html>