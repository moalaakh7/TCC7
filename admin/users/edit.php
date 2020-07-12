<!-- Edit User -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }


  $UserId = $_GET['id'];
  $GetUser = mysqli_query($conn , "SELECT tblusers.* , tbldepts.Dept FROM tblusers 
                                          INNER JOIN tbldepts ON tblusers.IdDept = tbldepts.Id
                                          WHERE Id = '$UserId'");
  if ($GetUser) {
       $GetUserExcu = mysqli_fetch_assoc($GetUser);
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
	<title>Edit User - Home</title>
</head>
<body class="container pt-5">
  
  <h1>Edit User</h1>
  <form method="post">
    <div class="form-group">
    <label for="exampleInputfname">First Name</label>
    <input type="text" name="fname" class="form-control" id="exampleInputfname">
  </div>
  <div class="form-group">
    <label for="exampleInputlname">Last Name</label>
    <input type="text" name="lname" class="form-control" id="exampleInputlname">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="isBlock" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Block User</label>
  </div>
  <button type="submit" name="btnedit" class="btn btn-primary">Submit</button>
</form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../../content/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
  </body>
</html>