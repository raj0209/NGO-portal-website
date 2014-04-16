<?php
include 'connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//gets the details of Event 
$type=$_SESSION['SESS_TYPE'];
$email=$_SESSION['SESS_EMAIL'];
$pid=$_SESSION['SESS_MEMBER_ID'];
$en = $_POST['eventName'];
$ed = $_POST['eventDetails'];
$el = $_POST['eventLocation'];
$sdate = $_POST['startDate'];
$edate = $_POST['endDate'];
          
//stores the details of Events              
$insertQuery = "insert into NgoPost(ngo_pid,name,detail,fromDate,toDate,location) values('$pid','$en','$ed','$sdate','$edate','$el')";
$result = mysql_query($insertQuery);
	
	if (!$result)
	{
		echo 'Error: ' . mysql_error();
	}
	else
	{
		session_write_close();
		header("location: ngohome.php");
		exit();
	}
?>