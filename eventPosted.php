<?php
include 'connect.php';
session_start();    


$type=$_SESSION['SESS_TYPE'];
$email=$_SESSION['SESS_EMAIL'];
$pid=$_SESSION['SESS_MEMBER_ID'];
$en = $_POST['eventName'];
$ed = $_POST['eventDetails'];
$el = $_POST['eventLocation'];
$sdate = $_POST['startDate'];
$edate = $_POST['endDate'];

$mysqldate = time();
//echo $mysqldate;
echo date("Y-m-d H:i:s",time());
$mili=round(microtime(true) * 1000000);
echo str_append(date("Y-m-d H:i:s",time()),$mili);
                                    
              /*
$insertQuery = "insert into ngoPost(ngo_pid,name,detail,postTime,fromDate,toDate,location) values('$pid','$en','$ed','$mysqldate','$sdate','$edate','$el')";
$result = mysql_query($insertQuery);
	
	if (!$result)
	{
		die('Error: ' . mysql_error());
	}
	else
	{
		session_write_close();
		header("location: ngohome.php");
		exit();
	}
	*/
?>