<?php
include 'connect.php';
$email = $_POST['eml'];


header("location:sendNewPasswordNgo.php?a=$email");

?>