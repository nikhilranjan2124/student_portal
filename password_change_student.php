<!DOCTYPE html>
<?php
include_once('connect.php');
if(!isset($_SESSION['username'])) {
  header('location: studentlog.php');
  exit();
}
else {
  $uid=$_SESSION['username'];
  
  $sql=mysql_query("SELECT * FROM `student_regist` WHERE ADMISSION_NO='$uid'");
  $result=mysql_fetch_assoc($sql);

  if(isset($_POST['submit'])) {
    $opass=$_POST['opassword'];
    $npass=$_POST['npassword'];
    if ($result['PASSWORD']==$opass) {
      mysql_query("UPDATE `student_regist` SET `PASSWORD`='$npass' WHERE ADMISSION_NO='$uid'");
      ?>
      <script> window.alert("Your password is changed successfully.");</script>
      <?php
    }
    else {
      ?>
      <script> window.alert("You entered incorrect old password.");</script>
      <?php
    }
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

    <title>Change Password</title>

    <style>
      body {
        border: 5px solid black;
        padding-top: 70px;
        padding-right: 70px;
        padding-bottom: 50px;
        padding-left: 80px;
        font-family: Arial, Helvetica, sans-serif;
      }
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

  </head>
  <body>

    <div class="media">
      <a href="faltustudentportal.php" alt="faltustudentportal.php"><img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200"></a>
      <div class="media-body">
        <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
      </div>
    </div><br>
    <?php include 'student_navbar.html';?>
    <font align=center><b><h2>Password Change</h2></b></font>
    <form name="form" method="post" action="#" onsubmit="return validate()">
      <div class="container">
        <h3>Change Password</h3>
        <label for="opassword"><b>Old Password</b></label>
        <input type="password" placeholder="Enter Password" name="opassword" id="opassword" required autofocus><br>

        <label for="npassword"><b>New Password</b></label>
        <input type="password" placeholder="Enter Password" name="npassword" id="npassword" required><br>

        <label for="cpassword"><b> Confirm Password</b></label>
        <input type="password" placeholder="Enter Password" name="cpassword" id="cpassword" required><br>

        <div class="clearfix">
          <button type="reset" class="cancelbtn">Reset</button>
          <button type="submit" name="submit" class="signupbtn">Change</button>
        </div>
      </div>
    </form>

    <footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function validate(){
        var a=document.form.npassword.value;
          if ((a.length < 6) || (a.length > 12)) {
            alert("Password must be 6 to 12 Character in length");
            document.form.npassword.select();
            return false;
            }
        var b=document.form.cpassword.value;
        if(a!=b) {
          alert("password does not match");
          document.form.cpassword.select();
          return false;
        }
      }
  </script>
  </body>
</html>
