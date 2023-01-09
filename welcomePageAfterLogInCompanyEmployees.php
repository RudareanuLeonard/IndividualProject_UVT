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
                <form method="POST">
                    <button class="nav-bar-links-register-button" name="disconnect-button" id="disconnect-button">
                        DISCONNECT
                    </button>
                </form>
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

    // $sqlValues = "select * from accountant_stuff_database";
    // $query_result = mysqli_query($conn, $sqlValues);


    if(isset($_POST["disconnect-button"])){
        session_destroy();
        $welcomePageBeforeLogIn = "./welcomePage.html";
        header('Location: '.$welcomePageBeforeLogIn);
        }
        
    
    // while($row = mysqli_fetch_array($query_result)){
    //     $software_developers = $row["numberOfSoftwareDevelopers"];
    //     $accountants = $row["numberOfAccountants"];
    //     $sysadmins = $row["numberSystemAdministrators"];
    //     $managers = $row["numberOfManagers"];
    // }

    // echo "software dev = ".$software_developers;
    // echo "<br> accountants = ".$accountants;
    // echo "<br> sysadmins = ".$sysadmins;
    // echo "<br> managers = ".$managers;


    $query = "select * from employees";
    $query_all = mysqli_query($conn, $query);

    $numOfSoftwareDevelopers = 0;
    $numberOfAccountants = 0;
    $numberOfSystemAdministrators = 0;
    $numberOfManagers = 0;

    while($row = mysqli_fetch_array($query_all)){
        if($row["positionInCompany"] == "Software Developer")
            $numOfSoftwareDevelopers = $numOfSoftwareDevelopers + 1;
            
        if($row["positionInCompany"] == "Accountant")
            $numberOfAccountants = $numberOfAccountants + 1;
            
        if($row["positionInCompany"] == "System Administrator")
            $numberOfSystemAdministrators = $numberOfSystemAdministrators + 1;
        
        if($row["positionInCompany"] == "Manager")
            $numberOfManagers = $numberOfManagers + 1;
    }
echo"SD = ".$numOfSoftwareDevelopers."<br>";
echo"Acc = ".$numberOfAccountants."<br>";
echo"SA = ".$numberOfSystemAdministrators."<br>";
echo "MA =".$numberOfManagers."<br>";

$employeesValues = array(
    array("y" => $numOfSoftwareDevelopers, "label" => "Software Developers"),
    array("y" => $numberOfAccountants, "label" => "Accountants"),
    array("y" => $numberOfSystemAdministrators, "label" => "System Administrators"),
    array("y" => $numberOfManagers, "label" => "Managers"),
);



function averageSalForEmp($conn, $employeeType){

    $sum = 0;
    $count_emp = 0;

    $query = "SELECT * from employees";
    
    $query_result = mysqli_query($conn, $query);

    // echo "TESt_before_mysqliFetch";

    while($row = mysqli_fetch_array($query_result)){
        if($row["positionInCompany"] == $employeeType){
            $sum = $sum + $row["salary"];
            $count_emp = $count_emp + 1;
            // echo"Da";
        }
    

    }

    if($count_emp != 0)
        return ($sum / $count_emp); 
    else
        return 0;
}



$avgSalManager = averageSalForEmp($conn, "Manager");
echo $avgSalManager;
echo"<br>";

$avgSalAccountant = averageSalForEmp($conn, "Accountant");
echo $avgSalAccountant;
echo"<br>";

$avgSalSoftwareDeveloper = averageSalForEmp($conn, "Software Developer");
echo $avgSalSoftwareDeveloper;
echo"<br>";

$avgSalSystemAdministrator = averageSalForEmp($conn, "System Administrator");
echo $avgSalSystemAdministrator;
echo"<br>";


$employeesAvgSalaries = array(
    array("y" => $avgSalSoftwareDeveloper, "label" => "Software Developers"),
    array("y" => $avgSalAccountant, "label" => "Accountants"),
    array("y" => $avgSalSystemAdministrator, "label" => "System Administrators"),
    array("y" => $avgSalManager, "label" => "Managers"),
);


?>

    
<script> //NUM OF EMPLOYEES CHART
window.onload = function() {
 
var chart1 = new CanvasJS.Chart("chartContainer1", {
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
chart1.render();
 

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title:{
		text: "Average Salaries"
	},
	axisY: {
		title: "Salaries",
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
		dataPoints: <?php echo json_encode($employeesAvgSalaries, JSON_NUMERIC_CHECK); ?> // the actual chart => printing the array
	}]
});
chart2.render();


}

</script>



</head>


<body>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>


</body>
</html>