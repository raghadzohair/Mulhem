<?php
require_once('conn.php');
session_start();
$studentphone = $_SESSION["studentphone"];

$query="select name,phoneNo, description, Fav_id from tutor_db t inner join favorite f on t.phoneNo = f.tutorPhone where studentPhone  =$studentphone";
$result=mysqli_query($conn,$query);

require_once('DB.php');
$db=new DB();
$data= $db->searchData("          "); 
include("studentNav.html");
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
    <form action="search.php" method="post">
      <table class="elementContainer2">
        <tr>
          <td>
            <input id="searchBox" class="search" type="text" name="name" placeholder="Search"
              oninput=search(this.value)>

          </td>
          <td>

            <a href="#"><i class="fa fa-search"></i></a>
          </td>
        </tr>


      </table>
      <ul id="dataViewer">
        <?php foreach($data as $i){?>
        <li>
          <?php echo $i["name"];?>
        </li>
        <?php
       }
       ?>
      </ul>
      <script src="main.js"></script>

    </form>
  </div>

  <!--second part  -->

  <form method="POST">

    <section class="container">

      <p style='font-size: 30px;font-weight: normal; font-family: Arial, sans-serif; color:#4C4B4B'>My Favorite Tutors

      </p>
      <br>
      <br>

      <div class="box-paginacao">

        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao1" checked>
        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao2">
        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao3">
        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao4">


        <div class="box-vitrines">
          <ul>

            <div class="vitrine1">


              <?php

            while ($rows=$result->fetch_assoc())
           {
             
             ?>

              <li><br>&emsp;

              <i class='fas fa-user-circle' style='font-size:35px;color:#4C4B4B'>
                  <lable id="name"
                    style='font-size:20px; font-family: Arial,sans-serif; font-weight: normal;color:rgba(194, 63, 63, 0.83)'>
                    &nbsp;&nbsp;
                    <?php 
                echo $rows['name'];?>
                  </lable>
                </i>
                <lable style='font-size:10px;color:#4C4B4B'>
                  <button name="fav" value="<?php echo $rows['phoneNo'];?>" formaction="fav.php" class="fas fa-heart"
                    style="border: none;
  background-color: inherit; outline: none; color:#4C4B4B"></button>

                </lable>
                <br>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                <?php $y=$rows['phoneNo'];
              $query2="SELECT t.name, e.rate,e.evl_dec FROM tutor_db t INNER JOIN tutor_evaluate e ON e.tutPhone = t.phoneNo WHERE t.phoneNo =$y";
 $result2=mysqli_query($conn,$query2);
 
 $t1=$t2=$t3=$t4=$t5=0;
while ($rows2=$result2->fetch_assoc())
          {
              //echo "Student ".$increment.": ";
/*for ($x = 0; $x <$rows['rate']; $x++) {
 
 echo "<span class='fa fa-star checked'></span>";
 
}*/
if($rows2['rate']==1)
$t1++;
elseif($rows2['rate']==2)
$t2++;
elseif($rows2['rate']==3)
$t3++;
elseif($rows2['rate']==4)
$t4++;
else
$t5++;

          }
          if($t1+$t2+$t3+$t4+$t5!=0){
            
          $avg = (1*$t1+2*$t2+3*$t3+4*$t4+5*$t5)/($t1+$t2+$t3+$t4+$t5);
         
          $cast =number_format((int)$avg);

          for ($x = 0; $x <$cast; $x++) {
 
           echo "<span class='fa fa-star checked' style ='font-size:10px'></span>";
          }

          echo "<label style='font-size:10px'>&nbsp;&nbsp;".number_format((float)$avg, 2, '.', '')."</label>";

        }
 ?>




                <?php
               echo" <lable style='font-size:10px;color:#65B7A9'><br>&emsp;Math</lable>
                  <p id='des' style='font-size:10px;color:#4C4B4B'>&emsp;". $rows['description'].
                   " </p></lable>";
            ?>
                <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <!-- <a href="TutorMoreInfo.php" name="more" value="<?php echo $rows['phoneNo'];?>" style='font-size: 10px;  color:rgba(194, 63, 63, 0.83);font-weight: normal; font-family: Arial, sans-serif'>more</a>-->
                <button name="more" value="<?php echo $rows['phoneNo'];?>" formaction="TutorMoreInfo.php"
                  style="border: none;
  background-color: inherit; outline: none;  color:rgba(194, 63, 63, 0.83); text-decoration: underline;font-family: Arial, sans-serif; ">Reserve</button>


                <!--  <a href="vidoe.php" id="pop" style='font-size: 10px;color:rgba(194, 63, 63, 0.83);font-weight: normal; font-family: Arial, sans-serif'>vidoe</a>-->
                <button name="video" value="<?php echo $rows['phoneNo'];?>" formaction="vidoe.php"
                  style="border: none;
  background-color: inherit; outline: none;  color:rgba(194, 63, 63, 0.83); text-decoration: underline;    font-family: Arial, sans-serif;">More</button>

              </li>
              <?php          
           }
           ?>
            </div>


          </ul>

          <!--<div lass="btn-paginacao">-->
          <div class="btn-paginacao">

            <ul>
              <li><label for="paginacao1">1</label></li>
              <li><label for="paginacao2">2</label></li>
              <li><label for="paginacao3">3</label></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </form>

  <?php

            while ($rows=$result->fetch_assoc())
           {
             ?>
  <li><br>&emsp;

    <i class='fas fa-user-circle' style='font-size:40px;color:#4C4B4B'>
      <lable id="name"
        style='font-size:20px; font-family: Arial,sans-serif; font-weight: normal;color:rgba(194, 63, 63, 0.83)'>
        &nbsp;&nbsp;
        <?php 
                echo $rows['name'];?>
      </lable>
    </i>
    <?php          
           }
           ?>

    <div class="popup">



      <div class="popup-content">
        <span class="far fa-window-close" id="close"></span>
        <span class="fa fa-user-circle" style="font-size: 60px; float: left; color: #4C4B4B"></span>
        <p style="float: left; color: #4C4B4B; font-family: Arial; margin-top:30px">



          <script>
            document.write(document.getElementById("name").innerHTML);
          </script>
        </p>
        <span class="fas fa-comments" style="float: right;"></span>
        <span class="fas fa-heart" style="float: right;">&ensp; </span>
        <div class="videoDiv">

          <p>
            vidoe
          </p>
        </div>
        <br>

        <p style="float: left; color: #4C4B4B; font-family: Arial">
          <script>
            document.write(document.getElementById("des").innerHTML);
          </script>
        </p>
        <!---->
        <br><br>
        <br><br><br>
        <hr>
        <br>
        <p style="float: left; color:rgba(194, 63, 63, 0.83);">Schedule</p>




      </div>


    </div>
    <script>
      document.getElementById("pop").addEventListener("click", function () {
        document.querySelector(".popup").style.display = "flex";
      });

      document.querySelector("#close").addEventListener("click", function () {
        document.querySelector(".popup").style.display = "none";
      });


    </script>


</body>

</html>