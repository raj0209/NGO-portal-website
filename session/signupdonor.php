<?php

include '../connect.php';

//Start session
session_start();

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
	  
		if(!move_uploaded_file($_FILES["image"]["tmp_name"],$filePath))
		{
			$filePath = "img/logos/default_donor.jpeg";
		}
	}
  
	$result2 = mysql_query("SELECT * FROM Donor WHERE email = '$e'");
	
	if(mysql_num_rows($result2)>0){
		$_SESSION['DONOR_EMAIL_EXISTS_ERRMSG_ARR'] = true;
		Header("location: ../index.php");
	}
	else
	{	
		$varificationCode = substr(sha1(rand()), 0, 20);

	$insertQuery = "insert into Donor(name,photo,email,contact,verified_Donor,password) values('$f','$filePath','$e','$m','$varificationCode','$p')";
	$result = mysql_query($insertQuery);
		
		if (!$result)
		{
			echo "'$f','$e','$m','$p',Error: ";
		}
		else
		{
			echo "<font size = '5'><font color=\"#0CF44A\">ACCOUNT CREATED...SIGN IN USING THE ACTIVATION LINK SENT TO YOUR EMAIL ID";
			//header("refresh:3;location:index.php");
		}
		
		header("location: ../sendmail.php?donor=".$e."&vcode=".$varificationCode);
	}

?>