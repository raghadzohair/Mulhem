<?php
require_once('conn.php');
session_start();
//$query="select * from scheduleinfo_db order by id desc";
$phone = $_SESSION["phone"];
$query="select * from scheduleinfo_db where phoneNo = $phone ";
//$query="select * from scheduleinfo_db where id='$id'";
$result=mysqli_query($conn,$query);

include("tutorNav.html");
?>


<!DOCTYPE html>
<html>

<head>
    <title>مـُـلهـِم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="assets/css/style.css">



</head>

<body>

    
    <br><br><br><br><br><br>
    <div class="myDiv2">
        <br>
        <h2 align="center">Check Your Sessions!<br></h2>
        <br>
        <?php 
        while ($rows=$result->fetch_assoc()) {
        ?>
        <button class="accordion"><?php echo $rows["subject_name"] ?></button>
        <div class="panel">
            <p><br>Session with the student ... <br>Start at <?php echo $rows['time'] ?><br> Duration is 50 minutes </p>
            <div style="margin-top:10px; text-align:center">
                <a class="btn" href="./tutormeetingjoin.php?id=<?php echo $rows['id'] ?>" target="blank" style="margin:auto;display: block;width:60px">Join</a>
            </div>
            
        </div>
        <?php 
        }
        ?>


        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>

</body>

</html>