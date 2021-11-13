<?php
require_once('conn.php');
//to print some of tutors in welcome page
  $query="select * from tutor_db";
  $result=mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html>

<head>
    <title>مـُـلهـِم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="assets/css/welcomeStyle.css">

</head>

<body>


    <nav class="header">

        <ul>
            <li>
                <a herf="welcome.html" style="margin-top: -50px; ">
                    <p><img src="assets/img/logo.jpeg" alt="computer" width="100" height="80"></p>
                </a>
            </li>
            </li>
        </ul>


        <ul style="float: right;">
            <li><a href="">Support</a></li>

            <li><a href="tutroLogin.php">Log in</a></li>
            <li><a herf="#" class="button">Sign up</a>
                <ul>
                    <li><a href="signUp.html">As students</a></li>
                    <li><a href="tutorSignUo.php">As tutors</a></li>
                </ul>

            </li>


        </ul>

    </nav>



    <br><br><br><br><br><br>




    <table width="100%">
        <tr>
            <!--first part  -->
            <td width="40%" colspan=2 align="center"><img src="assets/img/computer.jpeg" alt="computer" width="300"
                    height="300"></td>
            <td><label class="welcomeText1"><br><br>Enjoy an interactive sessions<br>by using Mulhem.</label>
                <h2 class="welcomeText2">A website that provides the opportunity for tutors to present scientific
                    content to interested students.</h2><br>
                <a href="signUp.html"> <button class="button">Get Started</button>
                </a>
            </td>

        </tr>

        <!--second part  -->
        <tr>

            <td colspan="4">
                <br><br><br><br><br><br>
                <section class="container">

                    <h2 style=' font-family: Arial, sans-serif; color:#4C4B4B'>Our Professional Tutors</h2>
                    <br><br>
                    <div class="box-paginacao">
                        <!--Numbering to move between tutors-->

                        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao1" checked>
                        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao2">
                        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao3">
                        <input style="display: none;" type="radio" name="input-paginacao" id="paginacao4">


                        <div class="box-vitrines">
                            <ul>

                                <div class="vitrine1">


                                    <?php
                                    $num=0;
                                    //only to retrieve three tutors
                                    while (($rows=$result->fetch_assoc()) &&($num<3))
                                    {?>

                                    <li><br>&emsp;

                                    <i class='fas fa-user-circle' style='font-size:35px;color:#4C4B4B'>
                                            <!-- Part 1 Print Tutor name -->
                                            <lable id="name"style='font-size:20px;font-family: Arial,sans-serif; font-weight: normal;color:rgba(194, 63, 63, 0.83)'>&nbsp;&nbsp;

                                                <?php 
                                                echo $rows['name'];?>
                                            </lable>
                                        </i>
                                        <label style='font-size:10px;color:#4C4B4B '>
                                            <button name="fav" value="<?php echo $rows['phoneNo'];?>"
                                                formaction="fav.php" class="fas fa-heart"
                                                style="border: none; background-color: inherit; outline: none; color:#4C4B4B"></button>
                                        </label> <br>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                                        <!-- Part 2 Calculate & Print Rate -->
                                        <?php $y=$rows['phoneNo'];//retrieve tutor number to use it in query
                                       // this query to retrieve rate dec from tutor_evaluate tabel and tutor name if math phone number
                                       $query2="SELECT t.name, e.rate,e.evl_dec FROM tutor_db t INNER JOIN tutor_evaluate e ON e.tutPhone = t.phoneNo WHERE t.phoneNo =$y";
                                        $result2=mysqli_query($conn,$query2);
                                        $t1=$t2=$t3=$t4=$t5=0;
                                        while ($rows2=$result2->fetch_assoc())
                                        {
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
                                       $num++;
                                     }
                                      ?>
                                </div>


                            </ul>
                        </div>
                    </div>
                </section>
            </td>
        </tr>

        <tr>

            <!--third part  -->
            <td colspan="2">
                <label class="welcomeText3">
                    <br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Get the most out &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;of
                    your classes<br></label>
                <h2 class="welcomeText4">Video recordings of every class allow you to watch and rewatch every concept
                    you learn. </h2>
            </td>

            <td class="mobilePic" colspan="2" align="center"><img src="assets/img/mobile.jpeg" alt="pic" width="200"
                    height="250">
            </td>
        </tr>

        <tr>
            <td class="SchedulePic" colspan="2" align="center"><img src="assets/img/Schedule.jpeg" alt="pic" width="200"
                    height="200"></td>
            <td colspan="2">
                <label class="welcomeText6">
                    <br><br>&emsp;&emsp;&emsp;Work on your own schedule<br></label>
                <h2 class="welcomeText5">Reservation let you book class with your favorite tutors,<br> so you always get
                    the tutor you want at the time you want</h2>
            </td>
        </tr>

        <tr>
            <td><br><br><br><br><br><br><br><br></td>
        </tr>

    </table>

    <div style="background-color: rgba(186, 224, 255, 0.349); width:100%;">
        <br>
        <p
            style=" text-align: center;color: #4C4B4B; text-decoration: none; font-family: Arial, sans-serif; font-size=16px;">
            نحط اي جمله</p>
        <br>
        <h2 style=" text-align: center; "><i class="fas fa-heart"
                style=" text-align: center; font-size: 40px; color: rgba(194, 63, 63, 0.60);  "></i>
            <h2>
                <br>
                <p style="text-align:center;"><a href="mailto:mulhemfcit@gmail.com"
                        style=" text-align:center;text-decoration: none; font-family: Arial, sans-serif;font-weight: lighter; font-size:16px; color: #4C4B4B;">Contact:mulhemfcit@gmail.com</a>
                </p>



    </div>


    <!--movw to the top -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">&uarr;</button>
    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>









</body>

</html>