
<?php
	
	$userName = $_POST['name'];
	$userEmail = $_POST['email'];
	$userMessage = $_POST['message'];
	$to = "ichigo1499132@gmail.com";
	$subject = "Email from GroupSynch";
	$body = "Information Submitted:";

	$body .= "\r\n Name: " . $userName;
	$body .= "\r\n Email: " . $userEmail;
	$body .= "\r\n Message: " . $userMessage;

	mail($to, $subject, $body);
?>