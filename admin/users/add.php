<!-- Register Page -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }

    if (isset($_POST['btnadd'])) {

       $Email    = $_POST['email'];
       $CheckEmail    = mysqli_query($conn,"SELECT Email FROM `tblusers` WHERE Email = '$Email'");
       if(mysqli_num_rows($CheckEmail)) {
        
        exit("<script>if(!alert('Email already in use')) document.location = 'http://localhost/tcc/tcc/add.php';</script>");
       }
       $FName    = $_POST['fname'];
       $LName    = $_POST['lname'];
       $Password    = $_POST['password'];
       $Dept    = $_POST['dept'];


       $RegisterUser = mysqli_query($conn , "INSERT INTO `tblusers`(`FirstName`, `LastName`, `Email`, `Password`, `IdDept`)                                  VALUES ('$FName' , '$LName' ,'$Email' , '$Password' , '$Dept')") 
                       or die(mysqli_error($conn));
         header('Location: '.'manage.php');
       

  

  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../content/css/bootstrap.min.css">

    <title>Add User - TCC</title>
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
        <option value="1">Admin</option>
        <option value="2">Teacher</option>
        <option value="3">Software</option>
        <option value="4">Networks</option>
        <option value="5">Computers</option>
      </select>
    </div>
  </div>
  <button type="submit" name="btnadd" class="btn" style="background-color: purple">Create</button> <br>
</form>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../../content/js/bootstrap.min.js"></script>
  </body>
</html>

