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
                <a href="./welcomePageAfterLogInAccountantCompanyFundsAnalysis.php">
                    <button class="nav-bar-links-register-button">
                        Manage Employees
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

$myServer = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbnameConn = "manageitproject";
$conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);

$sqlSearch = "select * from accountant_stuff_database";
$querySqlSearch = mysqli_query($conn, $sqlSearch);

while($row = mysqli_fetch_array($querySqlSearch)){
    $investments = $row["investments"];
    // echo $investments;
    $to_invest = $row["to_spend"];
    // echo "<br> toInvest = ".$to_invest;
}


?>



    <div class="all-investments-display">

    <?php

        $randomReturnOnInvestment = rand(-2500, 4000);
        echo "toinvest = ".$to_invest;

        if($to_invest < 501)
            if($randomReturnOnInvestment < 0)
                $randomReturnOnInvestment = -$randomReturnOnInvestment;

        
        if(isset($_POST["press-here-to-invest"]))
            if($randomReturnOnInvestment > 0)
            echo"
            <script>
            alert('Ati castigat ".$randomReturnOnInvestment." in urma investitiei');
            </script>
            ";
            else if($randomReturnOnInvestment < 0)
                echo"
                <script>
                alert('Ati pierdut ".$randomReturnOnInvestment." in urma investitiei');
                </script>
                ";
            else
                echo"
                <script>
                alert('In urma investitiei, balanta dumneavoastra nu s-a modificat');
                </script>
                ";

            $investments = $investments + $randomReturnOnInvestment;
            
            if($randomReturnOnInvestment > 0){
                $to_invest = $to_invest + (int)(10 * $randomReturnOnInvestment / 100);
            echo "da";}

                

    ?>


    <h1>
        Money Invested: <?php echo $investments ?>
    </h1>


    <h1>
        Available Money: <?php echo $to_invest;?>

    </h1>


    <form method="POST">
        <button class="press-here-to-invest nav-bar-links-register-button" id='press-here-to-invest' name="press-here-to-invest">
            Press here to invest
        </button>
    </form>


    </div>

    

</body>
</html>