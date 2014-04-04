<?php
	//Start session
	session_start();
	//Unset the variables stored in session
	/*unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_EMAIL']);
	unset($_SESSION['SESS_PASS']);
	*/
	
	//Include database connection details
	require_once('../connect.php');
 
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	//Sanitize the POST values
	$email = clean($_POST['emailDonor']);
	$password = clean($_POST['passwordDonor']);
 	$password = sha1($password);

	//Create query
	$qry="SELECT * FROM Donor WHERE email='$email' AND password='$password'";
	$result=mysql_query($qry);
 	//echo "string ".$qry;
 
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);

			if($member['verified_Donor'] == '1'){
				$_SESSION['SESS_MEMBER_ID'] = $member['pid'];
				$_SESSION['SESS_EMAIL'] = $member['email'];
				$_SESSION['SESS_TYPE'] = "DONOR";
				session_write_close();
				$headerStat = "location: ../donorhome.php?did=".$_SESSION['SESS_MEMBER_ID'];
				header($headerStat);	
			}else{
				$_SESSION['LOGIN_DONOR_ERRMSG_ARR'] = true;
				session_write_close();
				header("location: ../index.php");	
			}
			
		}
		else {
				$_SESSION['LOGIN_DONOR_ERRMSG_ARR'] = true;
				session_write_close();
				header("location: ../index.php");
			}
	}else {
		echo "Query failed";
	}
?>