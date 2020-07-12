<!-- Edit Subject -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }


  $SubjectId = $_GET['id'];
  $GetDepts = mysqli_query($conn , "SELECT * FROM tbldepts");
  $GetSubject = mysqli_query($conn , "SELECT * FROM tblsubjects WHERE Id = '$SubjectId'");
  if ($GetSubject) {
  	 $GetSubjectExcu = mysqli_fetch_assoc($GetSubject);
  }

  if (isset($_POST['btnedit'])) {
    
    $Dept = $_POST['dept'];
    $Subject = $_POST['subject'];
  	mysqli_query($conn, "UPDATE `tblsubjects` SET `Subject`='$Subject',`IdDept`='$Dept' WHERE Id = '$SubjectId'  ");
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
	<title>Edit Subject - Home</title>
</head>
<body class="container pt-5">


<h1>Edit Subject</h1>
    <form method="post">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Select Dept</label>
    <select class="form-control" name="dept" id="exampleFormControlSelect1">
    <?php 
    while ($GetDeptsExcu = mysqli_fetch_assoc($GetDepts)) {
    	if ($GetDeptsExcu['Id'] == $GetSubjectExcu['IdDept']) {
    		echo "<option selected='' value='".$GetDeptsExcu['Id']."'>".$GetDeptsExcu['Dept']."</option>";
    	}
    	else{
    		echo "<option value='".$GetDeptsExcu['Id']."'>".$GetDeptsExcu['Dept']."</option>";
    	}
    	
    }

    ?>
    </select>
  </div>
	<div class="input-group mb-3">
		<?php 
		echo "<input type='text' name='subject' class='form-control' value='".$GetSubjectExcu['Subject']."'>";

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