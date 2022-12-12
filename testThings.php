<br>
<?php
// echo "software dev = ".$software_developers;
// echo "<br> accountants = ".$accountants;
// echo "<br> sysadmins = ".$sysadmins;
// echo "<br> managers = ".$managers;

$employeesValues = array(
    array("y" => $software_developers, "label" => "Software Developers"),
    array("y" => $accountants, "label" => "Accountants"),
    array("y" => $sysadmins, "label" => "System Administrators"),
    array("y" => $managers, "label" => "Managers"),
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
		text: "Company Employees"
	},
	axisY: {
		title: "Employees",
		includeZero: true,
		prefix: "nr. ",
		suffix:  "Employees"
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


