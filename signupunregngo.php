<?php

include 'connect.php';

$name=$_POST['unn'];
$cpn=$_POST['ucn'];
$email=$_POST['ueml'];
$cno=$_POST['ucont'];
$password=sha1($_POST['upwd']);
$des=$_POST['udc'];
$add=$_POST['uadd'];
$vis=$_POST['uvi'];
$city = $_POST['cityunreg'];
$state = $_POST['stateunreg'];


//echo  $name." ".$cpn." ".$email." ".$cno." ".$password." ".$des." ".$vis." ";


if ($_FILES["unregNgoLogo"]["error"] > 0)
{
	$filePath = "img/logos/default_ngo.png";
}
else
{
	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/logos/_".$randomName."_".$_FILES["unregNgoLogo"]["name"];

	if(! move_uploaded_file($_FILES["unregNgoLogo"]["tmp_name"],$filePath))
	{
		$filePath = "img/logos/default_ngo.png";
	}
}

$insertQuery = "insert into Ngo(name,logo,address,city,state,description,vision,contact_person,email,contact,rate,rstatus,password) 
values('$name','$filePath','$add','$city','$state','$des','$vis','$cpn','$email','$cno',1,0,'$password')";


$result = mysql_query($insertQuery);
$pid = mysql_insert_id();
$checkbox1 = $_POST['box'];

$res = true;
if($_POST["submitFormUpRegNgo"]=="Sign Up")
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

if (!$result)
{
	die('Error: ' . mysql_error());
}else
{
	echo "<font size = '5'><font color=\"#0CF44A\">ACCOUNT CREATED...SIGN IN USING THE ACTIVATION LINK SENT TO YOUR EMAIL ID";
}
header("location:sendmail.php?a=$email");	

?>