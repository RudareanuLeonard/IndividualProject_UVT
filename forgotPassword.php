<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForgotPassword</title>
    <link rel="stylesheet" href="./forgotPassword.css">
</head>


<body>

    <!--NAV BAR-->
    <div class="nav-bar-main-class">
        <div class="nav-bar-logo">
            <img src="./logo.png" class="nav-bar-logo-img">
        </div>

        <div class="nav-bar-links">

            <div class="nav-bar-links-register">
                <a href="./WelcomePage.html">
                    <button class="nav-bar-links-register-button">
                        HOME
                    </button>
                </a>
            </div>            


        </div>

    </div>
    <!--NAV BAR END-->


    <!--FORM START-->

     <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="./logo.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="./forgotPassword.php" id="recover_password_form" name="recover_password_form" method="POST">
					<span class="login100-form-title">
						Recover Your Password
					</span>

                    <div class="text-center p-t-12">
						<span class="txt1">
						    An email will be sent to you					
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" id="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Security word is required">
						<input class="input100" type="text" name="security_word" id="security_word" placeholder="Security word">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="recoverPassButton" name="recoverPassButton">
							Send
						</button>
					</div>

					

					
				</form>
			</div>
		</div>
	</div>

    <?php 
    
    $myServer = "localhost";
    $usernameConn = "root";
    $passwordConn = "";
    $dbnameConn = "manageitproject";

    $conn = mysqli_connect($myServer, $usernameConn, $passwordConn, $dbnameConn);

    $email_sender = "leonardrudareanu@gmail.com";

    if(!($conn)){
        echo("Nu s-a realizat conexiunea");
        // $_SESSION["not_logged_in"] = "not in";
    }
    // else{
    //     $_SESSION["in"] = "in";
    // }


    if(isset($_POST["recoverPassButton"])){
        // $logInURL = "./LogIn.html";

        // header('Location: '.$logInURL);

        $input_email = $_POST["email"];
        // $_SESSION["input_email"] = $input_email;
        
        $input_security_word = $_POST["security_word"];
        // $_SESSION["input_security_word"] = $input_security_word;


        $searchInSql = "SELECT * from employees where email like '".$input_email."'";

        $searchInSql_result = mysqli_query($conn, $searchInSql);

        if(mysqli_num_rows($searchInSql_result)){ // IF EMAIL IS FOUND IN DB
            $_SESSION["inDb"] = "in Db";
            while($row = mysqli_fetch_array($searchInSql_result)){
                $actual_security_word = $row["security_word"];
                // $_SESSION["actual_security_word"] = $actual_security_word;

                $password = $row["password"];
                // $_SESSION["password"] = $password;
            }


            function sendMail($email_receiver, $password, $email_sender){
                $receiver = $email_receiver;
                $subject = "Your Password Request";
                $body = "Your password is: ".$password;
                $sender = $email_sender;
    
                if(mail($receiver, $subject, $body, $sender)){
    
                    echo "success";
    
                }
                else 
                    echo "not successfully";
            }
    


            if(strcmp($actual_security_word, $input_security_word) == 0) // security word is GOOD
                sendMail($input_email, $password, $email_sender);
            else{ //security word is NOT GOOD
                echo("
                <script>
                    alert('Cuvantul de securitate nu este corect');
                    window.location.replace('./forgotPassword.php');
                </script>
                
                ");

            }
            

        }else{//EMAIL NOT IN DB

            echo("
            <script>
                alert('Email-ul nu exista in db');
                window.location.replace('./forgotPassword.php');
            </script>
            
            ");
            
        }



    }




    // if(isset($_POST["recoverPassButton"])){

    //     $input_email = $_POST["email"];
    //     $input_security_word = $_POST["security_word"];
    //     $_SESSION["input_email"] = $input_email;

    //     $searchInSQL = "select * from employees where email = '".$email."'";

    //     $query_result = mysqli_query($conn, $searchInSQL);

    //     $_SESSION["inputSecurityWord"] = $input_security_word;

    //     $searchInSQL = "select * from employees where email = '".$email."'";

    //     $query_result = mysqli_query($conn, $searchInSQL);

    //     if(mysqli_num_rows($query_result) > 0)
    //     while($row = mysqli_fetch_array($query_result)){
    //         $actual_security_word = $row["security_word"];
    //         $_SESSION["actualSecurityWord"] = $actual_security_word;
    //         $input_email_pass = $row["password"];
    //         $_SESSION["someText"] = "someText";
    //     }

        // function sendMail($email_receiver, $password, $email_sender){
        //     $receiver = $email_receiver;
        //     $subject = "Your Password Request";
        //     $body = "Your password is: ".$password;
        //     $sender = $email_sender;

        //     if(mail($receiver, $subject, $body, $sender)){

        //         echo "success";

        //     }
        //     else 
        //         echo "not successfully";
        // }


    //     if(strcmp($_SESSION["inputSecurityWord"], $_SESSION["actualSecurityWord"] ) == 0){
    //         sendMail("leonardrudareanu@gmail.com", $_SESSION["password"], $email_sender);
    //         $redirectYes = "./mail.php";
    //         header('Location: '.$redirectYes);
    //     }



    //     $redirectYes = "./mail.php";
    //     header('Location: '.$redirectYes);


    // }




    // if(isset($_POST["recoverPassButton"])){
    //     $logInURL = "./LogIn.html";

    //     header('Location: '.$logInURL);
    //     }
    // else
    //     echo"nu";

        // $input_email = $_POST["email"];
        // $input_security_word = $_POST["security_word"];

        // $searchInSQL = "select * from employees where email = '".$email."'";

        // $query_result = mysqli_query($conn, $searchInSQL);


        // if(mysqli_num_rows($query_result) > 0)
        //     while($row = mysqli_fetch_array($query_result)){
        //         $actual_security_word = $row["security_word"];
        //         $input_email_pass = $row["password"];
        //     }

    //         $_SESSION["password"] = $input_email_pass;
    //         $_SESSION["email_sender"] = $email_sender;
    //         $_SESSION["email"] = $email;

         


    //     // if(strcmp($input_security_word, $actual_security_word) == 0 )
    //     //     header('Location: '.$redirectYes);
    //     // else
    //     // header('Location: '.$redirectNo);


        // function sendMail($email_receiver, $password, $email_sender){
        //     $receiver = $email_receiver;
        //     $subject = "Your Password Request";
        //     $body = "Your password is: ".$password;
        //     $sender = $email_sender;

        //     if(mail($receiver, $subject, $body, $sender)){

        //         echo "success";

        //     }
        //     else 
        //         echo "not successfully";
        // }


        // if(strcmp($input_security_word, $actual_security_word) == 0){
        //     sendMail("leonardrudareanu@gmail.com", $input_email_pass, $email_sender);
        //     $redirectYes = "./mail.php";
        //     header('Location: '.$redirectYes);
        // }

        
            

    // ?>

    <!--FORM END-->



</body>


</html>
