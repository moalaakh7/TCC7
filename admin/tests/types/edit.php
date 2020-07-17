<!-- Edit Test Type -->
<?php
require '../../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../../index.php');
      exit();
  }


  $TestTypeId = $_GET['id'];
  $GetTestType = mysqli_query($conn , "SELECT * FROM tbltesttype WHERE Id = '$TestTypeId'");
  if ($GetTestType) {
  	$GetTestTypeExcu = mysqli_fetch_assoc($GetTestType);
  }

  if (isset($_POST['btnedit'])) {
    $Type = $_POST['type'];
    if (isset($_POST['IsActive'])) {
       $IsActive = 0;
    }
    else{
        $IsActive = 1;
    }
    

    mysqli_query($conn, "UPDATE `tbltesttype` SET `Type`='$Type',`IsActive`='$IsActive'
                          WHERE Id = '$TestTypeId'");
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
	<title>Edit Test Type - Home</title>
</head>
<body class="container pt-5">
  
  <h1>Edit User</h1>
  <form method="post">
    <div class="form-group">
    <label for="exampleInputtype">Type Nem</label>
    <?php      
    echo ' <input type="text" name="type" value="'.$GetTestTypeExcu["Type"].'" class="form-control" id="exampleInputtype">';
    ?>
   
  </div>

  <div class="form-group form-check">
     <?php      
     if ($GetTestTypeExcu["IsActive"]) {
         echo '<input type="checkbox" name="IsActive" class="form-check-input" id="exampleCheck1">';
     }
     else{
          echo '<input type="checkbox" checked="" name="IsActive" class="form-check-input" id="exampleCheck1">';
     }

    ?>
    <label class="form-check-label" for="exampleCheck1">Deactive</label>
  </div>
  <button type="submit" name="btnedit" class="btn btn-primary">Edit</button>
</form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../../../content/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
  </body>
</html>