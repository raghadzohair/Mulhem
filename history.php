<?php
require_once('conn.php');
include("studentNav.html");
$sql = "SELECT t.name, s.subject_name,s.date FROM tutor_db t INNER JOIN scheduleinfo_db s ON t.phoneNo = s.phoneNo INNER JOIN history h ON s.phoneNo = h.tut_Ph";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>

<head>
  <title>مـُـلهـِم</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!--<link rel="stylesheet" href="assets/css/style.css">-->
  <style>
    *,
ul {
  margin: 100;
  /*هنا لو حطيناه صفر حتزبط المربعات لكن تخرب بعض المقاسات*/
  padding: 0;
  list-style: none;
}
.container {
  width: 1000px;
  height: auto;
  margin: 0 auto;
}

.row {
  width: 1000px;
  height: auto;
  margin: 0 auto;
  position: relative;
}
/*
input {
  display: none;
}
*/
.box-paginacao {
  width: 100%;
  height: auto;
  float: left;
}

.box-paginacao h2 {
  /* Tutors*/
  width: 100%;
  height: auto;
  float: left;
  margin: 0 0 50px;
  text-align: left;
  font-family: Arial, sans-serif;
  font-weight: 400;
  font-size: 1.3em;
  color: #4C4B4B;
}

.box-paginacao .box-vitrines { /* هنا يرفع الازرار اللي فوق*/
  width: 100%;
  height: 280px;
  float: left;
  overflow: hidden;
  position: relative;
}

.box-paginacao ul {
  width: 100%;
  height: auto;
  float: left;
}
.box-paginacao ul li { /* هنا مقاسات المربعات*/
  width: 250px;
  height: 110px;
  float: left;
  margin: 0 0 10px 60px;
  border: 1px;
  border-radius: 30px;
  text-align: left;
  font-family: Arial, sans-serif;
  color: #4C4B4B;
  box-shadow: 0 1px 5px 0 rgba(59, 49, 49, 0.2), 0 5px 19px 0 rgba(0, 0, 0, 0.01);
}

.box-paginacao .vitrine1,
.box-paginacao .vitrine2,
.box-paginacao .vitrine3,
.box-paginacao .vitrine4 {
  width: 100%;
  height: 336px;
  float: left;
  margin-bottom: 33px;
}

.btn-paginacao {
  /*باك قراون ورى الازرار*/
  width: 100%;
  height: auto;
  float: left;
  margin-top: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;

  left: 0;
  bottom: 0;
  
}

.btn-paginacao ul {
  width: auto;
  height: auto;
}

.btn-paginacao ul li {
  width: 30px;
  height: 30px;
  float: left;
  margin: 0 5px 0 0;
  border: 0;
}
.btn-paginacao ul li:last-child {
  margin: 0;
}

.btn-paginacao ul li label {
  /*الازرار*/
  width: 100%;
  height: 30px;
  float: left;
  text-align: center;
  line-height: 30px;
  font-family: Arial, sans-serif;
  font-weight: 400;
  font-size: 1em;
  color: #4C4B4B;
  cursor: pointer;
  border-radius: 50px;
  transition: background-color .25s ease-in-out;
  box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.2), 0 5px 19px 0 rgba(0, 0, 0, 0.01);
}

.btn-paginacao ul li label:hover {
  /* الألوان لما يحط المؤشر*/
  background-color: rgba(194, 63, 63, 0.83);
  color: #F7F4F4;
}

#paginacao1:checked~.box-vitrines>ul {
  transition: transform .7s ease-in-out;
  transform: translateY(0px);
}
#paginacao1:checked~.box-vitrines label[for="paginacao1"] {
  background-color: rgba(194, 63, 63, 0.83);
  color: #F7F4F4;
}

#paginacao2:checked~.box-vitrines>ul {
  transition: transform .7s ease-in-out;
  transform: translateY(-369px);
}

#paginacao2:checked~.box-vitrines label[for="paginacao2"] {
  background-color: rgba(194, 63, 63, 0.83);
  color: #F7F4F4;
}

#paginacao3:checked~.box-vitrines>ul {
  transition: transform .7s ease-in-out;
  transform: translateY(-738px);
}

#paginacao3:checked~.box-vitrines label[for="paginacao3"] {
  background-color: rgba(194, 63, 63, 0.83);
  color: #F7F4F4;
}

#paginacao4:checked~.box-vitrines>ul {
  transition: transform .7s ease-in-out;
  transform: translateY(-1107px);
}

#paginacao4:checked~.box-vitrines label[for="paginacao4"] {
  background-color: rgba(194, 63, 63, 0.83);
  color: #F7F4F4;
}
    </style>
</head>
<body>


  <br><br><br><br><br><br><br><br>

  <!--second part  -->


  <section class="container">

    <p style='font-size: 30px;font-weight: normal; font-family: Arial, sans-serif; color:#4C4B4B'>Recorded Sessions</p>

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

            <li><br>&emsp;

              <i class='fas fa-user-circle' style='font-size:40px;color:#4C4B4B'>
                <lable id="name"
                  style='font-size:20px; font-family: Arial,sans-serif; font-weight: normal;color:rgba(194, 63, 63, 0.83)'>
                  <!--&nbsp;&nbsp;-->
                  <?php 
                echo $rows['name'];?>
                </lable>
              </i>

              
              <lable style='font-size:10px;color:#65B7A9'><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $rows['subject_name'];?></lable>
              <lable style='font-size:10px;color:#4C4B4B'><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $rows['date'];?></lable>

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


</body>

</html>




