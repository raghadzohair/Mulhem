<?php
  include("studentNav.html");
  require_once('conn.php');

  $query="select * from tutor_db";
  $result=mysqli_query($conn,$query);
  $tutortphone;
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
            <input id="searchBox" class="search" type="text" name="name" placeholder="Search">
          </td>
          <td>
            <a href="#"><i class="fa fa-search"></i></a>
          </td>
        </tr>
      </table>
     
    </form>
  </div>

  <!--second part  -->
  <form method="POST">
    <div>
      <section class="container" >

        <p style='font-size: 30px;font-weight: normal; font-family: Arial, sans-serif; color:#4C4B4B'>Mathematics Tutors
        </p><br><br>
        <div class="box-paginacao">
        <!--Numbering to move between tutors-->
          <input style="display: none;" type="radio" name="input-paginacao" id="paginacao1" checked>
          <input style="display: none;" type="radio" name="input-paginacao" id="paginacao2">
          <input style="display: none;" type="radio" name="input-paginacao" id="paginacao3">
          <input style="display: none;" type="radio" name="input-paginacao" id="paginacao4">


          <div class="box-vitrines" >
            <ul>
              <div class="vitrine1">
                <?php 
                while ($rows=$result->fetch_assoc()){?>
                <li><br>&emsp;
                  <i class='fas fa-user-circle' style='font-size:35px;color:#4C4B4B'>
                  <!-- Part 1 Print Tutor name -->
                    <lable id="name"style='font-size:20px;font-family: Arial,sans-serif; font-weight: normal;color:rgba(194, 63, 63, 0.83)'>&nbsp;&nbsp;
                      <?php 
                      echo $rows['name'];?>
                    </lable>
                  </i>
                  <!-- ليه اخترنا الفاليو يكون رقم الجوال-->
                  <label style='font-size:10px;color:#4C4B4B '>
                    <button name="fav" value="<?php echo $rows['phoneNo'];?>" formaction="fav.php" class="fas fa-heart"
                      style="border: none; background-color: inherit; outline: none; color:#4C4B4B"></button>
                  </label><br>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;

                  <!-- Part 2 Calculate & Print Rate -->
                  <?php $y=$rows['phoneNo'];//retrieve tutor number to use it in query
                  // this query to retrieve rate dec from tutor_evaluate tabel and tutor name if math phone number
              $query2="SELECT t.name, e.rate,e.evl_dec FROM tutor_db t INNER JOIN tutor_evaluate e ON e.tutPhone = t.phoneNo WHERE t.phoneNo =$y";
              $result2=mysqli_query($conn,$query2);
              $t1=$t2=$t3=$t4=$t5=0;
              
              while ($rows2=$result2->fetch_assoc()){
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
              //==0 means If the teacher does not have evaluatetion>> Euror (the division is by zero)
              if($t1+$t2+$t3+$t4+$t5!=0){
                $avg = (1*$t1+2*$t2+3*$t3+4*$t4+5*$t5)/($t1+$t2+$t3+$t4+$t5);
                $cast =number_format((int)$avg);
                for ($x = 0; $x <$cast; $x++) {
                   echo "<span class='fa fa-star checked' style ='font-size:10px'></span>";
                  }
                    echo "<label style='font-size:10px'>&nbsp;&nbsp;".number_format((float)$avg, 2, '.', '')."</label>";
                    }
                    ?>

                    <!-- Part 3 Print Tutor description -->
                    <?php
                     echo" <lable style='font-size:8px;color:#65B7A9'><br>&emsp;Math</lable>
                     <p id='des' style='font-size:10px;color:#4C4B4B'>&emsp;". $rows['description']." </p></lable>";
                      ?><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                      
                      <button name="more" value="<?php echo $rows['phoneNo'];?>" formaction="TutorMoreInfo.php"
                    style="border: none;background-color: inherit; outline: none;  color:rgba(194, 63, 63, 0.83); text-decoration: underline;font-family: Arial, sans-serif; ">Reserve</button>
                    
                      <button name="video" value="<?php echo $rows['phoneNo'];?>" formaction="vidoe.php" style="border: none; background-color: inherit; outline: none;  color:rgba(194, 63, 63, 0.83); text-decoration: underline;    font-family: Arial, sans-serif;">More</button>

                </li>
                <?php          
           }
           ?>
              </div>
            </ul>
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
    </div>
  </form>

      </div>

    </div>
</body>

</html>