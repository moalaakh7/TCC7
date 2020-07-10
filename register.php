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


         $UserId = $GetUser['Id'];
         $Agent = $_SERVER['HTTP_USER_AGENT'];
         $Ip = $_SERVER['REMOTE_ADDR'];
         $SetLog = mysqli_query($conn , "INSERT INTO `tblclient`(`IdUser`, `Agent`, `Ip`) VALUES ('$UserId',
          '$Agent','$Ip'");

         header('Location: '.'index.php');
       }

  

  }




?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>

</body>
</html>

