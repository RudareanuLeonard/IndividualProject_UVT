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
    <link rel="stylesheet" href="./welcomePageAfterLogInManagerInvestments.css">
    <link rel="stylesheet" href="./registerPage.css"> 
    <link rel="stylesheet" href="C:/xampp/htdocs/ProiectIndividual/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>




    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

     <!--NAV BAR-->
     <div class="nav-bar-main-class">
        <div class="nav-bar-logo">
            <img src="./logo.png" class="nav-bar-logo-img">
        </div>

        <div class="nav-bar-links">

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

if(isset($_POST["disconnect-button"])){
session_destroy();
$welcomePageBeforeLogIn = "./welcomePage.html";
header('Location: '.$welcomePageBeforeLogIn);
}



$myServer = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbnameConn = "manageitproject";
$conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);
?>


<div id="body-no-sidebar" class="body-no-sidebar">

    <!--   SIDE BAR  START -->
    <div class="menu" id="menu">
        <div class="logo">
            <img src="./facebookLogo.png" alt="">
            <h2 style="color:white; text-align:center">Employee details</h2>
        </div>

        <div class="items">
            <li>
            <i class="fa fa-building" aria-hidden="true" style="color: white;"></i><a href="#"><?php echo $_SESSION["position_in_company"];?></a>
            </li>

            <li>
            <i class="fa fa-id-card" aria-hidden="true" style="color:white"></i><a href="#">
                <?php 
                echo   $_SESSION["lastName"]." ".$_SESSION["firstName"];
                ?>
                                                                                </a>
            </li>

            <li>
            <i class="fa fa-birthday-cake" aria-hidden="true" style="color: white;"></i><a href="#">
            <?php 
                echo   $_SESSION["birthDate"];
            ?>
                                                                                        </a>
            </li>

        </div>

    </div>
    <!--- SIDE BAR END  --->



    <!-- 4 BOXES IN A SQUARE START-->

    <div class="container">

        <div class="box box1" id="box1">
            Want to send a Zoom link to all the people in the company?
            <br>
            <!-- <form method="POST" id="meetingAllEmployees_form" class="meetingAllEmployees_form" action="./meetingAllEmployees.php">
            <button id="meetingAllEmployees" class="meetingAllEmployees">Press here to set a meeting</button>
            </form> -->



            <form class="login100-form validate-form" action="./welcomePageAfterLogInManagerInvestments.php" id="meetingAllEmployees_form" name="meetingAllEmployees_form" method="POST">
                <!-- <button class="login100-form-btn" id="recoverPassButton" name="recoverPassButton">
							Send
				</button> -->
                <button id="meetingAllEmployees_button" class="meetingAllEmployees" name="meetingAllEmployees_button">Press here to set a meeting</button>				

					
				</form>


        </div>


        <div class="box box2">
            Want to send a Zoom link to a specific team?
            <br>
           

           
            <form class="login100-form validate-form" action="./welcomePageAfterLogInManagerInvestments.php" id="meetingATeam_form" name="meetingATeam_form" method="POST">
                
                <select id="selectTeam" name="selectTeam">
                    <option value="Manager">Manager's Team</option>
                    <option value="Accountant">Accountant's Team</option>
                    <option value="Software Developer">Software Developer's Team</option>
                </select>
                <br>
                <button id="meetingATeam_button" class="meetingAllEmployees" name="meetingATeam_button">Press here to set a meeting for this team</button>				

					
				</form>


            
        </div>

        <div class="box box3">
            Want to send a Zoom link to a specific employee?
            <br>

            <form class="login100-form validate-form" action="./welcomePageAfterLogInManagerInvestments.php" id="meetingAPerson_form" name="meetingAPerson_form" method="POST">
            <select name="selectOneEmployee" id="selectOneEmployee">
                    <?php
                        $myServer = "localhost";
                        $usernameConn = "root";
                        $passwordConn = "";
                        $dbnameConn = "manageitproject";
                        
                        $conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);

                        $searchInSQL = "SELECT * from employees";

                        $query_result = mysqli_query($conn, $searchInSQL);
                    
                        while($row = mysqli_fetch_array($query_result)){
                    ?>
                    <option value="<?php echo $row["email"];?>">
                        <?php echo $row["lastName"]." " .$row["firstName"];?>
                    </option>
                    <?php }?>
			</select>
            
            <br>
            <button id="meetingAPerson_button" class="meetingAllEmployees" name="meetingAPerson_button">Press here to set a meeting</button>
            </form>

        </div>

        <div class="box box4">
            Want to assign tasks to any Software Developer?
            <br>
            <form class="login100-form validate-form" action="./welcomePageAfterLogInManagerInvestments.php" id="assignTask_form" name="assignTask_form" method="POST">
            <select name="assignTask" id="assignTask">
                    <?php
                        $myServer = "localhost";
                        $usernameConn = "root";
                        $passwordConn = "";
                        $dbnameConn = "manageitproject";
                        
                        $conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);

                        $searchInSQL = "SELECT * from employees where positionInCompany like 'Software Developer'";

                        $query_result = mysqli_query($conn, $searchInSQL);

                        // echo "TESt_before_mysqliFetch";
                    
                        while($row = mysqli_fetch_array($query_result)){
                    ?>
                    <option value="<?php echo $row["email"];?>">
                        <?php echo $row["lastName"]." " .$row["firstName"];?>
                    </option>
                    <?php }?>
			</select>
            
            <br>
            <button id="assignTask_button" class="assignTask" name="assignTask_button">Press here to set assign it</button>
            </form>
        </div>

    </div>



    <!-- 4 BOXES IN A SQUARE END-->

