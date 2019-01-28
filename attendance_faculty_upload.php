<!doctype html>
<?php
include_once ('connect.php');
if(!isset($_SESSION['username'])) {
  header('location: facultylog.php');
  exit();
}
else {
  $uid=$_SESSION['username'];
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

   /* Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    font-size: 10px;
    border: border;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}
/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
    <title>attendance_faculty</title>
  </head>
  <body>
    <div class="media">
      <a href="register.html"><img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200"></a>
      <div class="media-body">
        <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
      </div>
    </div><br>
    <?php include 'faculty_navbar.html';?>
    <form method="post" action="final_attendance_faculty.php">
      <h2 class="mt-0"><b>Update Student's Attendance Details</b></h2>
      <h4>Choose Branch</h4>
        <select name="branch" required autofocus>
          <option value="">-----</option>
          <option value="CE">Civil Engineering</option>
          <option value="CSE">Computer Science and Engineering</option>
          <option value="ME">Mechanical Engineering</option>
          <option value="EEE">Electrical and Electronics Engineering</option>
          <option value="ECE">Electronics and Communication Engineering</option>
          <option value="IT">Information Technology</option>
        </select><br>
      <h4>Choose Semester</h4>
        <select name="semester" required>
          <option value="">-----</option>
          <option value="1">I</option>
          <option value="2">II</option>
          <option value="3">III</option>
          <option value="4">IV</option>
          <option value="5">V</option>
          <option value="6">VI</option>
          <option value="7">VII</option>
          <option value="8">VIII</option>
        </select>
      <h4>Choose Month</h4>
        <select name="month" required>
          <option value="">-----</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      <br><button type="submit" name="submit" class="submitbtn"">Submit</button>

      <footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>
    <!-- Optional JavaScript onclick="window.location.href='final_academics_faculty.html'-->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
