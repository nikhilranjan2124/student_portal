<!DOCTYPE html>
<?php
include_once "connect.php";
if (isset($_POST['submit'])) {
  $uid=$_POST['uid'];
  $password=$_POST['password'];
  
  $sql="SELECT * FROM `student_regist` WHERE ADMISSION_NO='$uid' && PASSWORD='$password'";
  $result=mysql_query($sql);

  if (mysql_num_rows($result)==1) {
    $_SESSION['username']=$uid;
    header ('location: homepage_student.php');
  }
  else {
    ?>
    <script> window.alert("Username or password is incorrect.");</script>
    <?php
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

    <title>Student Login</title>

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
    </div>
    <br><marquee scrollamount="5" onmouseover="stop();"  onmouseout="start();"><h2>IMPORTANT NOTICE!! ## RESULTS ARE OUT CLICK<a href="http://results.cusat.ac.in/regforms/exam.php" target="_blank"> here</a> TO VIEW RESULTS</h2></marquee>
    <br>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="faltustudentportal.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;color: #000000">
          Register
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="studentreg.php">As Student</a>
          <a class="dropdown-item" href="facultyreg.php">As Faculty</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;color: #000000">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="studentlog.php">As Student</a>
          <a class="dropdown-item" href="facultylog.php">As Faculty</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    <font align=center><b><h2>Student Login</h2></b></font>
    <form name="form" method="post" action="" onsubmit="return validations()">
      <div class="container">
        <h3>Login</h3>
        <p>Please fill in this form to Login.</p>
        <hr>

        <label for="u_id"><b>User ID</b></label>
        <input type="text" placeholder="Enter Admission Number" name="uid" required autofocus><br>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required><br>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label><br>

        <p>By Logging in you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p><br>

        <div class="clearfix">
          <button type="reset" class="cancelbtn">Cancel</button>
          <button type="submit" name="submit" class="signupbtn">Login</button>
        </div>
        <p>Not registered yet! Get yourself registered <a href="studentreg.php" style="color:dodgerblue">here</a>.</p><br>
      </div>
    </form>
    
    <footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
      
      function validations()
      {
           var b=document.form.uid.value;
          if(!isNaN(b))
{
alert("User id must be a combination of numbers and characters!!!");
document.form.uid.select();
return false;}
if(b.length!=10)
{

alert("User id length must be of 10!!!");
document.form.uid.select();
return false;

}



        var a=document.form.password.value;
        if ((a.length < 6) || (a.length > 12))
{
alert("Password must be 6 to 12 Character in length");
document.form.password.select();
return false;
}

      }


    </script>
  </body>
</html>
