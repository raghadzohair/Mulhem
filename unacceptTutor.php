<?php
include("adminNav.html");
require_once('conn.php');
$phone = $_POST['phone'];

if(isset($_POST['UnAccept'])){
    $phone =$_POST['UnAccept'];
  $sql2= "DELETE FROM admin_db WHERE phoneNo =$phone";


   if ($conn->query($sql2) === TRUE) {
  //echo '<script language="javascript">';
  //echo 'alert("Hi! <br>Welcom to Mulhem")';
  //echo '</script>';
  echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align='center' style='color: #4C4B4B;'>The tutor has not been inserted<br><br></h1>";

  //header("Location: addSchedule.php");
 

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

//--------------------- End Create Tutor Recored ---------------------//
?>