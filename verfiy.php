<?php
  include("adminNav.html");
 require_once('conn.php');

$sql;
if(isset($_POST['phone'])){
  $phone =$_POST['phone'];
  $sql = "SELECT * FROM admin_db where phoneNo = $phone";

}

$result=mysqli_query($conn,$sql);
  

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
  <script src="https://smtpjs.com/v3/smtp.js"></script>

</head>

<body>
  <form method="post">

    <br><br><br><br> <br><br><br>

    <div class="myDiv2" style="height: 1000px">
      <br>
      <?php
      while ($rows=$result->fetch_assoc()) {
        echo "<h2 align='center'>".$rows['name']."<br><br></h2>";
        
        ?>


      <video width="520" height="300" controls id="vv">
        <source src="videos/<?php echo $rows['video']; ?>" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <br><br>
      <hr>
      <br>
      <iframe src="qualificates/<?php echo $rows['Qualification']; ?>" height="500" width="520"
        title="file"></iframe><br>
      <button class="btn" formaction="TutorInfo.php" value="<?php echo $rows['phoneNo']; ?>" type="submit" name="Accept"
        style="border-radius: 20px; width: 70px;height: 42px;text-align: center;" onclick="sendEmail()">Accept</button>
      <button class="btn" value="<?php echo $rows['phoneNo']; ?>" type="submit" name="UnAccept"
        style="border-radius: 20px; margin-left: -15px;width: 70px;height: 42px;text-align: center;"
        onclick="sendEmail2()" formaction="unacceptTutor.php">Unaccept</button>

      <?php 
 $tut_email=$rows['tutor_email'];         
      }
      ?>

    </div>
    <br>
    <br>


  </form>
  <script type="text/javascript">
    function sendEmail() {
      Email.send({
        SecureToken: "a181aef5-3796-401a-9de1-77a4c31cbfea ",
        To: "<?php echo $tut_email ?>",
        From: "mulhemfcit@gmail.com",
        Subject: "Mulhem Site",
        Body: "Thank you for waiting.. You have been accepted on an Mulhem site. You can now log in to your account"
      }).then(
        message => alert(message)
      );
    }

    function sendEmail2() {
      Email.send({
        SecureToken: "a181aef5-3796-401a-9de1-77a4c31cbfea ",
        To: "<?php echo $tut_email ?>",
        From: "mulhemfcit@gmail.com",
        Subject: "Mulhem Site",
        Body: "Thank you for waiting.. You are not accepted into the Mulhem website. "
      }).then(
        message => alert(message)
      );
    }
  </script>

</body>


</html>