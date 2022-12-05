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
if(isset($_POST["register_form"]))
echo("apasat");
else
echo"nu";

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
$years_of_experience = $_POST["experience"];

$birth_date=$year."-".$month."-".$day;

echo "firstname = ".$first_name." lastname = ".$last_name." day=".$day;
echo " month=".$month." year=".$year." birthdate=".$birth_date." email=".$email." pass=".$password;
echo" phone=".$phone_number." country = ".$country." poscompany = ".$pos_in_company." english=".$english." french=".$french." german=".$german;
echo" exp = ".$years_of_experience;


//end getting infost from the form

$searchEmail = "SELECT email from employees where email='".$email."'";
// // echo "email = ";
// // echo $email;
// // echo "<br>";

$query_email = mysqli_query($conn, $searchEmail);



if(mysqli_num_rows($query_email) <= 0){//email not in db => can add in db

    $insert_SQL = "INSERT INTO employees(lastName, firstName, birthdate, phone, email, yearsOfExperience, positionInCompany, speakEnglish, speakFrench, speakGerman, country, `password`)
     values ('".$first_name."', '".$last_name."', '".$birth_date."', '".$phone_number."', '".$email."', '".$years_of_experience."', '".$pos_in_company."', '".$english."', '".$french."', '".$german."', '".$country."', '".$password."')";
}
else{//email in db => error! try again
echo"already in db<br>";
    }

    if(mysqli_query($conn, $insert_SQL)){
        $logInURL = "./LogIn.html";

        header('Location: '.$logInURL);
        die();
    }
    else
        echo"nu s-a inserat";


// }


?>