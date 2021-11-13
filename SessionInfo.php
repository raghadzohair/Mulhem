<?php
require_once('conn.php');
session_start();
$studentPhone=$_SESSION["studentphone"];
$id =$_GET['id'];

$sql3="INSERT INTO scheduleinfo_DB (id,time,date,subject_name,end_time,phoneNo,meeting_id,responsive) SELECT id,time, date,subject_name,end_time,phoneNo,meeting_id,responsive FROM pre_scheduleinfo_DB WHERE id =$id";
$sql2="DELETE FROM pre_scheduleinfo_DB WHERE id =$id";
$query2;
//$result;
if ($conn->query($sql3) === TRUE && $conn->query($sql2) === TRUE) {

$query2="select * from scheduleinfo_db where id='$id'";
$result=mysqli_query($conn,$query2);}
 $subjectName;
  $startTime;
  $date;
  $endTime;
  $ph;
while ($rows=$result->fetch_assoc()) {
  $subjectName=$rows['subject_name'];
  $startTime=$rows['time'];
  $date=$rows['date'];
  $endTime=$rows['end_time'];
 
}


$sql = "INSERT INTO session_db (time,date,subject_name,end_time,phoneNo,id)
  VALUES ('$startTime','$date', '$subjectName','$endTime','$studentPhone','$id')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: mySession.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
//--------------------- End Create Subject Recored ---------------------//

$conn->close();
?>