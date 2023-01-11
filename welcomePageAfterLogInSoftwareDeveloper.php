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
    <link rel="stylesheet" href="./welcomePageAfterLogInSoftwareDeveloper.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link rel="stylesheet" href="C:/xampp/htdocs/ProiectIndividual/font-awesome/css/font-awesome.min.css">
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
    
    ?>



<div id="body-no-sidebar" class="body-no-sidebar">

 <!--   SIDE BAR  START -->
 <div class="menu" id="menu">
        <div class="logo">
            <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg" alt="" style="border-radius: 50%;">
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
                
                
            <!-- <li>
            <i class="fa fa-birthday-cake" aria-hidden="true" style="color: white;"></i><a href="#">Tasks: 
            <?php 
                echo $_SESSION["tasks"];
            ?>
                                                                                        </a>
            </li> -->

            </li>

        </div>

    </div>
    <!--- SIDE BAR END  --->


<div class="compilator-class">
    <div class="control-panel">
        Select Language:
      
        <select id="languages" class="languages" onchange="changeLanguage()">
            <option value="py"> Python </option>
        </select>
    </div>
    <div class="editor" id="editor"></div>

    
    <div class="button-container">
        
        <button class="btn" onclick="executeCode()" id="run-button"> Run </button>
        
    </div>
    

    <div class="output"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="lib/ace.js"></script>
    <script src="lib/theme-monokai.js"></script>
    <script>
        let editor;

window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/c_cpp");
}

function changeLanguage() {

    let language = $("#languages").val();

    
    if(language == 'python')editor.session.setMode("ace/mode/python");

}

function executeCode() {

    $.ajax({

        url: "compiler.php",

        method: "POST",

        data: {
            language: $("#languages").val(),
            code: editor.getSession().getValue()
        },

        success: function(response) {
            $(".output").text(response)
        }
    })
}
    </script>
    </div>
    
</div>

</body>