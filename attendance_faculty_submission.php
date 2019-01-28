<?php
include_once ('connect.php');
if(!isset($_SESSION['username'])) {
  header('location: facultylog.php');
  exit();
}
else {
  $uid=$_SESSION['username'];
  $month=$_SESSION['varname']; 
  if (isset($_POST['submit'])) {
    for ($i = 0; $i < count($_POST['regisno']); $i++) {
      $reg_no=$_POST['regisno'][$i];
      $tattnd=$_POST['tattendance'][$i];
      $aattnd=$_POST['aattendance'][$i];
      $per=($aattnd/$tattnd)*100;
      echo "TOTAL_'$month'";
      mysql_query("INSERT INTO `attendance` (`REGISTRATION_NO`,`TOTAL_'$month'`,`ATTENDED_'$month'`,`PERCENTAGE_'$month'`) VALUES ('$reg_no','$tattnd','$aattnd','$per') ON DUPLICATE KEY UPDATE `TOTAL_'$month'`='$tattnd',`ATTENDED_'$month'`='$aattnd',`PERCENTAGE_'$month'`='$per'");
      echo "string";
      $sql=mysql_query("SELECT * FROM `attendance` WHERE REGISTRATION_NO='$reg_no'");
      $row=mysql_fetch_assoc($sql);
      
      $tfinal=($row["TOTAL_'1'"]+$row["TOTAL_'2'"]+$row["TOTAL_'3'"]+$row["TOTAL_'4'"]+$row["TOTAL_'5'"]+$row["TOTAL_'6'"]);
      $afinal=($row["ATTENDED_'1'"]+$row["ATTENDED_'2'"]+$row["ATTENDED_'3'"]+$row["ATTENDED_'4'"]+$row["ATTENDED_'5'"]+$row["ATTENDED_'6'"]);
      mysql_query("INSERT INTO `attendance` (`REGISTRATION_NO`,`TOTAL`,`ATTENDED`) VALUES ('$reg_no','$tfinal','$afinal') ON DUPLICATE KEY UPDATE `TOTAL`='$tfinal',`ATTENDED`='$afinal'");
      $pfinal=$afinal/$tfinal*100;
      mysql_query("INSERT INTO `attendance` (`REGISTRATION_NO`,`PERCENTAGE`) VALUES ('$reg_no','$pfinal') ON DUPLICATE KEY UPDATE `PERCENTAGE`='$pfinal'");
    }  
  header('location: attendance_faculty_upload.php'); 
  }
}
?>