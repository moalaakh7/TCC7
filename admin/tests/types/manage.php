<!-- Manage Test Type -->
<?php
require '../../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../../index.php');
      exit();
  }
  
  $GetTypes = mysqli_query($conn , "SELECT * FROM `tbltesttype`");

   if (isset($_POST['btnadd'])) {
    
    $Type = $_POST['type'];
  	mysqli_query($conn, "INSERT INTO `tbltesttype` (`Type`) VALUES ('$Type')");
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
    <link rel="stylesheet" href="../../../content/css/bootstrap.min.css">
	<title>Manage Test Type - Home</title>
</head>
<body class="container pt-5">
    <h1>Manage Test Types</h1>

    <form method="post">
	<div class="input-group mb-3">
	  <input type='text' name='type' class='form-control' placeholder="Type Name">
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
        	while ($GetTypesExcu = mysqli_fetch_assoc($GetTypes)) {
        		if ($GetTypesExcu['IsActive']) {
        			echo "<tr><td>".$GetTypesExcu['Id']."</td>";
        		}
        		else{
        			echo "<tr><td style='background-color: red'>".$GetTypesExcu['Id']."</td>";
        		}
        		
        		echo "<td>".$GetTypesExcu['Type']."</td>";
        		echo "<td><a href='edit.php?id=".$GetTypesExcu['Id']."'>E</a>
        		          <a href='delete.php?id=".$GetTypesExcu['Id']."'>D</a></td><tr>";

        	}


        	?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../../../content/js/bootstrap.min.js"></script>
  </body>
</html>