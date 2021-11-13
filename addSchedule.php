<?php
 include("tutorNav.html");
?>

<!DOCTYPE html>
<html>

<head>
    <title>مـُـلهـِم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <br><br><br><br><br><br><br><br>
    <div class="myDivPlus">
        <h2 align="center">Add Your Schedule<br></h2>
        <br><br><br>
        <br>
        <form method="POST">
            <p>
                <label>Subject Name:&emsp;&emsp;&emsp;&emsp;
                    <select id="sub" name="sub">
                        <option value="default">Choose one</option>
                        <option value="Math">Math</option>
                    </select>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<br><br>
                </label>

                <label for="date">&ensp;Date:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="date" id="date" name="date" required>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;
                    <br><br>
                </label>

                <label>&emsp;Time:&ensp;&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="time" id="appt1" name="appt1" required>
                </label>

                <label>&ensp;&ensp;&ensp;To:
                    <input type="time" id="appt2" name="appt2" required>&emsp;&ensp;&ensp;
                </label><br><br>

                <button class="buttonPlus" type="submit" formaction="ScheduleInfo.php">+</button>
        </form>
    </div>
</body>
</html>