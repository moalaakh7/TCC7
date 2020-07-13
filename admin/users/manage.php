<!-- Manage Users -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }
  
  $GetUsers = mysqli_query($conn , "SELECT tblusers.* , tbldepts.Dept FROM tblusers 
                                    INNER JOIN tbldepts ON tblusers.IdDept = tbldepts.Id;");
  

?>

<!DOCTYPE html>
<html>
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../content/css/bootstrap.min.css">
	<title>Manage Users - Home</title>
</head>
<body class="container pt-5">
	 <h1>Manage Users</h1>
	 <a href="add.php">Add User</a>

	 	<table id="tbldept" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Dept</th>
                <th style="color: red">Manage</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	while ($GetUsersExcu = mysqli_fetch_assoc($GetUsers)) {
        		if ($GetUsersExcu['IsBlocked'] == 1) {
        			echo "<tr><td style='background-color: red'>".$GetUsersExcu['Id']."</td>";
        		}
        		else{
        			echo "<tr><td>".$GetUsersExcu['Id']."</td>";
        		}
        		
        		echo "<td>".$GetUsersExcu['FirstName']."</td>";
        		echo "<td>".$GetUsersExcu['LastName']."</td>";
        		echo "<td>".$GetUsersExcu['Email']."</td>";
        		echo "<td>".$GetUsersExcu['Password']."</td>";
        		echo "<td>".$GetUsersExcu['Dept']."</td>";
        		echo "<td><a href='edit.php?id=".$GetUsersExcu['Id']."'>E</a>
        		          <a href='delete.php?id=".$GetUsersExcu['Id']."'>D</a></td><tr>";

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