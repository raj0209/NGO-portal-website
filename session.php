<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_EMAIL']);
	unset($_SESSION['SESS_TYPE']); //wether donor or ngo
?>