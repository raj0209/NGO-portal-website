<?php

include '../connect.php';

//Start session
session_start();

$name = $_POST['nn'];
$regno = $_POST['regno'];
$cpn = $_POST['cn'];
$email = $_POST['eml'];
$cno = $_POST['cont'];
$password = sha1($_POST['pwd']);
$des = $_POST['dc'];
$add = $_POST['add'];
$vis = $_POST['vi'];
$web = $_POST['web'];
$city = $_POST['cityreg'];
$state = $_POST['statereg'];

$logoNgo = $_FILES['regNgoLogo']['name'];

//stores the logo of ngo
if ($_FILES["regNgoLogo"]["error"] > 0)
{
	$filePath = "img/logos/default_ngo.png";
}
else
{
	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/logos/_".$randomName."_".$_FILES["regNgoLogo"]["name"];

	if(! move_uploaded_file($_FILES["regNgoLogo"]["tmp_name"],"../".$filePath)){
		$filePath = "img/logos/default_ngo.png";
	}

}

//checks if the email exists
$checkEmail = mysql_query("SELECT * FROM Ngo WHERE email = '$email'");

if(mysql_num_rows($checkEmail)>0){
	$_SESSION['REGNGO_EMAIL_EXISTS_ERRMSG_ARR'] = true;
	Header("location: ../index.php");
}
else
{
	$varificationCode = substr(sha1(rand()), 0, 20);

	//inserts details of Ngo in the database
	$insertQuery = "insert into Ngo(name,logo,address,city,state,description,vision,contact_person,email,contact,rate,rstatus,rnumber,website,verified_Ngo,password) 
	values('$name','$filePath','$add','$city','$state','$des','$vis','$cpn','$email','$cno',1,1,'$regno','$web','$varificationCode','$password')";

	$result = mysql_query($insertQuery);
	$pid = mysql_insert_id();
	$checkbox1 = $_POST['box'];

	$res = true;
	if($_POST["submitFormRegNgo"]=="Sign Up")
	{
		if(isset($_POST['box']))
		{
			$allCat = implode(',', $_POST['box']);
			$allCats = explode(",", $allCat);
			for($count = 0; $count < count($allCats); $count++){
				$cat = $allCats[$count];
				$query = "insert into CatNgo(ngo_pid,category) values('$pid','$cat')";
				$res = $res & mysql_query($query);	
			}
		}		
	}


	if (!$result || !$res)
	{
		die('Error: ' . mysql_error());
	}
	else
	{
		echo "<font size = '5'><font color=\"#0CF44A\">ACCOUNT CREATED...SIGN IN USING THE ACTIVATION LINK SENT TO YOUR EMAIL ID";
	}
	header("location: ../sendmail.php?ngo=".$email."&vcode=".$varificationCode);
}
?>