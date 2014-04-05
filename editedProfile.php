<?php

include 'connect.php';

$pid = $_POST['pidNgo'];
$name = $_POST['enn'];
$regno = $_POST['eregno'];
$cpn = $_POST['ecn'];
$email = $_POST['eeml'];
$cno = $_POST['econt'];
$des = $_POST['edc'];
$vis = $_POST['evi'];
$web = $_POST['eweb'];


if ($_FILES["regNgoLogo"]["error"] > 0)
{
	$filePath = "img/logos/default_ngo.png";
}
else
{
	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/logos/_".$randomName."_".$_FILES["regNgoLogo"]["name"];

	if(! move_uploaded_file($_FILES["regNgoLogo"]["tmp_name"],$filePath)){
		$filePath = "img/logos/default_ngo.png";
	}

}	

$updateQuery = 
"UPDATE Ngo 
SET name='$name',description='$des',vision='$vis',contact_person='$cpn',email='$email',contact='$cno',rate=1,rstatus=1,rnumber='$regno',website='$web',logo='$filePath'
WHERE pid = '$pid'" ;

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