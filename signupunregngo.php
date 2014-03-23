<?php

include 'connect.php';

session_start(); 

$name=$_POST['unn'];
$cpn=$_POST['ucn'];
$email=$_POST['ueml'];
$cno=$_POST['ucont'];
$password=md5($_POST['upwd']);
$des=$_POST['udc'];
$vis=$_POST['uvi'];

$logoNgo = $_FILES['regregNgoLogo']['name'];

echo  $name." ".$cpn." ".$email." ".$cno." ".$password." ".$des." ".$vis." ".$logoNgo;


$ins="insert into Ngo(name,logo,description,vision,contact_person,email,contact,rate,rstatus,website,password) 
values('$name','$logoNgo','$des','$vis','$cpn','$email','$cno',1,0,'$web','$password')";

$ans=mysql_query($ins);

if($ans)
	echo "Registered Successfully";
else
	echo "Try again";

?>