</div>


<?php

function sendMail($email_receiver, $msg, $email_sender){
    $receiver = $email_receiver;
    $subject = "Zoom Call";
    $body = "Hello!".$msg;
    $sender = $email_sender;

    mail($receiver, $subject, $body, $sender);
    // if()){

    //    echo ":D"

    // }
    // else 
    //     echo "not successfully";
}

if(isset($_POST["meetingAllEmployees_button"])){
    $myServer = "localhost";
    $usernameConn = "root";
    $passwordConn = "";
    $dbnameConn = "manageitproject";
    $conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);
    $searchInSQL = "SELECT * from employees";
    $query_result = mysqli_query($conn, $searchInSQL);

    $email = "";

    while($row = mysqli_fetch_array($query_result)){
        $email = $row["email"];
        $email_sender = "leonardrudareanu@gmail.com";
        $msg = "Please click the link to enter the Zoom Call: https://us05web.zoom.us/j/89352132858?pwd=OXAyQ3JyVmpGR1pJZlV6b3dQSHlXdz09";
        sendMail($email, $msg, $email_sender);
    }
    echo("
    <script>
        alert('Email-urile au fost trimise!');
    
    </script>
    
    ");


}

if(isset($_POST["meetingATeam_button"])){
    $myServer = "localhost";
    $usernameConn = "root";
    $passwordConn = "";
    $dbnameConn = "manageitproject";
    $conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);
    $team = $_POST["selectTeam"];
    // echo $team;

    // echo strcmp("Manager", $team);

    echo"<br><br>";
    $searchInSQL = "SELECT * from employees where positionInCompany like '".$team."'";
    $query_result = mysqli_query($conn, $searchInSQL);

    $email = "";
    

    while($row = mysqli_fetch_array($query_result)){
        $email = $row["email"];
        // echo $row["positionInCompany"];
        // echo"<br>";
        $email_sender = "leonardrudareanu@gmail.com";
        $msg = "Please click the link to enter the Zoom Call: https://us05web.zoom.us/j/89352132858?pwd=OXAyQ3JyVmpGR1pJZlV6b3dQSHlXdz09";
        sendMail($email, $msg, $email_sender);
        //sendMail($email, $msg, $email_sender);
    }
    echo("
    <script>
        alert('Email-urile au fost trimise!');
    
    </script>
    
    ");

}

if(isset($_POST["meetingAPerson_button"])){
    $option_email = $_POST["selectOneEmployee"];
    $myServer = "localhost";
    $usernameConn = "root";
    $passwordConn = "";
    $dbnameConn = "manageitproject";
    $conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);

    $searchInSQL = "SELECT * from employees where email like '".$option_email."'";
    $query_result = mysqli_query($conn, $searchInSQL);

    while($row = mysqli_fetch_array($query_result)){
        // echo $row["positionInCompany"];
        // echo"<br>";
        $email_sender = "leonardrudareanu@gmail.com";
        $msg = " ".$row["firstName"].", please click the link to enter the Zoom Call: https://us05web.zoom.us/j/89352132858?pwd=OXAyQ3JyVmpGR1pJZlV6b3dQSHlXdz09";
        sendMail($option_email, $msg, $email_sender);
        //sendMail($email, $msg, $email_sender);
    }
    echo("
    <script>
        alert('Email-ul a fost trimis!');
    
    </script>
    
    ");


}

if(isset($_POST["assignTask_button"])){

    $option_email = $_POST["assignTask"];
    $myServer = "localhost";
    $usernameConn = "root";
    $passwordConn = "";
    $dbnameConn = "manageitproject";
    $conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);

    $searchInSQL = "SELECT * from employees where email like '".$option_email."'";
    $query_result = mysqli_query($conn, $searchInSQL);

    while($row = mysqli_fetch_array($query_result)){
        $num_of_tasks = $row["tasks"];
        if($num_of_tasks == NULL)
            $num_of_tasks = 0;
        
        $num_of_tasks = $num_of_tasks + 1;
        $sql = "UPDATE employees SET tasks = '".$num_of_tasks."' where email like '".$row['email']."' ";
        
        mysqli_query($conn, $sql);

    }


    echo("
    <script>
        alert('Task-ul a fost atribuit!');
    
    </script>
");
}



?>



</body>
</html>