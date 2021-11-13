<!DOCTYPE html>
<html>

<head>
    <title>مـُـلهـِم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/form.css">

</head>
<body>

    <br>
    <div>
        <h2 align="center">
            Hi!..<br><br> Welcome to Mulhem
        </h2>

    </div>
    <br><br>

    <div class="myDiv2">
        <h2 align="center">Create New Acount <br></h2>
        <br>
        <form method="POST" action="load.php" id="form" enctype = "multipart/form-data" ><p>
                <label>Name:&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="uname" name="uname" type="text" size="30" style="font-size: 20px;" placeholder="Enter your name" required><br><br>
                </label>

                <label>Phone Number:&emsp;&nbsp;&nbsp;
                    <input id="phoneNum" name="phone" type="text" size="30" style="font-size: 20px;"
                        placeholder="Enter your Phone Number" pattern=".{10,}" title="Mobile Number must be 10 digit"required><br><br>
                </label>

                <label>Email:&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="email" name="email" type="email" size="30" style="font-size: 20px;"placeholder="Enter your Email" required><br><br>
                </label>

                <label>Password:&emsp;&emsp;&emsp;&ensp;
                    <input type="password" size="30" style="font-size: 20px;" placeholder="Enter your Password" id="psw"
                        name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required><br><br>
                </label>

                <label>Gender:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                    <input type="radio" name="gender" value="Female">Female &emsp;&emsp;&emsp;&emsp;
                    <input type="radio" name="gender" value="Male"> Male&emsp;&emsp;&emsp;&emsp;&emsp; <br><br>
                </label>

                <label style="float: left;">&emsp;&emsp;Enter a description of yourself:</label><br><br>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <textarea name="tutordescription" rows="5" cols="43" style="color: #4C4B4B;"placeholder="write here" required></textarea><br><br>
                <label>&emsp;&emsp;Upload a video clip about yourself:</label>&emsp;&emsp;
                <input type="file" id="hidden-Button" hidden ="hidden" name="file">
                <button type="button" id="custom-button" >Choose a file</button>
                <span id="custom-text">No file chosen, yet.</span> <br><br>
                <script type="text/javascript">
                    var hiddenButt = document.getElementById("hidden-Button");
                    var customButt = document.getElementById("custom-button");
                    var customText = document.getElementById("custom-text");
                    customButt.addEventListener("click", function () {
                        hiddenButt.click();
                    });
                    hiddenButt.addEventListener("change", function () {
                        if (hiddenButt.value) {
                            customText.innerHTML = hiddenButt.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/
                            )[1];
                        } else {
                            customText.innerHTML = "No file chosen, yet.";
                        }

                    });
                </script>

                <label>&emsp;&emsp;Upload Your Certificates</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="file" id="hidden-Button2" hidden ="hidden" name="qualificate" />
                <button type="button" id="custom-button2" >Choose a file</button>
                <span id="custom-text2" >No file chosen, yet.</span> <br><br>
                <script type="text/javascript">
                    var hiddenButt2 = document.getElementById("hidden-Button2");
                    var customButt2 = document.getElementById("custom-button2");
                    var customText2 = document.getElementById("custom-text2");
                    customButt2.addEventListener("click", function () {
                        hiddenButt2.click();
                    });
                    hiddenButt2.addEventListener("change", function () {
                        if (hiddenButt2.value) {
                            customText2.innerHTML = hiddenButt2.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/
                            )[1];
                        } else {
                            customText2.innerHTML = "No file chosen, yet.";
                        }

                    });
                </script>

                <input type="checkbox" name="optradio" required>By signing up you're completely
                agree on our <a href="url" style="text-decoration: none">terms &
                    privacy&ensp;&emsp;&emsp;&ensp;&emsp;</a>
                <br><br>
                <a href="url" style="text-decoration: none">Already have an account?</a>
                <a href="tutroLogin.php"
                    style="color:#9e9797;">Login</a>&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&ensp;&emsp;&emsp;
            </p>

            <button class="button"  type="submit" name="upload">Sign Up</button>
            <button class="button" type="reset" style="margin: 20px -10px;">Cancel</button>

        </form>
    </div>
</body>
</html>
