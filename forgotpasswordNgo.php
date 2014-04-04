<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Forgot password</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="icons/NGO_icon_Browser_bar.png">
		<!-- Le styles -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="main.css" rel="stylesheet">	    
		
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		    <!--[if lt IE 9]>
		      <script src="js/html5shiv.js"></script>
		      <![endif]-->
				<link href="css/bootstrap-responsive.css" rel="stylesheet">
		      <script type="text/javascript" src="main.js"></script>
	</head>
	<body>
		
		<div class="resend-password-wrapper" style="margin-left:500px;">
		
			<h1>Forgot your password?</h1>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<form id="resend_password_form" class="clearfix resend-password js-resend-password" method="post" action="newPasswordLinkNgo.php">
			<label class="control-label" for="email_or_phone" id="eml" name ="eml">Enter your email address :</label>
			<input type="text"  id="eml" name="eml" class="input-xlarge" placeholder="Email" autocomplete="on" style="color:black">
			<button id="lookup_user" class="submit btn primary-btn" type="submit" >Submit</button>

			<?php if(isset($_SESSION['FORGOT_PASSWORD_EMAIL_NGO_NOT_EXISTS'])) { ?>
			<div><p>Email is not registered</p></div>
			<?php } unset($_SESSION['FORGOT_PASSWORD_EMAIL_NGO_NOT_EXISTS']); ?>

			</form>
		</div>
	</body>
</html>