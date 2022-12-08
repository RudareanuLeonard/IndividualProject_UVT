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
</head>




<body>

     <!--NAV BAR-->
     <div class="nav-bar-main-class">
        <div class="nav-bar-logo">
            <img src="./logo.png" class="nav-bar-logo-img">
        </div>

        <div class="nav-bar-links">

            <div class="nav-bar-links-register">
                <a href="./WelcomePage.html">
                    <button class="nav-bar-links-register-button">
                        DISCONNECT
                    </button>
                </a>
            </div>            


        </div>

    </div>
    <!--NAV BAR END-->

<?php

echo "test session <br>";
$email = $_SESSION["logInEmail"]; // email from the login form
echo "email = ".$email;
echo "<br>";
$password = $_SESSION["logInPassword"];
echo "pass = ".$password;

$pos_in_company = $_SESSION["position_in_company"];
echo "<br> position_in_company = ".$pos_in_company;

// print_r($_SESSION);

?>


    
</body>




</html>