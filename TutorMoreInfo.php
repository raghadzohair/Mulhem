<?php
require_once('conn.php');
//session_start();
$tutortphone;

//$phone = $_SESSION["phone"];

include("studentNav.html");

if(isset($_POST['more'])){
  
$tutortphone=$_POST['more'];
}
$query="select * from pre_scheduleinfo_db where phoneNo = $tutortphone ";
$result=mysqli_query($conn,$query);
require_once('DB.php');
$db=new DB();
$data= $db->searchData("  ");
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

  <br><br><br><br><br><br><br><br>
  <div class="searchButton" style="margin-top: 60px;">
<form action="search.php" method ="post">
    <table class="elementContainer2">
      <tr>
        <td>
          <input id ="searchBox" class="search" type="text" 
          name ="name" placeholder="Search">

        </td>
        <td>

          <a href="#"><i class="fa fa-search"></i></a>
        </td>
      </tr>
     

    </table>
    <ul id="dataViewer">
       <?php foreach($data as $i){?>
        <li><?php echo $i["name"];?></li>
<?php
       }
       ?>
</ul>
<script src="main.js"></script>

</form>
  </div>
  <div class="divSchedule">

    <a herf="tutor.php"><span class="far fa-window-close" id="close"
        style="align-items: left; color: #4c4b4c; justify-content: center; text-align: center"></span></a>
    <h2 align="center">Make an Appointment..<br></h2>
    <br> 
    <form method="GET">
    <?php
      while ($rows=$result->fetch_assoc()) {
        ?>
      &emsp;&emsp;&emsp;
      <label>Subject:
        <?php echo $rows['subject_name'];?>
      </label>
      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      <label>Date:
        <?php echo $rows['date'];?><br>
      </label>
      &emsp;&emsp;&emsp;
      <label>Start at:
        <?php echo $rows['time'];?>
      </label>
      &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      <label>End at:
        <?php echo $rows['end_time'];?>
      </label>
      &emsp;&emsp;&emsp;&emsp;

      <button class="btnReservation" name="id"
       value="<?php echo $rows['id'] ?>" type="submit" 
       formaction="sessionInfo.php">Reservation</button>

    <!--  <a class="btnReservation"  href="./studentmeetingjoin.php?id=
 
    " target="blank">Reservation</a>-->
      <br><br>
    <?php          
      }
      ?>
</form>
  </div>


</body>

</html>