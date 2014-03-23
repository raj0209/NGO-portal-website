<?php

include 'connect.php';

$f = $_POST['name'];
$e = $_POST['email'];
$m = $_POST['mobile'];
$p = encryptIt($_POST['password']);


if ($_FILES["image"]["error"] > 0)
{
	echo "<font size = '5'><font color=\"#e31919\">Error: NO CHOSEN FILE <br />";
	echo"<p><font size = '5'><font color=\"#e31919\">INSERT TO DATABASE FAILED";
}
else
{
	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/logos/_".$randomName."_".$_FILES["image"]["name"];

	move_uploaded_file($_FILES["image"]["tmp_name"],$filePath);

	$insertQuery = "insert into Donor(name,photo,email,contact,password) values('$f','$filePath','$e','$m','$p')";
	$result = mysql_query($insertQuery);
	
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	echo "<font size = '5'><font color=\"#0CF44A\">SAVED TO DATABASE";

}

function encryptIt( $q ) {
	echo "entered".$q;
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    //$qEncoded  = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    echo "leaving".$qEncoded;
    return( $q );
}

?>