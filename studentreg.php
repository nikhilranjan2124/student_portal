<!DOCTYPE html>
<?php
include_once "connect.php";
if (isset($_POST['submit'])) {
  $fullname=$_POST['name'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $admission_no=$_POST['admno'];
  $branch=$_POST['branch'];
  $mob_no=$_POST['mobile'];
 
  $sql=mysql_query("SELECT * FROM `student_regist` WHERE ADMISSION_NO='$admission_no' || EMAIL ='$email'");
  
  if (mysql_num_rows($sql)!=1) {
    mysql_query("INSERT INTO `student_regist` (ADMISSION_NO, FULL_NAME, BRANCH, PASSWORD, EMAIL) VALUES('$admission_no', '$fullname', '$branch', '$password', '$email')");
    ?>
    <script>window.alert("Congratulation! You are registered Successfully.\n Login using user-id as <?php echo($admission_no)?> and password <?php echo($password)?>.");</script>
  <?php
    }
  else {
  ?>
  <script>window.alert("Admission No./E-mail is already associated with an account.");</script>
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

    <title>Student Registration</title>

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
        border:solid 0.5px black;
        padding:5px;
    }
    h1,h2{
    text-align: center;
   }
    .footer {
      background-color:#ffffff;
      height: 20px;
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
    <font align=center><b><h2>Student Registration</h2></b></font>
    <form name="form" method="post" action="#" onsubmit="return validate()">
      <div class="container">
        <h3>Register</h3>
        <p>Please fill in this form to Register.</p>
        <hr>
        <label for="name"><b>Full Name</b></label><br>
        <input type="text" placeholder="Enter Full Name" name="name" id="name" required autofocus><br>
        <span id="username" class="text-danger font-weight-bold"> </span><br>
        
        <label for="admno"><b>Admission Number</b></label><br>
        <input type="text" placeholder="Enter Admission Number" name="admno" id="admno" required><br>
        <span id="Admission" class="text-danger font-weight-bold"> </span><br>

        
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
        
        <label for="email"><b>E-mail</b></label><br>
        <input type="email" placeholder=" Enter Your E-mail" name="email" id="email" required><br>
        <span id="emid" class="text-danger font-weight-bold"> </span><br>

        <label for="mobile"><b>Mobile No.</b></label><br>
        <input type="text" placeholder="Enter mobile number"  name="mobile" id="mobile" required><br>
         <span id="mob" class="text-danger font-weight-bold"> </span><br>

        <label for="password"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="password" id="password" required><br>
        <span id="pwd" class="text-danger font-weight-bold"> </span><br>

        <label for="confirm_password"><b>Confirm Password</b></label><br>
        <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required><br>
        <span id="cpwd" class="text-danger font-weight-bold"> </span><br>

        <label>
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label><br>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
          <button type="button" class="cancelbtn">Cancel</button>
          <button type="submit" name="submit" class="signupbtn">Sign Up</button>
        </div>
        <p>Already registered! Go for <a href="studentlog.php" style="color:dodgerblue">login</a>.</p><br>
      </div>
    </form>
    <!--footer-->
    <footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">

      function validate()
      {
        var name=document.getElementById('name').value;

       if(name == ""){
        document.getElementById('username').innerHTML =" ** Please fill the name field";
        return false;
      }

      if(/[\/!:\-\*?"<>_|~@#$`%^.&[()-,+=/\\/'";\]{}]/.test(name))
      {
        document.getElementById('username').innerHTML =" ** special characters are not allowed";
        return false;
      }

      if((name.length <= 3) || (name.length > 20)) {
        document.getElementById('username').innerHTML =" ** name lenght must be between 3 and 20";
        return false; 
      }
      
      if(!isNaN(name)){
        document.getElementById('username').innerHTML =" ** please enter valid name";
        return false;
      }

        var admno=document.getElementById('admno').value;

        if(!isNaN(admno))
        {
           alert("User id must be a combination of numbers and characters!!!");
            document.form.admno.select(); 
                 return false;} 

         if(admno.length!=10){
                document.getElementById('Admission').innerHTML =" ** Admission Number must be 10 character only";
                return false;}

         var email = document.getElementById('email').value;  
         
         if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){
        document.getElementById('emid').innerHTML =" ** . Invalid Position";
        return false;
      }  

      var mobile = document.getElementById('mobile').value;   

      if(mobile == ""){
                document.getElementById('mob').innerHTML =" ** Please fill the mobile NUmber field";
                return false;
            }
            if(isNaN(mobile)){
                document.getElementById('mob').innerHTML =" ** user must write digits only not characters";
                return false;
            }
            if(mobile.length!=10){
                document.getElementById('mob').innerHTML =" ** Mobile Number must be 10 digits only";
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
