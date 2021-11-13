<?php
require_once('conn.php');
session_start();
$fname = $_POST['name'];
$pass = $_POST['psw'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$studentphone = $_POST['studentphone'];


// Check connection
/*
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  echo "Good Connection..";
}
*/
//--------------------- Create Mulhem Database and Check if DB Created ---------------------//
/*
$sql = "CREATE DATABASE Mulhem";

if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
*///--------------------- End Create Mulhem Database ---------------------//

//--------------------- Create Students table, and check if table created ---------------------//
/*
$sql = "CREATE TABLE Student_DB (
phoneNo INT(10) UNSIGNED PRIMARY KEY,
name VARCHAR(15) NOT NULL,
password VARCHAR(30) NOT NULL,
studnt_email VARCHAR(50),
gender VARCHAR(6))";

if($conn->query($sql)===True){
  echo"Table student_DB created successfully";
}else{
  echo"error".$conn->error;
}
*///--------------------- End Create Stuedent Tsble ---------------------//

/*//--------------------- Create Student Recored, and check if Recored Created ---------------------//
$sql = "INSERT INTO Student_DB (phoneNo, name,  password, studnt_email, gender)
VALUES ('0092759134','wejdan',  '@@#efd', 'email@e.com','f)";
*/

$sql = "INSERT INTO Student_DB (phoneNo, name,  password, studnt_email, gender)
VALUES ('$studentphone','$fname', '$pass', '$email','$gender')";


if ($conn->query($sql) === TRUE) {
  //echo '<script language="javascript">';
  //echo 'alert("Hi! <br>Welcom to Mulhem")';
  //echo '</script>';
$_SESSION['studentphone']=$studentphone;
$_SESSION['fname']=$fname;
  
  header("Location: tutor.php");

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
//--------------------- End Create Student Recored ---------------------//



$conn->close();
?>