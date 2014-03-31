<?php

include 'connect.php';

$f = $_POST['name'];
$e = $_POST['email'];
$m = $_POST['mobile'];
$p = sha1($_POST['password']);


if ($_FILES["image"]["error"] > 0)
{
	$filePath = "img/logos/default_donor.jpeg";
}
else
{
	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/logos/_".$randomName."_".$_FILES["image"]["name"];

	if(!move_uploaded_file($_FILES["image"]["tmp_name"],$filePath)){
		$filePath = "img/logos/default_donor.jpeg";
	}
}

$insertQuery = "insert into Donor(name,photo,email,contact,password) values('$f','$filePath','$e','$m','$p')";
$result = mysql_query($insertQuery);

if (!$result)
{
	echo "Error: ".mysql_error();
}else
{
echo "<font size = '5'><font color=\"#0CF44A\">SAVED TO DATABASE";
}

?>