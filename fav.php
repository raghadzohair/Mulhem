<?php
require_once('conn.php');
session_start();
$studentphone = $_SESSION["studentphone"];
$tutortphone;

if(isset($_POST['fav'])){
$tutortphone=$_POST['fav'];
}
$sql = "INSERT INTO favorite (tutorPhone,studentPhone)
VALUES ('$tutortphone','$studentphone')";
if ($conn->query($sql) === TRUE) {
    header("Location: tutor.php");
  } else {
    echo '<script type ="text/javascript"> alert ("Already Exist")</script>';
    header("Location: tutor.php");
  }
?>