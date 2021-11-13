<?php
require_once('conn.php');

include("adminNav.html");

$sql = "SELECT * FROM admin_db ";
$result=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>

<head>
  <title>مـُـلهـِم</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="assets/css/historystyle.css">

</head>

<body>
  <br><br><br><br><br><br><br><br>


  <form method="POST">
    <section class="container">
      <p style='font-size: 30px;font-weight: normal; font-family: Arial, sans-serif; color:#4C4B4B'>&emsp;Tutors</p>
      <br>

      <div class="box-paginacao">

        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao1" checked>
        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao2">
        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao3">
        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao4">
        <br>

        <div class="box-vitrines">
          <ul>
            <div class="vitrine1">
              <?php

            while ($rows=$result->fetch_assoc())
           {
             
             ?>

              <button name="phone" value="<?php echo $rows['phoneNo']; ?>" formaction="verfiy.php"
                style="border: none; background-color: inherit; outline: none; cursor:pointer">
                <li><br>&emsp;

                  <i class='fas fa-user-circle' style='font-size:40px;color:#4C4B4B'>
                    <lable id="name" style='font-size:20px; font-family: Arial,sans-serif; font-weight: normal;color:rgba(194, 63, 63, 0.83)'>
                      
                      <?php 
                echo $rows['name'];?>
                    </lable>
                  </i>
                </li>
              </button>
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
    <!--<iframe src="Poster-Group 12.pdf" height="500" width="400" title="file"></iframe>-->
  </form>
</body>
</html>