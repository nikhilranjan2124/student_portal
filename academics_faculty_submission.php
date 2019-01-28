<!doctype html>
<?php
include_once ('connect.php');
if(!isset($_SESSION['username'])) {
  header('location: facultylog.php');
  exit();
}
else {
  $uid=$_SESSION['username'];
  $branch=$_SESSION['academics_branch'];
  $sem=$_SESSION['academics_sem'];
  if (isset($_POST['submit'])) {
    $sub=$_POST['subject'];
    $sql=mysql_query("SELECT * FROM `student_personal_detail` WHERE BRANCH='$branch' && CURRENT_SEMESTER='$sem'");
    $myque=mysql_query("SELECT SUBJECT_NAME FROM `syllabus` WHERE SUBJECT_CODE='$sub' && BRANCH='$branch'");
    $myresult=mysql_fetch_assoc($myque);
  }
  $_SESSION['academics_sub']=$sub;
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
      h2,h1{
        text-align: center;
      }
      .footer {
        background-color:#ffffff;
        height: 20px;
      }
    </style>
    <title>final_academics_faculty</title>
  </head>
  <body>
    <div class="media">
      <a href="register.html"><img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200"></a>
      <div class="media-body">
        <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
      </div>
    </div><br>
    <?php include 'faculty_navbar.html';?>
    <form method="post" action="academics_submission4.php">
      <br>
      <table name="entry" style="border: 1px solid black;">
        <h2><b><u>Update Student's Acdemics Details</b></U></h2>
        <tr><h5>SUBJECT : <b style="color: #1ab2ff;"><?php echo ($sub." ".$myresult['SUBJECT_NAME']);?></b></h5></tr>
        <tr>
          <th width="250" style="border: 1px solid black ;">Registration Number</th>
          <th width="250" style="border: 1px solid black ;">Internal 1</th>
          <th width="250" style="border: 1px solid black ;">Internal 2</th>
          <th width="250" style="border: 1px solid black ;">Assignment 2</th>
          <th width="250" style="border: 1px solid black ;">Assignment 2</th>
          <th width="250" style="border: 1px solid black ;">Attendance</th>
        </tr>
        <?php
          while($result=mysql_fetch_assoc($sql)) {
            $reg_no=$result['REGISTRATION_NO'];
        ?>
        <tr>
          <td><input style="border-color: white;" name="regisno[]" type="text" value="<?php echo $reg_no;?>" disabled></td>
          <td><input name="internal1[]" type="text" autofocus></td>
          <td><input name="internal2[]" type="text"></td>
          <td><input name="assignment1[]" type="text"></td>
          <td><input name="assignment2[]" type="text"></td>
          <td><input name="attendance[]" type="text"></td>
        </tr>
        <?php
        }
        ?>
      </table>
      <br><button type="submit" name="submit" class="submitbtn">Submit</button>
    </form>

    <footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>