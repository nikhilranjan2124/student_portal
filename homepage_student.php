<!doctype html>
<?php
  include_once ('connect.php');
  if (isset($_SESSION['username'])){
    $uid=$_SESSION['username'];

    $sql="SELECT * FROM `student_regist` WHERE ADMISSION_NO='$uid'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    $que=mysql_query("SELECT * FROM `student_personal_detail` WHERE ADMISSION_NO='$uid'");
    if(mysql_num_rows($que)==1) {
      $get=mysql_fetch_array($que);
    }
    else{
      $get=null;
    }
  }
  else{
    header ('location: studentlog.php');
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
   h3{
     text-align: center;
   }
   h1 {
    text-align: center;
   }
   h2,h1{
   text-align: center;
    }

   .footer {
      background-color:#ffffff;
      height: 20px;
    }
    </style>
    <title>Homepage_student page</title>
  </head>
  <body>
    <div class="media">
      <a href=""><img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200"></a>
      <div class="media-body">
        <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
      </div>
    </div>
    <br><marquee scrollamount="5" onmouseover="stop();"  onmouseout="start();"><h2>IMPORTANT NOTICE!! ## RESULTS ARE OUT CLICK<a href="http://results.cusat.ac.in/regforms/exam.php" target="_blank"> here</a> TO VIEW RESULTS</h2></marquee>
    <?php include 'student_navbar.html';?>
    <h3 class="mt-0"><b><u>Personal Details</u></b></h3>
    <br>
    <h2 style="color: blue;"><b>Hi! <?php echo $row['FULL_NAME'];?></b></h2>
    <div class="media">
      <div class="media-body">
        <h5><b>Registration No : </b><?php echo $get['REGISTRATION_NO'];?></h5>  
        <h5><b>Admission No. : </b><?php echo $row['ADMISSION_NO'];?></h5>
        <h5><b>Branch : </b><?php echo $row['BRANCH'];?></h5>
        <h5><b>Current Semester : </b><?php echo $get['CURRENT_SEMESTER'];?></h5>
        <h5><b>Scheme : </b><?php echo $get['SCHEME'];?></h5>
        <h5><b>E-mail : </b><?php echo $row['EMAIL'];?></h5>
        <h5><b>Date-Of-Birth : </b><?php echo $get['DATE_OF_BIRTH'];?></h5>
        <h5><b>Father/Guardian Name: </b><?php echo $get['GUARDIAN_NAME'];?></h5>
        <h5><b>Permanent Address : </b><?php echo $get['PERMANENT_ADDRESS'];?></h5>
        <h5><b>Local Address : </b><?php echo $get['LOCAL_ADDRESS'];?></h5>
        <h5><b>Guardian's Mobile No. : </b><?php echo $get['MOBILE_NO_GUARDIAN'];?></h5>
        <a href="edit-student.html" type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" onclick="window.location.href='edit_student.php'">Edit Details</a>
      </div>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data" >
        <img class="ml-3" src="image.php" height="200" width="200" alt="Your Image"><br>
        <input name="image" type="file" id="file" accept="image/jpeg,jpg,png">
        <button type="submit"  name="submit"class="btn btn-outline-info">Upload</button><br>
      </form>
      <?php 
        if(isset($_POST['submit'])) {
          $image_name=$_FILES['image']['name'];
          $temp_name=$_FILES['image']['tmp_name'];
          $allowed_file_type = array('jpg','jpeg','png');
          $ext = strtolower(end(explode('.',$image_name)));
          $path="images/$uid".".$ext";
          $filesize = $_FILES['image']['size'];
          if (in_array($ext, $allowed_file_type) && ($filesize <= 256000)) {
            move_uploaded_file($temp_name, $path);
            if ($get['IMAGE']==null) {
              mysql_query("INSERT INTO `student_personal_detail` (`ADMISSION_NO`, `IMAGE`) VALUES ('$uid','$path')");
            }
            else {
              mysql_query("UPDATE `student_personal_detail` SET `IMAGE`='$path' WHERE ADMISSION_NO='$uid'");
            }
          }
          elseif ($filesize > 256000) {
            ?>
            <script>window.alert("Your image size is more than 250 KB.\n Please select an image less than or equal to 250 KB.")</script>
            <?php  
          }
          else {
            ?>
            <script>window.alert("Please select an image file with extension <?php echo ".".implode(", .", $allowed_file_type);?>.")</script>
            <?php     
          }
        }
      ?>
    </div>

    <footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
