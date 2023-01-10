
<?php

function sendMail($email_receiver, $msg, $email_sender){
    $receiver = $email_receiver;
    $subject = "Zoom Call";
    $body = "Your password is: ".$msg;
    $sender = $email_sender;

    if(mail($receiver, $subject, $body, $sender)){

        echo "success";

    }
    else 
        echo "not successfully";
}

if(isset($_POST["recoverPassButton"])){
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
        alert('Cuvantul de securitate nu este corect');
    
    </script>
    
    ");


}





?>
