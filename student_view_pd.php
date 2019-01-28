<!doctype html>
<?php
include_once ('connect.php');
if(!isset($_SESSION['username'])) {
  header('location: studentlog.php');
  exit();
}
else {
  $uid=$_SESSION['username'];
  if (isset($_POST['submit'])) {
    $reg_no=$_POST['reg_no'];

    $sql=mysql_query("SELECT * FROM `student_personal_detail` WHERE REGISTRATION_NO='$reg_no' ");
  }
}
?>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>

  body {
      border: 1px solid black;
      padding-top: 40px;
      padding-right: 70px;
      padding-bottom: 50px;
      padding-left: 20px;
  }
  body {font-family: Arial, Helvetica, sans-serif;}

  input
 {
   -moz-border-radius: 15px;
   border-radius: 15px;
   border:solid 1px black;
    padding:5px;
 }
 h2,h1{
   text-align: center;
 }

 .footer {
      background-color:#ffffff;
      height: 20px;
    }
  </style>
  <title>Viewing Others</title>
</head>
  <body>

    <div class="media">
     <a href="register.html"><img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200"></a>
     <div class="media-body">
      <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
     </div>
   </div><br>
   <?php include 'student_navbar.html';?>
<h2 class="mt-0"><b><u>Student's Personal Details</u></b></h2>
<br>
<?php
  if (mysql_num_rows($sql)==1) {
    $row=mysql_fetch_assoc($sql);
    $ad=$row['ADMISSION_NO'];
    $que=mysql_query("SELECT * FROM `student_regist` WHERE ADMISSION_NO='$ad' ");
    $get=mysql_fetch_assoc($que);
  ?>
  <div class="media">
    <div class="media-body">
      <h5><b>Name : </b><?php echo($get['FULL_NAME']);?> </h5>
      <h5><b>Admission number : </b><?php echo($row['ADMISSION_NO']);?></h5>
      <h5><b>Registration No : </b><?php echo($reg_no);?> </h5>
      <h5><b>Branch : </b><?php echo($row['BRANCH']);?></h5>
      <h5><b>Semester: </b><?php echo($row['CURRENT_SEMESTER']);?>
      <h5><b>Scheme : </b><?php echo($row['SCHEME']);?> </h5>
      <h5><b>Permanent Address : </b><?php echo($row['PERMANENT_ADDRESS']);?> </h5>
      <h5><b>Local Address : </b><?php echo($row['LOCAL_ADDRESS']);?> </h5>
      <h5><b>Date-Of-Birth : </b><?php echo($row['DATE_OF_BIRTH']);?> </h5>
    </div>
    <?php
      $file= $row['IMAGE'];
      echo "<img class='ml-3' src='$file' alt='Student Image' height='280' width='280'";
    ?>
  </div>
  <?php
  }
  else {
    echo("<b>**No information available for registration number ".$reg_no.".</b>");
  }
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
