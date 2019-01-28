<!DOCTYPE html>
<?php
include_once 'connect.php';
if (isset($_SESSION['username'])) {
  $uid = $_SESSION['username'];
  if(isset($_POST['submit'])) {
    $doc= $_POST['document'];
    $file = $_FILES['fileupload']['tmp_name'];
    $fileupload_name=$_FILES['fileupload']['name'];
    $ext = strtolower(end(explode('.',$fileupload_name)));
    $allowed_file_type = array('docx','pdf');
    $filesize = $_FILES['fileupload']['size'];
  
    if (in_array($ext, $allowed_file_type) && ($filesize <= 256000)) {
      $fileupload=addslashes(file_get_contents($file));
      
      $sql="SELECT * FROM `student_personal_detail` WHERE ADMISSION_NO='$uid'";
      $result=mysql_query($sql);
      $get=mysql_fetch_assoc($result);
      $reg_no=$get['REGISTRATION_NO'];

      $query="SELECT * FROM `documents` WHERE REGISTRATION_NO='$reg_no'";
      $rslt=mysql_query($query);

      if(mysql_num_rows($result)==1) {
        if (mysql_num_rows($rslt)==1) {
          mysql_query("UPDATE `documents` SET `$doc`='$fileupload' WHERE REGISTRATION_NO='$reg_no'");
        }
        else {
          mysql_query("INSERT INTO `documents` (REGISTRATION_NO, `$doc`) VALUES ('$reg_no', '$fileupload')");         
        }
        header("location: document.php");
      }
      else {
        ?>
        <script>window.alert("You should enter your REGISTRATION NO with edit details option at HOMEPAGE.")</script>
        <?php
      }
    }
    elseif ($filesize > 256000) {
      ?>
      <script>window.alert("Your file size is more than 250 KB.\n Please select an fileupload less than or equal to 250 KB.")</script>
      <?php  
    }
    else {
      ?>
      <script>window.alert("Please select a file with extension <?php echo ".".implode(", .", $allowed_file_type);?>.")</script>
      <?php     
    }
  }
}
else {
  header('location:studentlog.php');
  exit();
}
?>
