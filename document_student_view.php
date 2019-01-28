<!doctype html>
<?php
include_once('connect.php');
if(!isset($_SESSION['username'])) {
  header('location: studentlog.php');
  exit();
}
else {
  $uid=$_SESSION['username'];
  $sql=mysql_query("SELECT * FROM `student_personal_detail` WHERE ADMISSION_NO='$uid'");
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>

    body {
      border: 1px solid black;
      padding-top: 40px;
      padding-right: 70px;
      padding-bottom: 50px;
      padding-left: 20px;
    }
    body {font-family: Arial, Helvetica, sans-serif;}

    input {
      -moz-border-radius: 15px;
      border-radius: 10px;
      border:solid 1px black;
      padding:5px;
    }
   h2,h1 {
     text-align: center;
    }
    .footer {
      background-color:#ffffff;
      height: 20px;
    }
    </style>
    <title>Documents</title>
  </head>
  <body>
    <div class="media">
      <a href=""><img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200"></a>
      <div class="media-body">
        <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
      </div>
    </div><br>
    <?php include 'student_navbar.html';?>
    <h2 class="mt-0"><b><u>Student's Documents</u></b></h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <label for="document"><b>Documents</b></label><br>
      <select name="document" required autofocus>
        <option value="" >SELECT YOUR DOCUMENT</option>
        <option value="10TH">Matriculation Certificate</option>
        <option value="12TH">Intermediate Certificate</option>
        <option value="RESUME">Resume</option>
        <option value="FEE_RECEIPT">Last Fee Receipt</option>
      </select>
      <button type="reset" value="reset" class="btn btn-outline-info">Cancel</button>
      <button type="submit" name="submit" class="btn btn-outline-info">Select</button>
    </form>
    <?php
    if(mysql_num_rows($sql)==1) {
    $row=mysql_fetch_array($sql);
    if ($row['REGISTRATION_NO']==true) {
      $reg_no=$row['REGISTRATION_NO'];
      $que=mysql_query("SELECT * FROM `documents` WHERE REGISTRATION_NO='$reg_no'");
      if(mysql_num_rows($que)==1) {
        $result=mysql_fetch_array($que);
        if(isset($_POST['submit'])) {
          $doc = $_POST['document'];
          $file = $result[$doc];
          if ($file!=NULL) {
            ?>
            <a href="<?php echo $file;?>" target="_blank" ><button type="submit" class="btn btn-outline-info">Download</button></a>
            <?php
          }
          else {
            echo "<b>**No document available for selected document type.</b>";
          }
        }
      }
      else{
      ?>
        <script>window.alert("No document available for registration number <?php echo $reg_no;?>.\n Kindly upload the documents to view later.")</script>
      <?php
      }
    }
    else{
    ?>
    <script>window.alert("No registration number is associated with Admission number <?php echo $uid;?>.\n Kindly provide your registration no through edit details option given at homepage.")</script>
    <?php
    }
  }?>

  <footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
