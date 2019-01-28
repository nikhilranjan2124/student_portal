<!doctype html>
<?php
session_start();
session_destroy();
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
        border: 5px solid black;
        padding-top: 70px;
        padding-right: 70px;
        padding-bottom: 50px;
        padding-left: 80px;
    }
    body {font-family: Arial, Helvetica, sans-serif;}

    input
   {
     -moz-border-radius: 15px;
     border-radius: 15px;
     border:solid 1px black;
      padding:5px;
   }
   h1,h2{
    text-align: center;
   }
    </style>
    <title>Home page</title>
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
<br>
<h2>You are logged out.</h2>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>


