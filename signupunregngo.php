<?php

include 'connect.php';

$name=$_POST['unn'];
$cpn=$_POST['ucn'];
$email=$_POST['ueml'];
$cno=$_POST['ucont'];
$password=sha1($_POST['upwd']);
$des=$_POST['udc'];
$vis=$_POST['uvi'];

//echo  $name." ".$cpn." ".$email." ".$cno." ".$password." ".$des." ".$vis." ";


if ($_FILES["unregNgoLogo"]["error"] > 0)
{
	echo "<font size = '5'><font color=\"#e31919\">Error: NO CHOSEN FILE <br />";
	echo"<p><font size = '5'><font color=\"#e31919\">INSERT TO DATABASE FAILED";
}
else
{
	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/logos/_".$randomName."_".$_FILES["unregNgoLogo"]["name"];

	move_uploaded_file($_FILES["unregNgoLogo"]["tmp_name"],$filePath);

	$insertQuery = "insert into Ngo(name,logo,description,vision,contact_person,email,contact,rate,rstatus,password) 
values('$name','$filePath','$des','$vis','$cpn','$email','$cno',1,0,'$password')";
	$result = mysql_query($insertQuery);
	
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	echo "<font size = '5'><font color=\"#0CF44A\">SAVED TO DATABASE";

}

?>