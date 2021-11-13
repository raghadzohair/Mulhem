<?php
require_once('conn.php');
$fname = $_POST['uname'];
$pass = $_POST['psw'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$video = $_POST['file'];
$description=$_POST['tutordescription'];
$qualificate=$_POST['qualificate'];

if(isset($_POST['upload'])){
  $name = $_FILES['file']['name'];
  $tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($tmp, "videos/".$name);
  
  $name2 = $_FILES['qualificate']['name'];
  $tmp2 = $_FILES['qualificate']['tmp_name'];
  move_uploaded_file($tmp2, "qualificates/".$name2);

$check="select * from tutor_db where phoneNo=$phone"; 
$result=mysqli_query($conn,$check);
$count = mysqli_num_rows($result);

//هنا دا الشرط عشان نتاكد انو الرقم اساسا مو موجود في التيبل حق المدرس 

if($count>0){
  echo '<script type ="text/javascript"> alert ("Already Exists")</script>';
  include("tutroLogin.php");

}else{
  
   $sql="INSERT INTO admin_db (phoneNo, name,password, tutor_email, gender, Qualification,description,video)
   VALUES ('$phone','$fname', '$pass', '$email','$gender','$name2','$description','$name')";
   
   if ($conn->query($sql) === TRUE) {
    header("Location: load.html");

   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
}
}
?>
