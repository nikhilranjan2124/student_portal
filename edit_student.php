<!DOCTYPE html>
<?php
    include_once 'connect.php';
    if (isset($_SESSION['username'])) {
        $uid = $_SESSION['username'];
        if(isset($_POST['submit'])) {
            $father_name=$_POST['father_name'];
            $reg_no=$_POST['regno'];
            $p_add=$_POST['P_address'];
            $l_add=$_POST['L_address'];
            $smob_no=$_POST['smobile'];
            $pmob_no=$_POST['pmobile'];
            $scheme=$_POST['scheme'];
            $semester=$_POST['sem'];
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];
            
            $sql=mysql_query("SELECT * FROM `student_regist` WHERE ADMISSION_NO='$uid'");
            $result=mysql_fetch_assoc($sql);
            $branch=$result['BRANCH'];

            $mysql=mysql_query("SELECT * FROM `student_personal_detail` WHERE ADMISSION_NO='$uid'");
            $myresult=mysql_fetch_assoc($mysql);
            $registration_no=$myresult['REGISTRATION_NO'];

            if ($registration_no==$reg_no) {
                ?>
                <script>window.alert("Registration number <?php echo $reg_no;?> already associated with other student.");</script>
                <?php
            }
            else {     
                mysql_query("INSERT INTO `student_personal_detail` (`REGISTRATION_NO`,`ADMISSION_NO`, `DATE_OF_BIRTH`, `GUARDIAN_NAME`, `MOBILE_NO_GUARDIAN`, `MOBILE_NO_SELF`, `SCHEME`, `CURRENT_SEMESTER`,  `GENDER`, `LOCAL_ADDRESS`, `PERMANENT_ADDRESS`,`BRANCH`) VALUES ('$reg_no', '$uid', '$dob', '$father_name', '$pmob_no', '$smob_no', '$scheme', '$semester', '$gender', '$l_add', '$p_add', '$branch')");
                ?>
                <script>window.alert("Your details are updated successfully.\n !!**THANK YOU**!!");</script>
                <?php
            }
        }
    }
    else {
        header('location:studentlog.php');
        exit();
    }
