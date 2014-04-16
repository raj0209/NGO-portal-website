<?php

include 'connect.php';

//fetches information about donor
$pid = $_POST['pidDonor'];
$name = $_POST['ename'];
$email = $_POST['eemail'];
$mob = $_POST['emobile'];


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

	//updates information of donor
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