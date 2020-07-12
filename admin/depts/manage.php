<!-- Manage Depts -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }
  
  $GetDepts = mysqli_query($conn , "SELECT * FROM `tbldepts`");

  if (isset($_POST['btnadd'])) {
    
    $Dept = $_POST['dept'];
  	mysqli_query($conn, "INSERT INTO tbldepts (`Dept`) VALUES ('$Dept')");
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
	<title>Manage Depts - Home</title>
</head>
<body class="container pt-5">
    <h1>Manage Depts</h1>

    <form method="post">
	<div class="input-group mb-3">
	   <input type='text' name='dept' class='form-control' aria-describedby='button-addon2' placeholder="Dept Name">
  
     <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="btnadd" id="button-addon2">Add New</button>
    </div>
    </div>
    </form>

	<table id="tbldept" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th style="color: red">Manage</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	while ($GetDeptsExcu = mysqli_fetch_assoc($GetDepts)) {
        		echo "<tr><td>".$GetDeptsExcu['Id']."</td>";
        		echo "<td>".$GetDeptsExcu['Dept']."</td>";
        		echo "<td><a href='edit.php?id=".$GetDeptsExcu['Id']."'>E</a>
        		          <a href='delete.php?id=".$GetDeptsExcu['Id']."'>D</a></td><tr>";

        	}


        	?>
        </tbody>
    </table>
    


    <script type="text/javascript">
    	$(document).ready(function() {
        $('#tbldept').DataTable();
        } );
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../../content/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
  </body>
</html>