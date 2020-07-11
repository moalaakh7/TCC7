<!-- LogIn Page -->
<?php
require 'DBcon.php';
session_start();
  if(!empty($_SESSION['UserId']))
  {
  	$UserId = $_SESSION['UserId'];
  	$GetUserDeptExcute = mysqli_fetch_assoc($conn , "SELECT tblusers.Id, tbldepts.Dept FROM tblusers
                                                     INNER JOIN tbldepts ON tblusers.IdDept = tbldepts.Id
                                                     WHERE tblusers.Id = '$UserId'");
  	$Dept =$GetUserDeptExcute['Dept'];
  	if ($Dept == 'Admin') {
  		header('Location: '.'admin/index.php');
  	}
  	elseif ($Dept == 'Teacher') {
  		header('Location: '.'teacher/index.php');
  	}
  	else {
  		header('Location: '.'student/index.php');
  	}
    
  }

if(isset($_POST['btnlogin']))
{
	   $Email    = $_POST['email'];
     $Password = $_POST['password'];

     $CheckUser = mysqli_query($conn, "SELECT * FROM tblusers WHERE Email='$Email' and Password='$Password'
                                       And IsBlocked = 0")
                 or die(mysqli_error($conn));
     $count = mysqli_num_rows($CheckUser);

     if($count == 1){
         $GetUser      = mysqli_fetch_assoc($CheckUser);
             
         $_SESSION['UserId'] = $GetUser['Id'];
         $_SESSION['Full Name']  =    $GetUser['FirstName'].' '.$GetUser['LastName'];
         $_SESSION['Email'] =  $Email;
         $_SESSION['IdDept'] = $GetUser['IdDept'];
         
         $UserId = $_SESSION['UserId'];
         $Agent = $_SERVER['HTTP_USER_AGENT'];
         $Ip = $_SERVER['REMOTE_ADDR'];
         $SetLog = mysqli_query($conn , "INSERT INTO `tblclient`(`IdUser`, `Agent`, `Ip`) VALUES ('$UserId',
         	'$Agent','$Ip'");

         header('Location: '.'index.php');
     
      }
      else
      {
        exit("<script>if(!alert('Email or password error')) document.location = 'http://localhost/tcc/tcc/';</script>");
      }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="content/css/bootstrap.min.css">

    <title>Tcc - Home</title>
  </head>
  <body>

    <form method="post" class="container pt-5">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="btnlogin" class="btn" style="background-color: purple">Log in</button>
</form>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="content/js/bootstrap.min.js"></script>
  </body>
</html>