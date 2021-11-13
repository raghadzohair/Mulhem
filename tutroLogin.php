<?php
require_once('conn.php');
session_start();
if(!empty($_POST['submit'])){
    $pass = $_POST['psw'];
    $phone = $_POST['phone'];

    $query = "SELECT * FROM tutor_db  WHERE phoneNo= '$phone' and password='$pass'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

    $query2 = "SELECT * FROM student_db  WHERE phoneNo= '$phone' and password='$pass'";
    $result2 = mysqli_query($conn,$query2);
    $count2 = mysqli_num_rows($result2);

    if($count>0){
        $_SESSION['phone']=$phone;
        header("Location: addSchedule.php");
        
    }
    else if($count2>0){
        $_SESSION['studentphone']=$phone;
        header("Location: tutor.php");
    }
    else{
     echo '<script language="javascript">';
     echo 'alert("Incorrect email or password")';
     echo '</script>';
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>مـُـلهـِم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="assets/css/loginStyle.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

    <br>
    <div>
        <p style="font-size: 40px; margin:auto; text-align: center; color: #4C4B4B;"> Welcome back to Mulhem</p>
    </div> <br><br>

    <div class="myDiv2">
        <h2 align="center">Log in with your Phone number<br></h2>
        <form method="POST"><p><br>
                <label>Phone Number:&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input name="phone" type="text" size="30" style="font-size: 20px;" placeholder="Enter your Phone Number" required><br><br>
                </label>

                <label>Password:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input name="psw" type="password" size="30" style="font-size: 20px;" placeholder="Enter your Password" required><br>
                </label>

                &emsp;&emsp;&emsp;&emsp;&nbsp;<a href="url" style="text-decoration: none">Forget your password?</a>
                &emsp;&emsp;&emsp;&emsp;&emsp;<br>
                &emsp;&emsp;&emsp;&emsp;&nbsp;<a href="url" style="text-decoration: none">New to Mulhem?</a>
                <a href="#" id="signup" style="color:#9e9797;">Sign up</a>&emsp;&emsp;&emsp;&emsp;</p><br><br>

            <input style=" margin-top: 200px" class="button" id="submit" name="submit" type="submit" value="Log in" />
            <button class="button" name="cancel" type="reset" style="margin: 80px -10px;margin-top: 200px">Cancel</button>
            <img src="assets/img/pic2.jpg" alt="computer" width="300" height="250" style="  margin-right:-100px;">

            <div class="popup">
                <div class="pupup-content"style="box-shadow: 0 6px 14px 0 rgba(153, 197, 231, 0.507), 0 5px 19px 0 rgba(70, 86, 100, 0.507);">
                    <p class="close"><span class="far fa-window-close" id="close"></span></p>
                    <h3>Hi!..<br>Do you want regestere as</h3>
                    <br>
                    <a href="signUp.html" style="color:rgba(194, 63, 63, 0.83);">Student</a>&emsp;&emsp;&emsp;&emsp;&emsp;
                    <a href="tutorSignUo.php" style="color:rgba(194, 63, 63, 0.83);">Tutor</a>
                </div>
            </div>

            <script>
                document.getElementById("signup").addEventListener("click", function () {
                    document.querySelector(".popup").style.display = "flex";
                });
                document.querySelector(".close").addEventListener("click", function () {
                    document.querySelector(".popup").style.display = "none";
                });
            </script>
        </form>
    </div>
</body>
</html>