?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>Edit Student Details</title>

        <style>
            body {
                border: 1px solid black;
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
           .footer {
               background-color:#ffffff;
               height: 20px;
            }
            h2,h1{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="media">
            <img class="mr-3" src="faltu.jpg" alt="Generic placeholder image" height="200" width="200">
            <div class="media-body">
                <h1 class="mt-0"><font align=center size="8"><b>Fakirchand And Lakirchand Trust University <br>(FALTU)</b></font></h1>
            </div>
        </div>
        <?php include 'student_navbar.html';?>
        <font align=center><b><h2>Student's Personal Details</h2></b></font>
        <?php 
            $que=mysql_query("SELECT * FROM `student_personal_detail` WHERE ADMISSION_NO='$uid'");
            if (mysql_num_rows($que)==1){
                $row=mysql_fetch_assoc($que);
                $regis_no=$row['REGISTRATION_NO'];
                ?>
            <form  name="form" method="post" action="already.php" onsubmit="return Validation()" style="border:1px solid #ccc">
            <div class="container">
                <p>Please enter below information to complete your details</p>
                <hr>

                <label for="regno"><b>Registration Number</b></label><br>
                <input type="text" value="<?php echo $regis_no ?>" disabled><br>

                <label for="F_name"><b>Father/Guardian Name</b></label><br>
                <input type="text" placeholder="Enter Full Name" name="father_name" required><br>

                <label for="P_address"><b>Permanent Address</b></label><br>
                <input type="text" placeholder="Enter your address" name="P_address" required><br>

                <label for="L_address"><b>Local Address</b></label><br>
                <input type="text" placeholder="Enter local address" name="L_address" required><br>

                <label for="mobile_self"><b>Mobile No. Self</b></label><br>
                <input type="text" placeholder="Enter Your Mobile Number" name="smobile" id="mobileNumber" required><br>
                <span id="mobileno" class="text-danger font-weight-bold" > </span><br>

                <label for="mobile_parent"><b>Mobile No. Father</b></label><br>
                <input type="text" placeholder="Enter Father's Mobile Number" name="pmobile" id="PmobileNumber"required><br>
                <span id="Pmobileno" class="text-danger font-weight-bold"  > </span><br>

                <label for="scheme"><b>Scheme</b></label><br>
                <input type="text" placeholder="Enter Your Scheme" name="scheme" id="scheme" required><br>
                 <span id="schemes" class="text-danger font-weight-bold"  > </span><br>

                <label for="sem"><b>Semester</b></label><br>
                <select name="sem" required>
                    <option value="">SELECT YOUR CURRENT SEMESTER</option>
                    <option value="1">I</option>
                    <option value="2">II</option>
                    <option value="3">III</option>
                    <option value="4">IV</option>
                    <option value="5">V</option>
                    <option value="6">VI</option>
                    <option value="7">VII</option>
                    <option value="8">VIII</option>
                </select><br>

                <label for="dob"><b>Date-Of-Birth</b></label><br>
                <input type="date" placeholder="Enter D.O.B" name="dob" required><br>

                <label for="gender" required><b>Gender</b></label><br>
                <input type="radio" name="gender" value="Male" checked> Male<br>
                <input type="radio" name="gender" value="Female"> Female<br>
                <input type="radio" name="gender" value="Other"> Other<br>
                <br>

                <br><div class="clearfix">
                  <button type="button" class="cancelbtn">Cancel</button>
                  <button type="submit" name="submit" class="submitbtn">Submit</button>
                </div>
            </div>
        </form>
                    <?php }
                    else {
                        ?>
            <form  name="form" method="post" action="" onsubmit="return Validation()" style="border:1px solid #ccc">
            <div class="container">
                <p>Please enter below information to complete your details</p>
                <hr>
                <label for="regno"><b>Registration Number</b></label><br>
                <input type="text" placeholder="Enter Registration Number" name="regno" required autofocus><br>
                
                <label for="F_name"><b>Father/Guardian Name</b></label><br>
                <input type="text" placeholder="Enter Full Name" name="father_name" required><br>

                <label for="P_address"><b>Permanent Address</b></label><br>
                <input type="text" placeholder="Enter your address" name="P_address" required><br>

                <label for="L_address"><b>Local Address</b></label><br>
                <input type="text" placeholder="Enter local address" name="L_address" required><br>

                <label for="mobile_self"><b>Mobile No. Self</b></label><br>
                <input type="text" placeholder="Enter Your Mobile Number" name="smobile" id="mobileNumber" required><br>
                <span id="mobileno" class="text-danger font-weight-bold" > </span><br>

                <label for="mobile_parent"><b>Mobile No. Father</b></label><br>
                <input type="text" placeholder="Enter Father's Mobile Number" name="pmobile" id="PmobileNumber"required><br>
                <span id="Pmobileno" class="text-danger font-weight-bold"  > </span><br>

                <label for="scheme"><b>Scheme</b></label><br>
                <input type="text" placeholder="Enter Your Scheme" name="scheme" id="scheme" required><br>
                 <span id="schemes" class="text-danger font-weight-bold"  > </span><br>

                <label for="sem"><b>Semester</b></label><br>
                <select name="sem" required>
                    <option value="">SELECT YOUR CURRENT SEMESTER</option>
                    <option value="1">I</option>
                    <option value="2">II</option>
                    <option value="3">III</option>
                    <option value="4">IV</option>
                    <option value="5">V</option>
                    <option value="6">VI</option>
                    <option value="7">VII</option>
                    <option value="8">VIII</option>
                </select><br>

                <label for="dob"><b>Date-Of-Birth</b></label><br>
                <input type="date" placeholder="Enter D.O.B" name="dob" required><br>

                <label for="gender" required><b>Gender</b></label><br>
                <input type="radio" name="gender" value="Male" checked> Male<br>
                <input type="radio" name="gender" value="Female"> Female<br>
                <input type="radio" name="gender" value="Other"> Other<br>
                <br>

                <br><div class="clearfix">
                  <button type="reset" class="cancelbtn">Cancel</button>
                  <button type="submit" name="submit" class="submitbtn">Submit</button>
                </div>
            </div>
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
        <script type="text/javascript">
function Validation()
        
{
var a = document.form.regno.value;
if(a=="")
{
alert("please Enter the Registration  Number");
document.form.regno.focus();
return false;
}
if(isNaN(a))
{
alert("Enter the valid Registration Number");
document.form.regno.focus();
return false;
}
if((a.length!=8))
{
alert(" Your Registration Number must be of 8 digit");
document.form.regno.select();
return false;
}
if (/[\/!:\-\*?"<>_|~@#$`%^.&[()-,+=/\\/'";\]{}]/.test(a))
{
    alert(" special character are not allowed");
document.form.a.select();
return false;
}




var b = document.form.father_name.value;
if(b=="")
{
alert("Please Enter Your Name");
document.form.father_name.focus();
return false;
}
if(!isNaN(b))
{
alert("Please Enter Only Characters in in father/Guardian name field");
document.form.father_name.select();
return false;
}
if ((b.length <3) || (b.length > 30))
{
alert("name of father/Guardian  must be 3 to 30 Character");
document.form.father_name.select();
return false;
}

if (/[\/!:\-\*?"<>_|~@#$`%^.&[()-,+=/\\/'";\]{}]/.test(b))
{
    alert(" special character are not allowed");
document.form.b.select();
return false;
}

var c = document.form.P_address.value;
if(c=="")
{
alert("Please Enter Your Name");
document.form.P_address.focus();
return false;
}
if(!isNaN(c))
{
alert("Please Enter Only Characters in in Permanent address field");
document.form.P_address.select();
return false;
}
if ((c.length < 10) || (c.length > 50))
{
alert("Permanent address must be 10 to 50 Character");
document.form.P_address.select();
return false;
}
if (/[\/!:\-\*?"<>_|~@#$`%^.&[()-,+=/\\/'";\]{}]/.test(c))
{
    alert(" special character are not allowed");
document.form.c.select();
return false;
}

var d = document.form.L_address.value;
if(d=="")
{
alert("Please Enter Your Name");
document.form.L_address.focus();
return false;
}
if(!isNaN(d))
{
alert("Please Enter Only Characters in in Local address field");
document.form.L_address.select();
return false;
}
if ((d.length < 10) || (d.length > 50))
{
alert("Local address must be 10 to 50 Character");
document.form.L_address.select();
return false;
}
if (/[\/!:\-\*?"<>_|~@#$`%^.&[()-,+=/\\/'";\]{}]/.test(d))
{
    alert(" special character are not allowed");
document.form.d.select();
return false;
}

