
<?php
require_once('conn.php');
  $query="select t.name,t.phoneNo,t.description, e.rate from tutor_db t join tutor_evaluate e ON t.phoneNo =e.tutPhone";
  $result=mysqli_query($conn,$query);
  $tutortphone;
  
  //$query2="SELECT t.name, e.rate,e.evl_dec FROM tutor_db t INNER JOIN tutor_evaluate e ON e.tutPhone = t.phoneNo WHERE t.phoneNo =$tutortphone";
  //$result2=mysqli_query($conn,$query2);

  require_once('DB.php');
$db=new DB();
$data= $db->searchData(" ");
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
<form action="search.php" method ="post">
    <table class="elementContainer2">
      <tr>
        <td>
          <input id ="searchBox" class="search" type="text" 
          name ="name" placeholder="Search"
           oninput=search(this.value)>

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
  
<!--second part  -->
    
<form method="POST">

<section class="container">

    <p style='font-size: 30px;font-weight: normal; font-family: Arial, sans-serif; color:#4C4B4B'>Mathematics Tutors
      
    </p>

    <br><br>

    <div class="box-paginacao">

      <input style="display: none;" type="radio" name="input-paginacao" id="paginacao1" checked>
      <input style="display: none;"type="radio" name="input-paginacao" id="paginacao2">
      <input style="display: none;" type="radio" name="input-paginacao" id="paginacao3">
      <input style="display: none;" type="radio" name="input-paginacao" id="paginacao4">
 

      <div class="box-vitrines">
        <ul>

          <div class="vitrine1">
          
         
            <?php
$lasttutor=null;
$t1=$t2=$t3=$t4=$t5=0;

            while ($rows=$result->fetch_assoc())
           {
             ?>
              <li><br>&emsp;
              <?php
             
             if($rows['phoneNo']!==$lasttutor){
               echo $rows['name'];
               $lasttutor=$rows['phoneNo'];
             }
if($rows['rate']==1)
$t1++;
elseif($rows['rate']==2)
$t2++;
elseif($rows['rate']==3)
$t3++;
elseif($rows['rate']==4)
$t4++;
else
$t5++;
$avg = (1*$t1+2*$t2+3*$t3+4*$t4+5*$t5)/($t1+$t2+$t3+$t4+$t5);
          
echo "<br>".number_format((float)$avg, 2, '.', '');
             ?>

          
          

          
         
           
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
                &nbsp;&nbsp;<?php 
                echo $rows['name'];?></lable>
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
  </script></p>
<!---->
<br><br>
<br><br><br>
<hr>
<br>
<p style="float: left; color:rgba(194, 63, 63, 0.83);">Schedule</p>




</div>


</div>
  <script>
    document.getElementById("pop").addEventListener("click",function(){
      document.querySelector(".popup").style.display="flex";
    });

    document.querySelector("#close").addEventListener("click",function(){
      document.querySelector(".popup").style.display="none";
    });


  </script>
  

</body>
</html>