<?php
    
    require_once("class.phpmailer.php");
    require_once("class.smtp.php");
    global $error;
	$current_email=$_GET['a'];
	echo $current_email;
	$username = "namanstar2@gmail.com";
    $password = "fakehlol";
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
    $mail->Subject = 'Activate Your Account ';
    $mail->Body = 'You have have been registered on Sampark. Please verify your account by clicking the following link '; 
    $mail->Body .= '<br/><br/><br/><b> Click on this link to activate your account ';  
    $mail->Body .= '<a href="http://localhost/sampark/NGO-portal-website/index.php"> Click Here </a>'; 
    $mail->AddAddress($current_email);
    $mail->IsHTML(true);
    $mail->WordWrap    = 900; 
    if (!$mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
        header("refresh:0.001;url=http://localhost/sampark/NGO-portal-website/index.php");
		return false;
    } else {
        $error = 'Message sent! activate your Account Now!';
        $mail->SmtpClose();
        echo $error;
		echo "<script>alert('activate your account and Login again')</script>";
		header("refresh:0.001;url=http://localhost/sampark/NGO-portal-website/index.php");
		return true;
		}

	?>
