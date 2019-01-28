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

      input {
        -moz-border-radius: 15px;
        border-radius: 15px;
        border:solid 1px black;
        padding:5px;
      }
      h2,h1{
        text-align: center;
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

      .footer {
        background-color:#ffffff;
        height: 20px;
      }

      /* Change color of dropdown links on hover */
      .dropdown-content a:hover {background-color: #ddd;}

      /* Show the dropdown menu on hover */
      .dropdown:hover .dropdown-content {display: block;}

      /* Change the background color of the dropdown button when the dropdown content is shown */
      .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
    <title>Viewing Student's Attendance</title>
  </head>
  <body>
    <div class="media">
      <a href="register.html"><img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200"></a>
      <div class="media-body">
        <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
      </div>
    </div><br>
  <?php include 'faculty_navbar.html';
  if (isset($_POST['submit'])) {
    $reg_no=$_POST['reg_no'];
    $sql=mysql_query("SELECT * FROM `attendance` WHERE REGISTRATION_NO='$reg_no'");
    $row=mysql_fetch_assoc($sql);
    if (mysql_num_rows($sql)==1) {
  ?>
      <h2 class="mt-0"><b><u>Student's Attendance Details</u></b></h2>
        <h4>Registration number:  <?php echo $reg_no;?></h4>
        <h4>Month 1 :  <?php echo $row["PERCENTAGE_'1'"];?>%</h4>
        <h4>Month 2 :  <?php echo $row["PERCENTAGE_'2'"];?>%</h4>
        <h4>Month 3 :  <?php echo $row["PERCENTAGE_'3'"];?>%</h4>
        <h4>Month 4 :  <?php echo $row["PERCENTAGE_'4'"];?>%</h4>
        <h4>Month 5 :  <?php echo $row["PERCENTAGE_'5'"];?>%</h4>
        <h4>Month 6 :  <?php echo $row["PERCENTAGE_'6'"];?>%</h4>
        <h3>OVERALL ATTENDANCE :  <?php echo $row["PERCENTAGE"];?>%</h3>
  <?php
    }
    else {
      echo "<br><b>**No information available for registration number ". $reg_no.".</b>";
    }
  }
  else {
  ?>
  <h2 class="mt-0"><b><u>View Student's Attendance</u></b></h2>
  <form method='post' action=''>
    <h4>Enter Registration number of student</h4>
      <input type='text' name='reg_no' required autofocus><br>
      <br><button type='submit' name='submit' class='submitbtn'>Submit</button>
  </form>
  <?php
  }
  ?>

  <footer class=" footer  text-center text-info" style="height:40px"><u> Contact Us </u>(8157069134) @ <u>copyrights</u> reserved</footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
