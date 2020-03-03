<?php
if(!empty($_POST["send"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$content = $_POST["message"];

	$toEmail = "ichigo1499132@gmail.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $content, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}
}
require_once "functions.php";
?>