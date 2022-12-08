<?php

session_start(); // start the session

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WelcomePageAfterLogIn</title>
    <link rel="stylesheet" href="./LogIn.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

</head>




<body>

     <!--NAV BAR-->
     <div class="nav-bar-main-class">
        <div class="nav-bar-logo">
            <img src="./logo.png" class="nav-bar-logo-img">
        </div>

        <div class="nav-bar-links">


        <div class="nav-bar-links-register"> <!--FUNDS BUTTON-->
                <a href="AccountantFunds">
                    <button class="nav-bar-links-register-button">
                        FUNDS
                    </button>
                </a>
            </div>    

            <div class="nav-bar-links-register"> <!--DISCONNECT BUTTON-->
                <a href="">
                    <button class="nav-bar-links-register-button">
                        DISCONNECT
                    </button>
                </a>
            </div>
            

        </div>

    </div>
    <!--NAV BAR END-->

<?php

// echo "test session <br>";
$email = $_SESSION["logInEmail"]; // email from the login form
// echo "email = ".$email;
echo "<br>";
$password = $_SESSION["logInPassword"];
echo "pass = ".$password;

$pos_in_company = $_SESSION["position_in_company"];
echo "<br> position_in_company = ".$pos_in_company;

// print_r($_SESSION);

?>


<div id="myfirstchart" style="height: 250px;"></div>

<script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script>

    
</body>




</html>