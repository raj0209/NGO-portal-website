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

//echo  $name." ".$cpn." ".$email." ".$cno." ".$password." ".$des." ".$vis." ";


if ($_FILES["unregNgoLogo"]["error"] > 0)
{
	echo "<font size = '5'><font color=\"#e31919\">Error: NO CHOSEN FILE <br />";
	echo"<p><font size = '5'><font color=\"#e31919\">INSERT TO DATABASE FAILED";
}
else
{
	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/logos/_".$randomName."_".$_FILES["unregNgoLogo"]["name"];

	move_uploaded_file($_FILES["unregNgoLogo"]["tmp_name"],$filePath);

	$insertQuery = "insert into Ngo(name,logo,address,description,vision,contact_person,email,contact,rate,rstatus,password) 
values('$name','$filePath','$add','$des','$vis','$cpn','$email','$cno',1,0,'$password')";
	
	
	
	$result = mysql_query($insertQuery);
	
	$checkbox1 = $_POST['box'];
	if($_POST["submitFormRegNgo"]=="Sign Up")
	{
		if(isset($_POST['box'])){
            $t1=implode(',', $_POST['box']);
            $s = "insert into catNgo(ngo_pid , category) values(1 , '$t1')"; 
                $res=mysql_query($s);
                if($res){
                    echo "inserted";
                }else{
                    echo "";
                }
	}
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	echo "<font size = '5'><font color=\"#0CF44A\">ACCOUNT CREATED...SIGN IN USING THE ACTIVATION LINK SENT TO YOUR EMAIL ID";
	header("refresh:3;url=http://localhost/sampark/NGO-portal-website/index.php");
}

?>