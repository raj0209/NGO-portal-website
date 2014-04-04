<?php
	//Start session

session_start();
//echo "here we are: ".$_SESSION['search'];

	//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '' )) {
	
	if(!($_SESSION['search']) == 'true')
	{
		header("location: index.php");
		exit();
	}
}
?>