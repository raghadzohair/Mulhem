<?php
  include("studentNav.html");
  require_once('conn.php');
//session_start();
$tutortphone;
//$phone = $_SESSION["phone"];

if(isset($_POST['video'])){
  
  $tutortphone=$_POST['video'];
  }

$query="select * from tutor_db where phoneNo = $tutortphone ";
$query2="SELECT t.name, e.rate,e.evl_dec FROM tutor_db t INNER JOIN tutor_evaluate e ON e.tutPhone = t.phoneNo WHERE t.phoneNo =$tutortphone";
$result2=mysqli_query($conn,$query2);
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

  <br>

  <br><br><br><br> <br><br><br><br>
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
  <div class="myDiv2" style="height: 400px;">
    <h2 align="center">Tutor Video <br></h2>


    <?php
        $tutname;
      while ($rows=$result->fetch_assoc()) {
        $tutname=$rows['name'];
        ?>
    <br>
    <video width="520" height="300" controls id="vv">
      <source src="videos/<?php echo $rows['video']; ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <?php
      }
      ?>

  </div>
  <br><br><br><br><br>




</body>


</html>