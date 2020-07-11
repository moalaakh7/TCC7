<!-- Register Page -->
<?php
require 'DBcon.php';
session_start();
  if(!empty($_SESSION['UserId']))
  {
    $UserId = $_SESSION['UserId'];
    $GetUserDept = mysqli_query($conn , "SELECT tblusers.Id, tbldepts.Dept FROM tblusers
                                         INNER JOIN tbldepts ON tblusers.IdDept = tbldepts.Id
                                         WHERE tblusers.Id = '$UserId'");
    $GetUserDeptExcute = mysqli_fetch_assoc($GetUserDept);
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


       $RegisterUser = mysqli_query($conn , "INSERT INTO `tblusers`(`FirstName`, `LastName`, `Email`, `Password`, `IdDept`)                                  VALUES ('$FName' , '$LName' ,'$Email' , '$Password' , '$Dept')") 
                       or die(mysqli_error($conn));

       if($RegisterUser)
       {

         $GetUser = mysqli_query($conn , "SELECT * FROM `tblusers` WHERE `Email` = '$Email'");
         $GetUserExc = mysqli_fetch_assoc($GetUser);
             
         $_SESSION['UserId'] = $GetUserExc['Id'];
         $_SESSION['Full Name']  =    $FName.' '.$LName;
         $_SESSION['Email'] =  $Email;
         $_SESSION['IdDept'] = $GetUserExc['IdDept'];


         $UserId = $GetUserExc['Id'];
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

    <title>Register - TCC</title>
  </head>
  <body>
    <form method="post" class="container pt-5">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputFname">First Name</label>
      <input type="text" name="fname" class="form-control" id="inputFname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputLname">Last Name</label>
      <input type="text" name="lname" class="form-control" id="inputLname">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4">
    </div>
  </div>



  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Dept</label>
      <select id="inputState" name="dept" class="form-control">
        <option value="3">Software</option>
        <option value="4">Networks</option>
        <option value="5">Computers</option>
      </select>
    </div>
  </div>
  <button type="submit" name="btnregister" class="btn" style="background-color: purple">Register</button> <br>
  <a href="index.php">Or Login</a>
</form>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="content/js/bootstrap.min.js"></script>
  </body>
</html>

