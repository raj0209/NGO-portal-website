<?php
    function generate_password( $length = 8 ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@";
		$password12 = substr( str_shuffle( $chars ), 0, $length );
		return $password12;
		}
	$password1 = generate_password(10);
    require_once("class.phpmailer.php");
    require_once("class.smtp.php");
    global $error;
	$current_email=$_GET['a'];
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
    $mail->Subject = 'Your New Password ';
    $mail->Body = ' <br/>'; 
    $mail->Body .= '<br/> Use this password to login ';  
    //$mail->Body .= '';	
	$mail->Body .= $password1;
    $mail->AddAddress($current_email);
    $mail->IsHTML(true);
    $mail->WordWrap    = 900; 
    if (!$mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
		header("refresh:0.001;url=http://localhost/sampark/NGO-portal-website/index.php");
        return false;
    } else {
        $mail->SmtpClose();
        echo $error;
		echo "<script>alert('Your new password is sent to your email address')</script>";
		$newpassword=sha1($password1);
		$updateQuery = "UPDATE Ngo SET password='".$newpassword."' WHERE email='".$current_email."'";
        $result = mysql_query($updateQuery);
		if($result)
		{
		Header("Location: index.php");
		return true;
		}
		else
			echo "error";
		}
?>
