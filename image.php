<?php
include_once('connect.php');
if (isset($_SESSION['username'])){
    $uid=$_SESSION['username'];
    $file = mysql_query("SELECT * FROM `student_personal_detail` WHERE ADMISSION_NO='$uid'");
    $fileresult=mysql_fetch_assoc($file);
    $file=$fileresult['IMAGE'];
    header("Content-type: image/jpeg,jpg,png");
    readfile($file);
}
?>