var mobileNumber = document.getElementById('mobileNumber').value;

if(mobileNumber == ""){
                document.getElementById('mobileno').innerHTML =" ** Please fill the mobile NUmber field";
                return false;
            }
            if(isNaN(mobileNumber)){
                document.getElementById('mobileno').innerHTML =" ** user must write digits only not characters";
                return false;
            }
            if(mobileNumber.length!=10){
                document.getElementById('mobileno').innerHTML =" ** Mobile Number must be 10 digits only";
                return false;
            }



var PmobileNumber = document.getElementById('PmobileNumber').value;


if(PmobileNumber == ""){
                document.getElementById('Pmobileno').innerHTML =" ** Please fill the mobile NUmber field";
                return false;
            }
            if(isNaN(PmobileNumber)){
                document.getElementById('Pmobileno').innerHTML =" ** user must write digits only not characters";
                return false;
            }
            if(PmobileNumber.length!=10){
                document.getElementById('Pmobileno').innerHTML =" ** Mobile Number must be 10 digits only";
                return false;
            }


var scheme = document.getElementById('scheme').value;  


if(scheme == ""){
                document.getElementById('schemes').innerHTML =" ** Please fill the scheme field";
                return false;
            }
            if(isNaN(scheme)){
                document.getElementById('schemes').innerHTML =" ** user must write digits only not characters";
                return false;
            }
            if(scheme.length!=4){
                document.getElementById('schemes').innerHTML =" ** scheme must be 4 digits only like (2015) ";
                return false;
            }


}

</script>
    </body>
</html>