<?php
require_once('conn.php');
//--------------------- Create Subject table, and check if table created ---------------------//
/*
$sql = "CREATE TABLE Subject_DB (
    subject_ID INT(10) UNSIGNED PRIMARY KEY,
    subject_name VARCHAR(15) NOT NULL,
    subject_code VARCHAR(50))";
    
    
    if($conn->query($sql)===True){
      echo"Table Subject_DB created successfully";
    }else{
      echo"error".$conn->error;
    }
*///--------------------- End Create Subject Table ---------------------//

//--------------------- Create Subject Recored, and check if Recored Created ---------------------//
$sql = "INSERT INTO Subject_DB (subject_ID, subject_name, subject_code)
  VALUES ('$id','$name', '$code')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
//--------------------- End Create Subject Recored ---------------------//

$conn->close();
?>