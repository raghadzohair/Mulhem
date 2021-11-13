<?php
require_once('conn.php');
session_start();

$studentphone = $_SESSION["studentphone"];
$tutorphone = $_SESSION["phone"];

if(isset($_POST['Send'])){
$rate = $_COOKIE['rate1'];

$sql = "INSERT INTO tutor_evaluate (tutPhone, evl_dec, rate) VALUES ('$tutorphone','".$_POST["comment"]."','$rate')";
$query="DELETE s.* ,f.* FROM session_db s INNER JOIN scheduleinfo_db f ON s.id = f.id WHERE (s.phoneNo = $studentphone)";

 if ($conn->query($sql) === TRUE && $conn->query($query) === TRUE) {
  header("Location: mySession.php");
} else {
  echo 'erorr';
 }
  }
  
  
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

  <style type="text/css">
    .rating-stars a {
      display: inline-block;
      width: 64px;
      height: 64px;
      background-repeat: no-repeat;
      background-image: url("data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IgogICB3aWR0aD0iNjRweCIgaGVpZ2h0PSI2NHB4IiB2aWV3Qm94PSIwIDAgNjQgNjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDY0IDY0IiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSJub25lIiBzdHJva2U9IiNBN0E5QUMiIHN0cm9rZS13aWR0aD0iNCIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBwb2ludHM9IjMxLjg2Niw2LjYxOCA0MC4wOSwyMy4yODEgNTguNDc5LDI1Ljk1MyA0NS4xNzIsMzguOTIzIDQ4LjMxMyw1Ny4yMzkgMzEuODY2LDQ4LjU5MiAxNS40MTgsNTcuMjM5IDE4LjU2LDM4LjkyMyA1LjI1MywyNS45NTMgMjMuNjQyLDIzLjI4MSAiLz48L3N2Zz4=");
      outline: none;
      text-align: center;

    }

    .rating-stars a.hover {
      background-image: url("data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeD0iMHB4IiB5PSIwcHgiCiAgIHdpZHRoPSI2NHB4IiBoZWlnaHQ9IjY0cHgiIHZpZXdCb3g9IjAgMCA2NCA2NCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNjQgNjQiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwb2x5Z29uIGZpbGw9IiM1MUFFQ0QiIHN0cm9rZT0iIzUxQUVDRCIgc3Ryb2tlLXdpZHRoPSI0IiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHBvaW50cz0iMzEuODY2LDYuNjE4IDQwLjA5LDIzLjI4MSA1OC40NzksMjUuOTUzIDQ1LjE3MiwzOC45MjMgNDguMzEzLDU3LjIzOSAzMS44NjYsNDguNTkyIDE1LjQxOCw1Ny4yMzkgMTguNTYsMzguOTIzIDUuMjUzLDI1Ljk1MyAyMy42NDIsMjMuMjgxICIvPjwvc3ZnPgo=");
    }

    .rating-stars a.selected {
      background-image: url("data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IgogICB3aWR0aD0iNjRweCIgaGVpZ2h0PSI2NHB4IiB2aWV3Qm94PSIwIDAgNjQgNjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDY0IDY0IiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkVDMjBGIiBzdHJva2U9IiNGRUMyMEYiIHN0cm9rZS13aWR0aD0iNCIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBwb2ludHM9IjMxLjg2Niw2LjYxOCA0MC4wOSwyMy4yODEgNTguNDc5LDI1Ljk1MyA0NS4xNzIsMzguOTIzIDQ4LjMxMyw1Ny4yMzkgMzEuODY2LDQ4LjU5MiAxNS40MTgsNTcuMjM5IDE4LjU2LDM4LjkyMyA1LjI1MywyNS45NTMgMjMuNjQyLDIzLjI4MSAiLz48L3N2Zz4=");
    }

    .container {
      display: flex;
      justify-content: center;
      line-height: 1em;
    }
  </style>
</head>

<body>
  <form method="POST">
    <br><br>
    <br><br>
    <br><br>
    <br><br>

    <div class="container">
      <div class="rating-stars">
        <h2 style='color: #4C4B4B'>&emsp;Share Your Experience</h2>

        <br><br>
        <a href="" data-rating="1"></a><a href="" data-rating="2"></a><a href="" data-rating="3"></a><a href="" data-rating="4"></a><a href="" data-rating="5"></a>
        
        <br><br>&nbsp;&nbsp;&nbsp;

        <textarea name="comment" rows="6" cols="40" placeholder="Enter comment here..."></textarea>

        <br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

        <button class="btn" type="submit" name="Send" style="border-radius: 20px;">Send</button>
      </div>
    </div>
  </form>

  <script>
    function ready(fn) {
      if (document.readyState != 'loading') {
        fn();
      } else {
        document.addEventListener('DOMContentLoaded', fn);
      }
    }
    var selectedRating = 0; var rate;
    ready(function () {
      function addClass(el, className) {
        if (typeof el.length == "number") {
          Array.prototype.forEach.call(el, function (e, i) { addClass(e, className) });
          return;
        }
        if (el.classList)
          el.classList.add(className);
        else
          el.className += ' ' + className;
      }
      function removeClass(el, className) {
        if (typeof el.length == "number") {
          Array.prototype.forEach.call(el, function (e, i) { removeClass(e, className) });
          return;
        }
        if (el.classList)
          el.classList.remove(className);
        else if (el.className)
          el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
      }
      var stars = document.querySelectorAll(".rating-stars a");
      Array.prototype.forEach.call(stars, function (el, i) {
        el.addEventListener("mouseover", function (evt) {
          removeClass(stars, "selected");
          // For each star up to the highlighted one, add "hover"
          var to = parseInt(evt.target.getAttribute("data-rating"));
          Array.prototype.forEach.call(stars, function (star, i) {
            if (parseInt(star.getAttribute("data-rating")) <= to) {
              addClass(star, "hover");
            }
          });
        });
        el.addEventListener("mouseout", function (evt) {
          removeClass(evt.target, "hover");
        });
        el.addEventListener("click", function (evt) {
          selectedRating = parseInt(evt.target.getAttribute("data-rating"));
          removeClass(stars, "hover");
          Array.prototype.forEach.call(stars, function (star, i) {
            if (parseInt(star.getAttribute("data-rating")) <= selectedRating) {
              addClass(star, "selected");
            }
          });
          evt.preventDefault();
        });
      });

      document.querySelector(".rating-stars").addEventListener("mouseout", function (evt) {
        // When the cursor leaves the whole rating star area, remove the "hover" class and apply 
        // the "selected" class to the number of stars selected.
        removeClass(stars, "hover");
        if (selectedRating) {
          Array.prototype.forEach.call(stars, function (star, i) {
            if (parseInt(star.getAttribute("data-rating")) <= selectedRating) {
              addClass(star, "selected");
              rate = star.getAttribute("data-rating");
            }
          });
          //window.location.href="test.php?uid=rate";
          document.cookie = "rate1=" + rate;
          //document.write(rate);
        }

      });


    });
  </script>
</body>
</html>