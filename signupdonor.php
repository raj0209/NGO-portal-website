<?php

include 'connect.php';

session_start(); 

$f = $_POST['name'];
$e = $_POST['email'];
$m = $_POST['mobile'];
$p = md5($_POST['password']);

$target = $_FILES['image']['name'];
$content = file_get_contents($target);

echo "im: ".$target;

$insertQuery = "insert into Donor(name,photo,email,contact,password) values('$f','photo','$e','$m','$p')";
$result = mysql_query($insertQuery);

if($result)
	echo "Registered Successfully";
else
	echo "Try again";

?>