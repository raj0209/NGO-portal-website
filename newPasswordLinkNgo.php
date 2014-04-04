<?php
include 'connect.php';
session_start();

$email = $_POST['eml'];


$checkEmail = mysql_query("SELECT * FROM Ngo WHERE email = '$email'");

if(mysql_num_rows($checkEmail)==0){
	$_SESSION['FORGOT_PASSWORD_EMAIL_NGO_NOT_EXISTS'] = true;
	header("location:forgotpasswordNgo.php");
}
else
{
	header("location:sendNewPasswordNgo.php?a=$email");
}
?>