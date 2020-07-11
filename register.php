<!-- Register Page -->
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

    if (isset($_POST['btnregister'])) {

       $Email    = $_POST['email'];
       $CheckEmail    = mysqli_query($conn,"SELECT Email FROM `tblusers` WHERE Email = '$Email'");
       if(mysqli_num_rows($CheckEmail)) {
        
        exit("<script>if(!alert('Email already in use')) document.location = 'http://localhost/tcc/tcc/register.php';</script>");
       }
       $FName    = $_POST['fname'];
       $LName    = $_POST['lname'];
       $Password    = $_POST['password'];
       $Dept    = $_POST['dept'];
       $Agent = $_SERVER['HTTP_USER_AGENT'];
       $Ip = $_SERVER['REMOTE_ADDR'];


       $RegisterUser = mysqli_query($conn , "INSERT INTO `tblusers`(`FirstName`, `LastName`, `Email`, `Password`, `IdDept`) 
                                             VALUES ('$FName' , '$LName' ,'$Email' , '$Password' , '$Dept')") 
                       or die(mysqli_error($conn));

       if($RegisterUser)
       {
         $GetUser = mysqli_fetch_assoc($conn , "SELECT * FROM `tblusers` WHERE `Email` = '$Email'");
             
         $_SESSION['UserId'] = $GetUser['Id'];
         $_SESSION['Full Name']  =    $FName.' '.$LName;
         $_SESSION['Email'] =  $Email;
         $_SESSION['IdDept'] = $GetUser['IdDept'];


         $UserId = $GetUser['Id'];
         $Agent = $_SERVER['HTTP_USER_AGENT'];
         $Ip = $_SERVER['REMOTE_ADDR'];
         $SetLog = mysqli_query($conn , "INSERT INTO `tblclient`(`IdUser`, `Agent`, `Ip`) VALUES ('$UserId',
          '$Agent','$Ip'");

         header('Location: '.'index.php');
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

