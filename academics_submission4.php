<?php
include_once ('connect.php');
if(!isset($_SESSION['username'])) {
  header('location: facultylog.php');
  exit();
}
else {
  $uid=$_SESSION['username'];
  $sub=$_SESSION['academics_sub']; 
  if (isset($_POST['submit'])) {
    for ($i = 0; $i < count($_POST['regisno']); $i++) {
      $reg_no=$_POST['regisno'][$i];
      $int1=$_POST['internal1'][$i];
      $int2=$_POST['internal2'][$i];
      $asgn1=$_POST['assignment1'][$i];
      $asgn2=$_POST['assignment2'][$i];
      $attendance=$_POST['attendance'][$i];
      $sessional=((($int1+$int2)/60)*25)+$asgn1+$asgn2+$attendance;
      $que="INSERT INTO `academics` (`REGISTRATION_NO`,`SUBJECT_CODE`,`INTERNAL_1`,`INTERNAL_2`,`ASSIGNMENT_1`,`ASSIGNMENT_2`,`ATTENDANCE`,`SESSIONAL`) VALUES ('$reg_no','$sub','$int1','$int2','$asgn1','$asgn2','$attendance','$sessional') ON DUPLICATE KEY UPDATE `INTERNAL_1`='$int1',`INTERNAL_2`='$int2',`ASSIGNMENT_1`='$asgn1',`ASSIGNMENT_2`='$asgn2',`ATTENDANCE`='$attendance',`SESSIONAL`='$sessional'";
      mysql_query($que);
    }
    header('location: academics_faculty.php'); 
  }
}
?>