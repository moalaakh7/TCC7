<!-- Register Page -->
<?php
require '../../../DBcon.php';
session_start();
  if($_SESSION['IdDept'] <> '1')
  {
      header('Location: '.'../../index.php');
      exit();
  }
      if (!isset($_GET['id'])) {
         header("Location: ../add.php");
         exit;
    }
    $TestId = $_GET['id'];
   if (isset($_POST['btnadd'])) {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $Mark = $_POST['mark'];

    
    $i=1;
    $count = 0;
    foreach ($name as $n) {
      $GetMaxId = mysqli_query($conn , "SELECT max(`Id`) from tblquestions");
      $GetMaxIdExcu = mysqli_fetch_assoc($GetMaxId);
      $QuestionId = $GetMaxIdExcu[max(`Id`)] + 1;
      $SetNewQuestion = mysqli_query($conn , "INSERT INTO `tblquestions`(`Id`, `IdTest`, `questions`, `mark`) VALUES ('$QuestionId','$TestId','$n','$mark')");
      for ($i=0; $i < 3; $i++) { 
        if ($i == 0) {
          $SetNewAnswer = mysqli_query($conn , "INSERT INTO `tblanswers`(`Answer`, `IdQuestion`, `True`) VALUES (,'$$email[$count]','$QuestionId','true')");
        }
        else{
          $SetNewAnswer = mysqli_query($conn , "INSERT INTO `tblanswers`(`Answer`, `IdQuestion`, `True`) VALUES (,'$$email[$count]','$QuestionId','false')");
        }
        $count++;
      }
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
    <link rel="stylesheet" href="../../../content/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
$(document).ready(function(){

  $("#btn2").click(function(){
    $("#f1").append(
      "<input type='text' name='name[]' class='form-control' id='exampleInputEmail1' placeholder='السؤال' style='border: solid blue;'><input type='text' name='email[]' class='form-control' id='exampleInputEmail1' placeholder='الاجابة الصحيحة' ><input type='text' name='email[]' class='form-control' id='exampleInputEmail1' placeholder='الاجابة الخاطئة' ><input type='text' name='email[]' class='form-control' id='exampleInputEmail1' placeholder='الاجابة الخاطئة' ><input type='number' name='mark[]'  class='form-control' id='exampleInputEmail1' placeholder='العلامة'></div>"
      );
  });
});
</script>

    <title>Add Questions - TCC</title>
  </head>
  <body dir="rtl" class="container">
    <form  method="post" class="pt-5">
      <h1>Add Questions</h1>
      
       
      <div id="f1">
      <div class='form-group'>
      <input type='text' name="name[]" class='form-control' id='exampleInputEmail1' placeholder='السؤال' style='border: solid blue;'>
      <input type='text' name="email[]" class='form-control' id='exampleInputEmail1' placeholder='الاجابة الصحيحة' >
      <input type='text' name="email[]" class='form-control' id='exampleInputEmail1' placeholder='الاجابة الخاطئة' >
      <input type='text' name="email[]" class='form-control' id='exampleInputEmail1' placeholder='الاجابة الخاطئة' >
      <input type='number' name='mark[]'  class='form-control' id='exampleInputEmail1' placeholder='العلامة'>
      </div>
    </div>
      
  
 <button type="submit" name="btnadd" class="btn btn-primary mt-5 ">Submit</button>

</form>
 <button class="btn btn-danger mt-2" id="btn2" ><i class="fa fa-plus" aria-hidden="true"></i></button>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../../../content/js/bootstrap.min.js"></script>
  </body>
</html>

