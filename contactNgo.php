<?php
include 'connect.php';
session_start();    


$type=$_SESSION['SESS_TYPE'];
$pid=$_SESSION['SESS_MEMBER_ID'];
$ngopid = $_POST['nPid'];
$date = $_POST['DonationDate'];
$message = $_POST['message'];
$ngoEmail = $_POST['nEmail'];
$donoremail = $_POST['dEmail'];
$donorname = $_POST['dn'];
$donormob = $_POST['dm'];
          
$insertQuery = "insert into Event(donor_pid,ngo_pid,message,dateofevent) values('$pid','$ngopid','$message','$date')";
$result = mysql_query($insertQuery);
	
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	else
	{
		require_once("class.phpmailer.php");
		require_once("class.smtp.php");
		global $error;
		$current_email=$ngoEmail;
		
		echo $current_email;
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
		$mail->Subject = 'Event Alert ';
		$mail->Body = '<br/>You have been contacted by a donor of our website. He/She would like contact you for organising some event or donate to your NGO.';
		$mail->Body .= '<br/>The following are the details of Donor who has requested for an event';
		$mail->Body .= '<br/>Donor Name : '.$donorname ; 
		$mail->Body .= '<br/>Donor Email : '.$donoremail ;
		$mail->Body .= '<br/>Date of Event : '.$date ;
		$mail->Body .= '<br/>Message/Description : '.$message ;
		//$mail->Body .= '<br/><br/><br/><b> Click on this link to activate your account ';  
		//$mail->Body .= '<a href="http://localhost/sampark/NGO-portal-website/index.php"> Click Here </a>'; 
		$mail->AddAddress($current_email);
		$mail->IsHTML(true);
		$mail->WordWrap    = 900; 
		if (!$mail->Send()) {
			$error = 'Mail error: ' . $mail->ErrorInfo;
		    header("refresh:0.001;url=index.php");
			return false;
		} 
		else 
		{
			$error = 'Event Sent';
			$mail->SmtpClose();
			echo $error;
			header("location:ngohome.php?id=".$ngopid);
			return true;
		}

		//header("location:sendEventMail.php?a=$ngoEmail");
		//session_write_close();
		//header("location: ngohome.php?id=".$ngopid);
		
	}
	
?>