<!DOCTYPE html>
<?php
  include_once "connect.php";
  if (isset($_POST['submit'])) {
    $faculty_id=$_POST['fid'];
    $fullname=$_POST['name'];
    $branch=$_POST['branch'];
    $password=$_POST['password'];
    $email=$_POST['email'];
   
    $sql=mysql_query("SELECT * FROM `faculty_regist` WHERE EMPLOYEE_ID='$faculty_id' || EMAIL ='$email'");
    
    if (mysql_num_rows($sql)==1) {
      ?>
      <script>window.alert("Faculty Id/E-mail is already associated with an account.");</script>
      <?php 
    }
    else {
      mysql_query("INSERT INTO `faculty_regist` (EMPLOYEE_ID, FULL_NAME, BRANCH, PASSWORD, EMAIL) VALUES('$faculty_id', '$fullname', '$branch', '$password', '$email')");
      ?>
      <script>window.alert("Congratulation! You are registered Successfully.\n Login using your admission number as username and password that you had set while registering.");</script>
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

    <title>Faculty Registration</title>

    <style>
      body {
        border: 5px solid black;
        padding-top: 70px;
        padding-right: 70px;
        padding-bottom: 50px;
        padding-left: 80px;
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
  </head>
  <body>
    <div class="media">
      <a href="faltustudentportal.php" alt="faltustudentportal.php"><img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200"></a>
      <div class="media-body">
        <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
      </div>
    </div>
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
    <font align=center><b><h2>Faculty Registration</h2></b></font>
    <form name="form" method="post" action="#" onsubmit="return valid()" style="border:1px solid #ccc">
      <div class="container">
        <h3>Register</h3>
        <p>Please fill in this form to Register.</p>
        <hr>

        <label for="name"><b>Full Name</b></label><br>
        <input type="text" placeholder="Enter Full Name" name="name" id="name" required autofocus ><br>
        <span id="username" class="text-danger font-weight-bold"> </span><br>

        <label for="fid"><b>Facuty ID</b></label><br>
        <input type="text" placeholder="Enter Faculty ID" name="fid" id="fid" required><br>
        <span id="facid" class="text-danger font-weight-bold"> </span><br> 
        
        <label for="branch"><b>Branch</b></label><br>
        <select name="branch" required>
          <option value="">SELECT YOUR BRANCH</option>
          <option value="CE">Civil Engineering</option>
          <option value="CSE">Computer Science and Engineering</option>
          <option value="ME">Mechanical Engineering</option>
          <option value="EEE">Electrical and Electronics Engineering</option>
          <option value="ECE">Electronics and Communication Engineering</option>
          <option value="IT">Information Technology</option>
        </select><br>

        <label for="password"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="password" id="password" required><br>
        <span id="pwd" class="text-danger font-weight-bold"> </span><br>

        <label for="confirm_password"><b>Confirm Password</b></label><br>
        <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required><br>
        <span id="cpwd" class="text-danger font-weight-bold"> </span><br>

        <label for="email"><b>Email ID</b></label><br>
        <input type="email" placeholder="Enter Email-Id" name="email" required><br>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label><br>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p><br>

        <div class="clearfix">
          <button type="reset" class="cancelbtn">Reset</button>
          <button type="submit" name="submit" class="signupbtn">Sign Up</button>
        </div>
        <p>Already registered! Go for <a href="facultylog.php" style="color:dodgerblue">login</a>.</p><br>
      </div>
    </form>

    <footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
       function valid(){
       var name=document.getElementById('name').value;
       if(name == " "){
        document.getElementById('username').innerHTML =" ** Starting with space is not allowed.";
        return false;
      }
          if(/[\/!:\-\*?"<>_|~@#$`%^.&[()-,+=/\\/'";\]{}]/.test(name)){
      document.getElementById('username').innerHTML =" ** special characters are not allowed";
        return false;}


      if((name.length <= 2) || (name.length > 20)) {
        document.getElementById('username').innerHTML =" ** name lenght must be between 2 and 20";
        return false; 
      }
      if(!isNaN(name)){
        document.getElementById('username').innerHTML =" ** only characters are allowed";
        return false;
      }

      var f_id=document.getElementById('fid').value;

       if(isNaN(f_id))
{
document.getElementById('facid').innerHTML =" ** only numbers are allowed";
        return false;
      }
if(f_id.length!=10)
{

document.getElementById('facid').innerHTML =" ** must be of in length 10";
        return false;

}

      var password = document.getElementById('password').value;
      var confirm_password = document.getElementById('confirm_password').value;


      if(password == ""){
        document.getElementById('pwd').innerHTML =" ** Please fill the password field";
        return false;
      }
      if((password.length <= 6) || (password.length > 12)) {
        document.getElementById('pwd').innerHTML =" ** Passwords lenght must be between  6 and 12";
        return false; 
      }


      if(password!=confirm_password){
        document.getElementById('cpwd').innerHTML =" ** Password does not match the confirm password";
        return false;
      }

      

    }


     </script>

  </body>
</html>
