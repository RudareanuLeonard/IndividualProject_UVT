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
                        Company Funds Analysis
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

    $sqlValues = "select * from accountant_stuff_database";
    $query_result = mysqli_query($conn, $sqlValues);


    
    while($row = mysqli_fetch_array($query_result)){
        $software_developers = $row["numberOfSoftwareDevelopers"];
        $accountants = $row["numberOfAccountants"];
        $sysadmins = $row["numberSystemAdministrators"];
        $managers = $row["numberOfManagers"];
    }

    echo "software dev = ".$software_developers;
    echo "<br> accountants = ".$accountants;
    echo "<br> sysadmins = ".$sysadmins;
    echo "<br> managers = ".$managers;

$employeesValues = array(
    array("y" => $software_developers, "label" => "Software Developers"),
    array("y" => $accountants, "label" => "Accountants"),
    array("y" => $sysadmins, "label" => "System Administrators"),
    array("y" => $managers, "label" => "Managers"),
);

?>

    
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Company Employees"
	},
	axisY: {
		title: "Employees",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "bar",
		// yValueFormatString: "$#,##0K",
		indexLabel: "{y}", // the string on the chart(values of each line)
		indexLabelPlacement: "inside", //inside chart
		indexLabelFontWeight: "bolder", // text appear more bold
		indexLabelFontColor: "white", //text color
		dataPoints: <?php echo json_encode($employeesValues, JSON_NUMERIC_CHECK); ?> // the actual chart => printing the array
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