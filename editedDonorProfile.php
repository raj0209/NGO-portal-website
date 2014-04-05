<?php

include 'connect.php';

$pid = $_POST['pidDonor'];
$name = $_POST['ename'];
$email = $_POST['eemail'];
$mob = $_POST['emobile'];



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

if ($_FILES["donorImage"]["error"] > 0)
{
	$filePath = "img/logos/default_donor.png";
}
else
{
	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/logos/_".$randomName."_".$_FILES["donorImage"]["name"];

	if(! move_uploaded_file($_FILES["donorImage"]["tmp_name"],$filePath)){
		$filePath = "img/logos/default_donor.png";
	}

}	

	$updateQuery = 
	"UPDATE Donor 
	SET name='$name',email='$email',contact='$mob',photo='$filePath'
	WHERE pid= '$pid'" ;

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