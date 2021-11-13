<?php 
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "mulhemDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("Connection failed:" . mysqli_errno($conn));


