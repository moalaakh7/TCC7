<!-- LogIn Page -->
<?php
require 'DBcon.php';
session_start();
  if(!empty($_SESSION['UserId']))
  {
  	$UserId = $_SESSION['UserId'];
  	$GetUserDeptExcute = mysqli_fetch_assoc($conn , "SELECT tblusers.Id, tbldepts.Dept FROM tblusers
                                                     INNER JOIN tbldepts ON tblusers.IdDept = tbldepts.Id
                                                     WHERE tblusers.Id = '$user_id'");
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

     $CheckUser = mysqli_query($conn, "SELECT * FROM tblusere WHERE Email='$Email' and Password='$Password'")
                 or die(mysqli_error($conn));
     $count = mysqli_num_GetUsers($CheckUser);

     if($count == 1){
         $GetUser      = mysqli_fetch_assoc($CheckUser);
             
         $_SESSION['UserId'] = $GetUser['Id'];
         $_SESSION['Full Name']  =    $GetUser['FirstName'].' '.$GetUser['LastName'];
         $_SESSION['Email'] =  $Email;
         $_SESSION['IdDept'] = $GetUser['IdDept'];

         header('Location: '.'index.php')
     
      }
      else
      {
        exit("<script>if(!alert('Email or password error')) document.location = 'http://localhost/tcc/tcc/';</script>");
      }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>


</body>
</html>