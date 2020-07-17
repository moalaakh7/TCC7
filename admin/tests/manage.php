<!-- Manage Subjects -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }
  
  $GetTest = mysqli_query($conn , "SELECT tbltests.* , tblusers.* , tblsubjects.* , tbldepts.* , tbltesttype.* from                               tbltests
                                   INNER JOIN tblusers on tblusers.Id = tbltests.IdUser
                                   INNER JOIN tblsubjects on tblsubjects.id = tbltests.IdSubject
                                   INNER JOIN tbldepts on tblsubjects.IdDept = tbldepts.Id
                                   INNER JOIN tbltesttype on tbltesttype.id = tbltests.testtypeId");

  if (isset($_POST['btnadd'])) {
    
    $Dept = $_POST['dept'];
    $Subject = $_POST['subject'];
  	mysqli_query($conn, "INSERT INTO `tblsubjects`(`Subject`, `IdDept`) VALUES ('$Subject','$Dept')");
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
	<title>Manage Test - Home</title>
</head>
<body class="container pt-5">
    <h1>Manage Tests</h1>

  <a href="add.php">Add New Test</a>
	<table id="tbldept" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th>Id</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Dept</th>
                <th>Type</th>
                <th>Mark</th>
                <th>Add Date</th>
                <th style="color: red">Manage</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	while ($GetTestExcu = mysqli_fetch_assoc($GetTest)) {
            if ($GetTestExcu['IsApproved']) {
                echo "<tr><td>".$GetTestExcu['Id']."</td>";
            }
            else{
              echo "<tr><td style='background-color: red'>".$GetTestExcu['Id']."</td>";
            }
        		echo "<td>".$GetTestExcu['FirstName'].' '. $GetTestExcu['LastName']."</td>";
        		echo "<td>".$GetTestExcu['Subject']."</td>";
            echo "<td>".$GetTestExcu['Dept']."</td>";
            echo "<td>".$GetTestExcu['Type']."</td>";
            echo "<td>".$GetTestExcu['Mark']."</td>";
            echo "<td>".$GetTestExcu['AddDate']."</td>";
            if ($GetTestExcu['IsApproved']) {
               echo "<td><a href='change_approved.php?id=".$GetTestExcu['Id']."'>Deactive</a></td><tr>";
            }
            else{
               echo "<td><a href='change_approved.php?id=".$GetTestExcu['Id']."'>Active</a></td><tr>";
            }
        		

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