<!-- Register Page -->
<?php
require '../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }

    if (!isset($_GET['id'])) {
         header("Location: add.php?id=3");
         exit;
    }
    $Dept = $_GET['id'];
    $GetDepts = mysqli_query($conn , "SELECT * FROM `tbldepts` WHERE Id NOT BETWEEN 1 AND 2");
    $GetSubjects = mysqli_query($conn , "SELECT * FROM tblsubjects WHERE IdDept = '$Dept'");
    $GetTestType = mysqli_query($conn , "SELECT * FROM tbltesttype");

     if (isset($_POST['btnadd'])) {
       
       $Subject    = $_POST['subject'];
       echo "<script>alert($Subject)</scrip>";
       $TestType    = $_POST['testtype'];
       $UserId   = $_SESSION['UserId'];

       $GetTestId = mysqli_query($conn , "SELECT MAX(Id) FROM `tbltests`");
       $GetTestIdExcu = mysqli_fetch_assoc($GetTestId);
       $TestId = $GetTestIdExcu[MAX(Id)];

       $AddTest = mysqli_query($conn , "INSERT INTO `tbltests`(`Id`,`IdUser`, `IdSubject` , `testtypeId`)
                                         VALUES ('$TestId','$UserId','$Subject','$TestType')") ;
       $GetTestType = mysqli_query($conn , "SELECT Type FROM tbltesttype WHERE Id = '$TestType'");

      if ($GetTestType) {
        $GetTestTypeExcu = mysqli_fetch_assoc($GetTestType);
        header("Location: questions/".$GetTestTypeExcu['Type'].".php?id=".$TestId."");
         exit;
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
    <link rel="stylesheet" href="../../content/css/bootstrap.min.css">

    <title>Add Test - TCC</title>
  </head>
  <body>
    <form method="post" class="container pt-5">
      
            <div class="form-group">
             <label for="exampleFormControlSelect1">Select Depts</label>
               <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.                                     options[this.selectedIndex].value);">
                <?php
                if ($GetDepts) {
                  while ($GetDeptsExcu = mysqli_fetch_assoc($GetDepts)) {
                    if ($GetDeptsExcu['Id'] == $Dept) {
                      echo "<option selected='' value='add.php?id=".$GetDeptsExcu['Id']."'>".$GetDeptsExcu['Dept']."</option>";
                    }
                    else{
                      echo "<option value='add.php?id=".$GetDeptsExcu['Id']."'>".$GetDeptsExcu['Dept']."</option>";
                    }
                  }
                }
                ?>
               </select>
            </div>
 
      <div class="form-group">
         <label for="exampleFormControlSelect1">Select Subject</label>
         <select class="form-control" name="subject" id="exampleFormControlSelect1">
          <?php 
        if ($GetSubjects) {
            while ($GetSubjectsExcu = mysqli_fetch_assoc($GetSubjects)) {
               echo "<option value='".$GetSubjectsExcu['Id']."'>".$GetSubjectsExcu['Subject']."</option>"; 
           }
        }
          ?>
         </select>
      </div>
    <div class="form-group">
         <label for="exampleFormControlSelect1">Select Test Type</label>
         <select class="form-control" name="testtype" id="exampleFormControlSelect1">
          <?php 
            while ($GetTestTypeExcu = mysqli_fetch_assoc($GetTestType)) {
               echo "<option value='".$GetTestTypeExcu['Id']."'>".$GetTestTypeExcu['Type']."</option>"; 
           }
        
          ?>
         </select>
      </div>
  <button type="submit" name="btnadd" class="btn" style="background-color: purple">Add</button> <br>
</form>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../../content/js/bootstrap.min.js"></script>
  </body>
</html>

