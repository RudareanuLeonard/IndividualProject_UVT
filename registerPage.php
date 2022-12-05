<?php

$myServer = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbnameConn = "manageitproject";

$conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);

// echo("<br>");
if(!($conn))
    echo("Nu s-a realizat conexiunea");

// echo"ana are mere"

//get infos from the form
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$day = $_POST["day"];
$month = $_POST["month"];
$year = $_POST["year"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone_number = $_POST["phone_number"];
$country = $_POST["country"];
$pos_in_company = $_POST["pos_in_company"];
$english = $_POST["english"];
$french = $_POST["french"];
$german = $_POST["german"];


//end getting infost from the form

$searchEmail = "SELECT email from employees where email like ".$email;


?>