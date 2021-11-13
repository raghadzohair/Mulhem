<?php
require_once('conn.php');
include("studentNav.html");
session_start();
$phone = $_SESSION["studentphone"];
$query="select * from student_db where phoneNo = $phone ";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
$result=mysqli_query($conn,$query);

if(isset($_POST['update'])){
  //  $ph=$_POST['phone'];
   $query2 = "UPDATE student_db SET name='$_POST[name]', studnt_email='$_POST[email]' , password='$_POST[psw]' WHERE phoneNo = $phone ";
     $result2=mysqli_query($conn,$query2);

     if($result2){
    // echo '<script type ="text/javascript"> alert ("Data Update")</script>';
    header("Location: studentProfile.php");
     } 
     else{
      echo '<script type ="text/javascript"> alert ("Data Not Update")</script>';
     }
     
     }

    
?>
<!DOCTYPE html>

<html>

<head>
    <title>مـُـلهـِم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="assets/css/form.css">

   

</head>

<body>

    <br><br>

    <div class="myDiv2" style="height: 500px;">
        <br><br><br>
        <h2 align="center">Update My Acount <br></h2>
        <br>
        <form method="POST" id="form">
            <p>
                <br>
                <?php 
        while ($rows=$result->fetch_assoc()) {
          
            
        ?>
                <label>Name:&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="uname" name="name" type="text" size="30" value="<?php echo $rows['name'];?>"style="font-size: 20px;" required>
                    <br><br>
                </label>
             <!--
                <label>Phone Number:&emsp;&nbsp;&nbsp;
                    <input id="phoneNum" name="phone" type="text" size="30"value="<?php echo $rows['phoneNo'];?>" style="font-size: 20px;"  required>
                    <br><br>
                </label>
        -->
                <label>Email:&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="email" name="email" type="email" size="30" value="<?php echo $rows['studnt_email'];?>" style="font-size: 20px;" required>
                    
                    <br><br>
                </label>


                <label>Password:&emsp;&emsp;&emsp;&ensp;
                    <input  type="password" size="30" style="font-size: 20px;" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    value="<<?php echo $rows['password'];?>"
                     title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <br><br>
                </label>

<?php
        }
       
        ?>
            </p>
            <button class='button' name ="update" type="submit" style="margin-top: 200px ">Update</button>

            <button class="button" style="margin: 40px -10px; margin-top: 200px " >Cancel</button>



        </form>
    </div>
</body>
</html>

