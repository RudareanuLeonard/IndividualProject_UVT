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
                <a href="./welcomePageAfterLogInCompanyEmployees.php">
                    <button class="nav-bar-links-register-button">
                        Employees Analysis
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
// echo "pass = ".$password;

$pos_in_company = $_SESSION["position_in_company"];
// echo "<br> position_in_company = ".$pos_in_company;

// print_r($_SESSION);

?>

<?php


$myServer = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbnameConn = "manageitproject";

$conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);

$sqlValues = "select * from accountant_stuff_database";
$query_result = mysqli_query($conn, $sqlValues);

while($row = mysqli_fetch_array($query_result)){
    $investments = $row["investments"];
    $sales = $row["sales"];
    $income = $row["income"];
    $to_spend = $row["to_spend"];
    
}

// echo "investment = ".$investments;
// echo "<br> sales = ".$sales;
// echo "<br> income = ".$income;
// echo "<br> to_spend = ".$to_spend;

$chartValues = array(
    array("y" => $investments, "label" => "Investments"),
    array("y" => $sales, "label" => "Sales"),
    array("y" => $income, "label" => "Income"),
    array("y" => $to_spend, "label" => "To Spend"),


);


 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Company Analysis"
	},
	axisY: {
		title: "Money",
		includeZero: true,
		prefix: "$",
		suffix:  "k"
	},
	data: [{
		type: "bar",
		// yValueFormatString: "$#,##0K",
		indexLabel: "{y}", // the string on the chart(values of each line)
		indexLabelPlacement: "inside", //inside chart
		indexLabelFontWeight: "bolder", // text appear more bold
		indexLabelFontColor: "white", //text color
		dataPoints: <?php echo json_encode($chartValues, JSON_NUMERIC_CHECK); ?> // the actual chart => printing the array
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>





</body>
</html>   



    
</body>




</html>