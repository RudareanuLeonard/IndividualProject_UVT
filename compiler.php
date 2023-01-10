<?php

$language = strtolower(($_POST['language']));
$code = $_POST['code'];

$random = substr(md5(mt_rand()), 0, 7); #filename
$filePath = "temp/".$random.".".$language; #path of the file + extension
$programFile = fopen($filePath, "w"); #open file
fwrite($programFile, $code); #write content into the file
fclose($programFile);


#### now we use the compiler of my local sistem ####

// if($language == "php"){
//     $output = shell_exec("C:/xampp/php/php.exe $filePath 2>&1");
//     echo $output;
// }

if($language == "py"){
    $output = shell_exec("C:/Python311/python.exe $filePath 2>&1");
    echo $output;
}

?>