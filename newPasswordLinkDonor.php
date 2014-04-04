<?php
include 'connect.php';
session_start();

$email = $_POST['eml'];

$checkEmail = mysql_query("SELECT * FROM Donor WHERE email = '$email'");

if(mysql_num_rows($checkEmail)==0){
	$_SESSION['FORGOT_PASSWORD_EMAIL_DONOR_NOT_EXISTS'] = true;
	header("location:forgotpasswordDonor.php");
}

else
{

	header("location:sendNewPasswordDonor.php?a=$email");
}
?>