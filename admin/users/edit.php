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
                                   WHERE tblusers.Id = '$UserId'");
  if ($GetUser) {
       $GetUserExcu = mysqli_fetch_assoc($GetUser);
  }

  if (isset($_POST['btnedit'])) {
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    if (isset($_POST['IsBlocked'])) {
       $IsBlocked = 1;
    }
    else{
        $IsBlocked = 0;
    }
    

    mysqli_query($conn, "UPDATE `tblusers` SET `FirstName`='$Fname',`LastName`='$Lname', `Email`='$Email',
                         `Password`='$Password', `IsBlocked` = '$IsBlocked'
                          WHERE Id = '$UserId'");
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
    <?php      
    echo ' <input type="text" name="fname" value="'.$GetUserExcu["FirstName"].'" class="form-control" id="exampleInputfname">';
    ?>
   
  </div>
  <div class="form-group">
    <label for="exampleInputlname">Last Name</label>
     <?php      
    echo ' <input type="text" name="lname" value="'.$GetUserExcu["LastName"].'" class="form-control" id="exampleInputlname">';
    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
     <?php      
    echo ' <input type="email" name="email" value="'.$GetUserExcu["Email"].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">';

    ?>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
     <?php      
    echo ' <input type="text" name="password" value="'.$GetUserExcu["Password"].'" class="form-control" id="exampleInputPassword1">';

    ?>
  </div>

  <div class="form-group form-check">
     <?php      
     if ($GetUserExcu["IsBlocked"] == 0) {
         echo '<input type="checkbox" name="IsBlocked" class="form-check-input" id="exampleCheck1">';
     }
     else{
          echo '<input type="checkbox" checked="" name="IsBlocked" class="form-check-input" id="exampleCheck1">';
     }
  

    ?>
    <label class="form-check-label" for="exampleCheck1">Block User</label>
  </div>
  <button type="submit" name="btnedit" class="btn btn-primary">Edit</button>
</form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../../content/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
  </body>
</html>