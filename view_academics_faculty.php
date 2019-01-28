<!doctype html>
<?php
include_once ('connect.php');
if(!isset($_SESSION['username'])) {
  header('location: facultylog.php');
  exit();
}
else {
  $uid=$_SESSION['username'];
 
  if (isset($_POST['submit'])) {
    $sub=$_POST['subject'];
    $sql=mysql_query("SELECT * FROM `academics` WHERE SUBJECT_CODE='$sub'");
    $myque=mysql_query("SELECT SUBJECT_NAME FROM `syllabus` WHERE SUBJECT_CODE='$sub'");
    $myresult=mysql_fetch_assoc($myque);
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
      input {
        -moz-border-radius: 15px;
        border-radius: 15px;
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
    <title>View Academics</title>
  </head>
  <body>
    <div class="media">
      <a href="register.html"><img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200"></a>
      <div class="media-body">
        <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
      </div>
    </div><br>
    <?php include 'faculty_navbar.html';?>
    <br>
    <table style="border: 1px solid black;">
      <h2><b><u>Student's Acdemics Details</b></U></h2>
      <tr><h5>SUBJECT : <b style="color: #1ab2ff;"><?php echo ($sub." ".$myresult['SUBJECT_NAME']);?></b></h5></tr>
      <tr>
        <th width="250" style="border: 1px solid black ;">Registration Number</th>
        <th width="250" style="border: 1px solid black ;">Internal 1</th>
        <th width="250" style="border: 1px solid black ;">Internal 2</th>
        <th width="250" style="border: 1px solid black ;">Assignment 2</th>
        <th width="250" style="border: 1px solid black ;">Assignment 2</th>
        <th width="250" style="border: 1px solid black ;">Attendance</th>
        <th width="250" style="border: 1px solid black ;">Sessional</th>
      </tr>
      <?php
        while($result=mysql_fetch_assoc($sql)) {
          $reg_no=$result['REGISTRATION_NO'];
      ?>
      <tr>
        <td><?php echo $reg_no;?></td>
        <td><?php echo $result['INTERNAL_1'];?></td>
        <td><?php echo $result['INTERNAL_2'];?></td>
        <td><?php echo $result['ASSIGNMENT_1'];?></td>
        <td><?php echo $result['ASSIGNMENT_2'];?></td>
        <td><?php echo $result['ATTENDANCE'];?></td>
        <td><?php echo $result['SESSIONAL'];?></td>
      </tr>
      <?php
      }
      ?>
    </table>

    <br><footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>