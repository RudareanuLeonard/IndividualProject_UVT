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

    $searchInSQL = "SELECT * from employees where email like '".$email."' and password like '".$password."'";
    
    $query_result = mysqli_query($conn, $searchInSQL);

    echo "TESt_before_mysqliFetch";

    while($row = mysqli_fetch_array($query_result)){
        //echo "TEST";
        $pos_in_company = $row["positionInCompany"];
        // echo "<br> pos in company = ".$pos_in_company;


        $password = $row["password"];


    }

    if(mysqli_num_rows($query_result) > 0){ // if logged in, redirect to welcomePageAfterLogIn
        //echo("TE-AI LOGAT");
        session_start(); //starts the session
        $_SESSION["logInEmail"] = $email; // global SESSION email_after_login var
        $_SESSION["logInPassword"] = $password; // global SESSION password_after_login var
        $_SESSION["position_in_company"] = $pos_in_company;
        $_SESSION["password"] = $password;
        $_SESSION["loggedIn"] = "I am logged in";


        if(strtolower($pos_in_company) == "accountant"){ // welcome page for accountant
        $welcomePageAfterLogInAccountant = "./welcomePageAfterLogInAccountantCompanyFundsAnalysis.php";
        header('Location: '.$welcomePageAfterLogInAccountant);
        }

        if(strtolower($pos_in_company) == "software developer"){ // welcome page for software dev
            $welcomePageAfterLogInSoftwareDeveloper = "./welcomePageAfterLogInSoftwareDeveloper.php";
            header('Location: '.$welcomePageAfterLogInSoftwareDeveloper);
        }

        if(strtolower($pos_in_company) == "system administrator"){ // welcome page for sys admin
            $welcomePageAfterLogInSystemAdministrator= "./welcomePageAfterLogInSystemAdministrator.php";
            header('Location: '.$welcomePageAfterLogInSystemAdministrator);
        }

        if(strtolower($pos_in_company) == "manager"){
            $welcomePageAfterLogInManager = "./welcomePageAfterLogInManagerInvestments.php";
            header('Location: '.$welcomePageAfterLogInManager);
        }




    }
    else{ //account does not exit => no progress => stay on the login page
        echo("
        


        <script>
            alert('Contul nu exista');
            window.location.replace('./LogIn.html');
        </script>
        
        ");

        // $logInURL = "./LogIn.html";
        // header('Location: '.$logInURL);
        // die();
    }


?>