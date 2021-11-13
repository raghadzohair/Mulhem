<?php
require_once('conn.php');

include("tutorNav.html");
session_start();

$phone = $_SESSION["phone"];
$query="select * from tutor_db where phoneNo = $phone ";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
$result=mysqli_query($conn,$query);

if(isset($_POST['update'])){
    $name = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($tmp, "videos/".$name);
    
   $query2 = "UPDATE tutor_db SET name='$_POST[name]', tutor_email='$_POST[email]' , password='$_POST[psw]', description='$_POST[tutordescription]' ,video='$name'  WHERE phoneNo = $phone ";
    
   $result2=mysqli_query($conn,$query2);
     if($result2){
         echo '<script type ="text/javascript"> alert("Data Update")</script>';
         header("Location: acountSesttings.php");
     } 
     else{
         echo '<script type ="text/javascript"> alert("Data Not Update")</script>';
     }}  
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
        <h2 align="center">Update My Acount <br></h2>
        <br>
        <form method="POST" id="form" enctype="multipart/form-data"> <p><br>
        <?php 
        while ($rows=$result->fetch_assoc()) {
        ?>
                <label>&ensp;Name:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="uname" name="name" type="text" size="30" value="<?php echo $rows['name'];?>"style="font-size: 20px;" required><br><br>
                </label>

                <label>Phone Number:&emsp;&nbsp;&nbsp;
                    <input id="phoneNum" name="phone" type="text" size="30"value="<?php echo $rows['phoneNo'];?>" style="font-size: 20px;"  required> <br><br>
                </label>
        
                <label>&ensp;Email:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="email" name="email" type="email" size="30" value="<?php echo $rows['tutor_email'];?>"style="font-size: 20px;" required><br><br>
                </label>

                <label>&ensp;Password:&emsp;&emsp;&emsp;&emsp;
                    <input type="password" size="30" style="font-size: 20px;" id="psw" name="psw"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="<<?php echo $rows['password'];?>"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required> <br><br>
                </label>

                <label style="float: left;">&emsp;&ensp;&emsp;Enter a description of yourself:</label><br><br>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <textarea id="tutordescription" name="tutordescription"
                    rows="5" cols="43" style="color: #4C4B4B;" placeholder="write here"><?php echo $rows['description'];?></textarea><br><br></label>

                <label>&ensp;Video about yourself:&emsp;&emsp;&emsp;&emsp;&ensp;</label>&emsp;&emsp;&emsp;
                <input type="file" id="hidden-Button" hidden="hidden" name="file">
                <button type="button" id="custom-button">Choose a file</button>
                <span id="custom-text">
                    <?php echo $rows['video'];?>
                </span> <br><br>
                <script type="text/javascript">
                    var hiddenButt = document.getElementById("hidden-Button");
                    var customButt = document.getElementById("custom-button");
                    var customText = document.getElementById("custom-text");
                    customButt.addEventListener("click", function () {
                        hiddenButt.click();
                    });
                    hiddenButt.addEventListener("change", function () {
                        if (hiddenButt.value) {
                            customText.innerHTML = hiddenButt.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/
                            )[1];
                        } else {
                            customText.innerHTML = "No file chosen, yet.";
                        }
                    });
                </script>
                <?php
        }
        ?>
            </p>
            <button class='button' name="update" type="submit" style="margin-top: 50px ">Update</button>
            <button class="button" style="margin: 40px -10px; margin-top: 50px ">Cancel</button>
        </form>
    </div>
</body>
</html>