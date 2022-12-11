<?php

	$reciver = "leonardrudareanu@gmail.com";
	$subject = "Your Password Request";
	$body = "";
	$sender = "leonardrudareanu@gmail.com";

	if(mail($reciver, $subject, $body, $sender))
	echo "SUCCES";
	else echo "not successfully";

?>