<?php

include 'connect.php';

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

	$insertQuery = "insert into Ngo(name,logo,address,description,vision,contact_person,email,contact,rate,rstatus,rnumber,website,password) 
values('$name','$filePath','$add','$des','$vis','$cpn','$email','$cno',1,1,'$regno','$web','$password')";

	$checkbox1 = $_POST['box'];
	if($_POST["submitFormRegNgo"]=="Sign Up")
	{
		if(isset($_POST['box']))
		{
            $t1=implode(',', $_POST['box']);
            $s = "insert into catNgo(ngo_pid , category) values(1 , '$t1')"; 
                $res=mysql_query($s);
                if($res)
				{
                    echo "inserted";
                }
				else
				{
                    echo "";
                }
		}		
	}
	
	$result = mysql_query($insertQuery);
	
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	echo "<font size = '5'><font color=\"#0CF44A\">ACCOUNT CREATED...SIGN IN USING THE ACTIVATION LINK SENT TO YOUR EMAIL ID";
	/*
	$to      = $email; // Send email to our user
	$subject = 'Signup | Verification'; // Give the email a subject 
	$message = '
	 
	Thanks for signing up!
	Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
	 
	------------------------
	Username: '.$name.'
	Password: '.$password.'
	------------------------
	 
	Please click this link to activate your account:
	http://www.yourwebsite.com/verify.php?email='.$email.'
	 
	'; // Our message above including the link
						 
	$headers = 'From:buddhdev.raj34@gmail.com' . "\r\n"; // Set from headers
	mail($to, $subject, $message, $headers); // Send our email
	*/
	header("refresh:3;url=http://localhost/sampark/NGO-portal-website/index.php");

}

?>