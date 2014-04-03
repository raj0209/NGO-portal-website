<?php
include 'connect.php';
session_start();    


$type=$_SESSION['SESS_TYPE'];
$email=$_SESSION['SESS_EMAIL'];
$pid=$_SESSION['SESS_MEMBER_ID'];
$ngopid = $_POST['nPid'];
$date = $_POST['DonationDate'];
$message = $_POST['message'];


          
$insertQuery = "insert into Event(donor_pid,ngo_pid,message,dateofevent) values('$pid','$ngopid','$message','$date')";
$result = mysql_query($insertQuery);
	
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	else
	{
		//session_write_close();
		header("location: ngohome.php?id=".$ngopid);
		
	}
	
?>