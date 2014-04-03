<?php
include 'connect.php';
$email = $_POST['eml'];


header("location:sendNewPassword.php?a=$email");

?>