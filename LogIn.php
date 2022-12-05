<?php

$myServer = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbnameConn = "manageitproject";

$conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);

// echo("<br>");
if(!($conn))
    echo("Nu s-a realizat conexiunea");

if(isset($_POST["login_form"]))
    $pressed = "";

    
    $email = $_POST["email"];
    $password = $_POST["password"];

    echo $email;
    echo" <br> ".$password;


?>