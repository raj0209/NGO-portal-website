<?php

include 'connect.php';

$name = $_POST['nn'];
$regno = $_POST['regno'];
$cpn = $_POST['cn'];
$email = $_POST['eml'];
$cno = $_POST['cont'];
$password = encryptIt($_POST['pwd']);
$des = $_POST['dc'];
$vis = $_POST['vi'];
$web = $_POST['web'];


$logoNgo = $_FILES['regNgoLogo']['name'];


//	echo  $name." ".$regno." ".$cpn." ".$email." ".$cno." ".$password." ".$des." ".$vis." ".$web." ".$logoNgo;


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

	$insertQuery = "insert into Ngo(name,logo,description,vision,contact_person,email,contact,rate,rstatus,rnumber,website,password) 
values('$name','$filePath','$des','$vis','$cpn','$email','$cno',1,1,'$regno','$web','$password')";

	$result = mysql_query($insertQuery);
	
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	echo "<font size = '5'><font color=\"#0CF44A\">SAVED TO DATABASE";

}

function encryptIt( $q ) {
    $cryptKey  = 'manmeramanena';
    //$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $q );
}

?>