<?php
session_start();

//remove all the session we set for the login purpose
 $_SESSION['UserId'] = $_SESSION['Full Name']  = $_SESSION['Email'] =$_SESSION['IdDept'] = '';
session_destroy();


header("location:index.php");
exit;