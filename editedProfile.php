<?php

include 'connect.php';

$name = $_POST['enn'];
$regno = $_POST['eregno'];
$cpn = $_POST['ecn'];
$email = $_POST['eeml'];
$cno = $_POST['econt'];
$password = $_POST['epwd'];
$des = $_POST['edc'];
$vis = $_POST['evi'];
$web = $_POST['eweb'];


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
	"update Ngo 
	SET name='$name',description='$des',vision='$vis',contact_person='$cpn',email='$email',contact='$cno',rate=1,rstatus=1,rnumber='$regno',website='$web',password='$password'
	WHERE pid=1 " ;

	$result = mysql_query($updateQuery);
	
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	echo '<script language="javascript">';
	echo 'alert("profile updated")';
	echo '</script>';
	
	
	header("location:ngohome.php");
	
	exit();
?>