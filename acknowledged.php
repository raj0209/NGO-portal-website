<?php
include 'connect.php';
session_start();    


$type=$_SESSION['SESS_TYPE'];
$pid=$_SESSION['SESS_MEMBER_ID'];
$ngopid = $_POST['ngoPid'];
$details = $_POST['details'];
$subject = $_POST['sub'];
$donorpid = $_POST['donorPid'];
$attachment = $_FILES['attachments']['name'];

	$randomName = substr(sha1(rand()), 0, 10);
	$filePath = "img/files/_".$randomName."_".$_FILES["attachments"]["name"];

	$query = "SELECT * FROM Ngo WHERE pid='$ngopid'";
	$result = mysql_query($query);
	
	if($result) {
        if(mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_assoc($result)) {	
				$ngoName = $row['name'];
				$ngoEmail = $row['email'];
				
			}
		}
	}
	
	$donorquery = "SELECT * FROM Donor WHERE pid='$donorpid'";
	$donorresult = mysql_query($donorquery);
	
	if($donorresult) {
        if(mysql_num_rows($donorresult) > 0) {
			while ($member = mysql_fetch_assoc($donorresult)) {	
				$donorName = $member['name'];
				$donorEmail = $member['email'];
			}
		}
	}
	
	require_once("class.phpmailer.php");
	require_once("class.smtp.php");
	global $error;
	$current_email=$donorEmail;
	
	$username = "sampark.ngo2014@gmail.com";
	$password = "sampark123!";
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->host = 'http://localhost'; 
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = $username;
	$mail->Password = $password;
	$mail->Priority = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
	$mail->CharSet = 'UTF-8';
	$mail->Encoding = '8bit';
	$mail->IsHTML(true);
	$mail->ContentType = 'text/html; charset=utf-8\r\n';
	$mail->SetFrom('np@demo.net', ' NGOportalwebsite.com ');
	$mail->Subject = 'Event Acknowledged ';
	$mail->Body = '<br/>Your event has been acknowledged by the NGO to whom you had contacted through our website.';
	$mail->Body .= '<br/>The following are the details of NGO and Event';
	$mail->Body .= '<br/>NGO Name : '.$ngoName ; 
	$mail->Body .= '<br/>NGO Email : '.$ngoEmail ;
	$mail->Body .= '<br/>Subject : '.$subject ;
	$mail->Body .= '<br/>Details : '.$details ;
	$mail->Body .= '<br/>Now you can rate this NGO on our website.';	
	$mail->AddAddress($current_email);
	$mail->IsHTML(true);
	$mail->WordWrap    = 900; 
	if (!$mail->Send()) {
		$sent = false;
	} 
	else 
	{
		$sent = true;
		$mail->SmtpClose();
		echo $error;
	}


	$insertQuery = "INSERT INTO Acknowledge(donor_pid,ngo_pid,subject,details,attachment,estatus) values('$donorpid','$ngopid','$subject','$details','$filePath','$sent')";
	$result = mysql_query($insertQuery);
	header("refresh:0.001;url=".$_SESSION['LINK_NGOHOME']."?id=".$ngopid);


	return sent;
?>