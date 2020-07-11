<?php
session_start();

//remove all the session we set for the login purpose
$_SESSION['UserId'] = '';
session_destroy();


header("location:index.php");
exit;