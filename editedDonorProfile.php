<?php

include 'connect.php';

$name = $_POST['ename'];
$email = $_POST['eemail'];
$mob = $_POST['emobile'];
$password = $_POST['epassword'];


//$logoNgo = $_FILES['regNgoLogo']['name'];


//	echo  $name." ".$regno." ".$cpn." ".$email." ".$cno." ".$password." ".$des." ".$vis." ".$web." ".$logoNgo;

/*
if ($_FILES["regNgoLogo"]["error"] > 0)
{
	echo "<font size = '5'><font color=\"#e31919\">Error: NO CHOSEN FILE <br />";
	echo"<p><font size = '5'><font color=\"#e31919\">INSERT TO DATABASE FAILED";
}
else
{
	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/logos/_".$randomName."_".$_FILES["regNgoLogo"]["name"];

	move_uploaded_file($_FILES["regNgoLogo"]["tmp_name"],$filePath);
*/
	$updateQuery = 
	"update Donor 
	SET name='$name',email='$email',contact='$mob',password='$password'
	WHERE pid=1 " ;

	$result = mysql_query($updateQuery);
	
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	echo '<script language="javascript">';
	echo 'alert("profile updated")';
	echo '</script>';
	
	
	header("location:donorhome.php");
	
	exit();
?>