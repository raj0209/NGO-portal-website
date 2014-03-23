<?php

$name=$_POST['nn'];
$num=$_POST['regno'];
$cpn=$_POST['cn']
$email=$_POST['eml'];
$cno=$_POST['cont'];
$p=$_POST['pwd'];
$des=$_POST['dc'];
$vis=$_POST['vi'];
$web=$_POST['web'];

$a=mysql_connect("localhost","root","");
$b=mysql_select_db("sampark");

$ins="insert into ngo(name,description,vision,contact_person,email,contact,website,password) values('$name','$des','$vis','$cpn','$email','$cno','$web','$p')";
$ans=mysql_query($ins);

if($ins)
	echo "Registered Successfully";
else
	echo "Try again";

?>