<?php
include 'connect.php';
session_start();    

//gets id, email of NGO
$type=$_SESSION['SESS_TYPE'];
$email=$_SESSION['SESS_EMAIL'];
$pid=$_SESSION['SESS_MEMBER_ID'];

$timeStamp = $_POST['postTime'];
$pid = $_POST['ngoPid'];

//deletes the posted evented 
$query = "DELETE FROM ngoPost WHERE ngo_pid = '$pid' AND postTime = '$timeStamp'";
$result = mysql_query($query);

if($result){
	header("location: ngohome.php");
}else{
	echo "Could not delete post posted on ".$timeStamp;
}

?>