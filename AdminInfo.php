<?php
require_once('conn.php');


//--------------------- Create Admin Recored, and check if Recored Created ---------------------//
$sql = "INSERT INTO Admin_DB (ID, name, last_name, admin_email)
  VALUES ('$id','$fname', '$lname', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>