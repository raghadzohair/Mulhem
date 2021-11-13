<?php
include("adminNav.html");
require_once('conn.php');
session_start();

$fname = $_POST['uname'];
$pass = $_POST['psw'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$video = $_POST['file'];
$description=$_POST['tutordescription'];
$qualificate=$_POST['qualificate'];

if(isset($_POST['Accept'])){
  $phone =$_POST['Accept'];
    $name = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp, "videos/".$name);
    
    $name2 = $_FILES['qualificate']['name'];
    $tmp2 = $_FILES['qualificate']['tmp_name'];
    move_uploaded_file($tmp2, "qualificates/".$name2);


    $sql="INSERT INTO tutor_db (phoneNo, name,password, tutor_email, gender, Qualification,description,video) SELECT phoneNo, name,password, tutor_email, gender, Qualification,description,video FROM admin_db WHERE phoneNo =$phone";
   $sql2="DELETE FROM admin_db WHERE phoneNo =$phone";


   if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
  //echo '<script language="javascript">';
  //echo 'alert("Hi! <br>Welcom to Mulhem")';
  //echo '</script>';
  $_SESSION['phone']=$phone;
  $_SESSION['fname']=$fname;
  echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align='center' style='color: #4C4B4B;'>The tutor has been inserted<br><br></h1>";
  //header("Location: addSchedule.php");
 

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

//--------------------- End Create Tutor Recored ---------------------//
?>