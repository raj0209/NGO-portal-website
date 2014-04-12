<?php

require_once('auth.php');
//session_start();
include 'connect.php';
$loggedIn=false;

if(isset($_SESSION['SESS_TYPE']))
{
    $type=$_SESSION['SESS_TYPE'];
	$email=$_SESSION['SESS_EMAIL'];
    $pid=$_SESSION['SESS_MEMBER_ID'];
}
else
{
    $type="GUEST";
}

if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '' )){
    $loggedIn = false;
}
else{
    $loggedIn = true;
}

$ratingvalue=$_POST['rating'];
	
   if($loggedIn && $type=="DONOR")
    {
        $donorPid=$_SESSION['SESS_MEMBER_ID'];
        $pid = $_POST['pid'];
		mysql_query("DELETE FROM Rates where ngo_pid=$pid AND donor_pid=$donorPid");
        $insertQuery = "INSERT INTO Rates values('$donorPid','$pid','$ratingvalue',1)";
		$result = mysql_query($insertQuery);
		
		
		//echo $pid;
		
		//$total_rate_all=mysql_query("SELECT SUM(rating) FROM Rates");
		$result3=mysql_query("SELECT SUM(rating) FROM Rates");
		$row3=mysql_fetch_row($result3);
		$total_rate_all=(int)$row3[0];
		
		//echo $total_rate_all;
		
		
		//$total_rate_all_fetch=mysql_fetch_array($total_rate_all_arr);
		//$total_rate_all=$total_rate_all_fetch["SUM"];
		//$total_votes_all=mysql_query("SELECT COUNT(donor_pid) from Rates");
		$result4=mysql_query("SELECT COUNT(donor_pid) from Rates");
		$row4=mysql_fetch_row($result4);
		$total_votes_all=(int)$row4[0];
		//$total_votes_all_fetch=mysql_fetch_array($total_votes_all_arr);
		//$total_votes_all=$total_rate_all_fetch["COUNT"];
		
		//echo $total_votes_all;
		
		
		$C=$total_rate_all/$total_votes_all;
		
		//echo $C;
		
		$m=1;
		
		$result1=mysql_query("SELECT SUM(rating) FROM Rates WHERE ngo_pid=$pid"); 
		$row = mysql_fetch_row($result1);
		$total_rate=(int)$row[0];
		
		
		
		//echo $total_rate;
		
		
		
		$result2=mysql_query("SELECT COUNT(donor_pid) from Rates WHERE ngo_pid=$pid");
		$row2 = mysql_fetch_row($result2);
		$totalVotes_org=(int)$row2[0];
		//$totalVotes_org= $totalVotes_org +1;
		//$total_rate=$total_rate+$ratingvalue;
		$R=$total_rate/$totalVotes_org;
		//echo "Aaa ";
		//echo $total_rate;
		//echo "\n";
		
		
		
		//echo $totalVotes_org;
		
		
		
		//echo "\n";
		//echo $R;
		
		$result3=mysql_query("SELECT SUM(rating) FROM Rates");
		$row3=mysql_fetch_row($result3);
		$total_rate_all=(int)$row3[0];
		
		
		$result4=mysql_query("SELECT COUNT(donor_pid) from Rates");
		$row4=mysql_fetch_row($result4);
		$total_votes_all=(int)$row4[0];
		
		
		$C=$total_rate_all/$total_votes_all;
		
		 
		$WR=(($R*$totalVotes_org)+($C*$m))/($totalVotes_org + $m);

		mysql_query("UPDATE Ngo SET rate=$R, weighted_rate=$WR WHERE pid=$pid");

		header("refresh:0.001;url=".$_SESSION['LINK_NGOHOME']."?id=".$pid);
    }

?>