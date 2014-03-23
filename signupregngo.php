<?php

include 'connect.php';

session_start(); 

$name = $_POST['nn'];
$regno = $_POST['regno'];
$cpn = $_POST['cn'];
$email = $_POST['eml'];
$cno = $_POST['cont'];
$password = md5($_POST['pwd']);
$des = $_POST['dc'];
$vis = $_POST['vi'];
$web = $_POST['web'];


$logoNgo = $_FILES['regNgoLogo']['name'];


//	echo  $name." ".$regno." ".$cpn." ".$email." ".$cno." ".$password." ".$des." ".$vis." ".$web." ".$logoNgo;

$ins = "insert into Ngo(name,logo,description,vision,contact_person,email,contact,rate,rstatus,rnumber,website,password) values('$name','$logoNgo','$des','$vis','$cpn','$email','$cno',1,1,'$regno','$web','$password')";

$ans = mysql_query($ins);

if($ans)
	echo "Registered Successfully";
else
	echo "Try again";

?>