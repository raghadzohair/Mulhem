<?php
require_once('conn.php');
include("studentNav.html");
  require_once('DB.php');
  $query="select * from tutor_db";
  $result=mysqli_query($conn,$query);


  $name=$_POST['name'];
  $con = new DB();
  $data= $con->searchData($name); 
  $string = json_encode($data);
  $array = json_decode($string,true);
echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <br><br><br><br><br><br>
  <form method="POST">
  <section class="container">

    <p style='font-size: 30px;font-weight: normal; font-family: Arial, sans-serif; color:#4C4B4B'>Search Results

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

          for ($i=0; $i<count($array); $i++) 
           { 
             ?>
            <li><br>&emsp;

            <i class='fas fa-user-circle' style='font-size:35px;color:#4C4B4B'>
            <lable id="name"style='font-size:20px;font-family: Arial,sans-serif; font-weight: normal;color:rgba(194, 63, 63, 0.83)'>&nbsp;&nbsp;

                  <?php 
                $searchname=$array[$i]['name'];
        
                echo $searchname;
                $q="select * from tutor_db where name ='$searchname'";
                $result=mysqli_query($conn,$q)

                ?>
                </lable>

              </i>
              <lable style='font-size:10px;color:#4C4B4B'>
            <button name="fav" value="<?php echo $rows['phoneNo'];?>" formaction ="fav.php" class="fas fa-heart" style ="border: none; background-color: inherit; outline: none; color:#4C4B4B"></button>  
          </lable> <br>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
              

              <?php
            while ($rows=$result->fetch_assoc())
            {
              ?>
             
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
            <button  name="more" value="<?php echo $rows['phoneNo'];?>" formaction ="TutorMoreInfo.php" style ="border: none;
  background-color: inherit; outline: none;  color:rgba(194, 63, 63, 0.83); text-decoration: underline;font-family: Arial, sans-serif; ">Reserve</button>

           
          <!--  <a href="vidoe.php" id="pop" style='font-size: 10px;color:rgba(194, 63, 63, 0.83);font-weight: normal; font-family: Arial, sans-serif'>vidoe</a>-->
            <button name="video" value="<?php echo $rows['phoneNo'];?>" formaction ="vidoe.php"style ="border: none;
  background-color: inherit; outline: none;  color:rgba(194, 63, 63, 0.83); text-decoration: underline;    font-family: Arial, sans-serif;" >More</button>

            </li>

              <?php
            }
?>

           
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
</body>

</html>