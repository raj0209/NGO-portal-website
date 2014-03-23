<?php

$name=$_POST['unn'];
$cpn=$_POST['ucn']
$email=$_POST['ueml'];
$cno=$_POST['ucont'];
$p=$_POST['upwd'];
$des=$_POST['udc'];
$vis=$_POST['uvi'];

$a=mysql_connect("localhost","root","");
$b=mysql_select_db("sampark");

$ins="insert into ngo(name,description,vision,contact_person,email,contact,website,password) values('$name','$des','$vis','$cpn','$email','$cno','$web','$p')";
$ans=mysql_query($ins);

if($ins)
	echo "Registered Successfully";
else
	echo "Try again";

?>