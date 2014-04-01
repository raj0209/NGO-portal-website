<?php



/*
	* This is a function that updates all the essential changes when a donator rates an NGO
*/
	$total_rate_all=mysql_query("SUM(Select rate from rates)");
	$total_votes_all=mysql_query("SELECT COUNT(Ngo_pid, donor_pid) from rates");
	$C=$total_rate_all/$total_votes_all;
	function onVote($Ngo_pid, $donor_pid, $rate)
	{

		mysql_query("DELETE FROM rates where Ngo_pid=$Ngo_pid AND donor_pid=$donor_pid");
		mysql_query("INSERT INTO rates VALUES($Ngo_pid, $donor_pid, $rate");
		$total_rate=mysql_query("SUM(SELECT rate from rates WHERE Ngo_pid=$Ngo_pid)"); // R
		$totalVotes_org=mysql_query("SELECT COUNT(donor_pid) from rates WHERE Ngo_pid='$Ngo_pid'");
		$totalVotes_org= $totalVotes_org +1;//V
		$total_rate=$total_rate+rate;
		$R=$total_rate/$totalVotes_org;
		$total_rate_all=mysql_query("SUM(Select rate from rates)");
		$total_votes_all=mysql_query("SELECT COUNT(Ngo_pid, donor_pid) from rates");
		$C=$total_rate_all/$total_votes_all;
		
		 
		$WR=(($R*$totalVotes_org)+($C*$m))/($totalVotes_org + $m));

		mysql_query("UPDATE Ngo SET rate=$R, weighted_rate=$WR WHERE Ngo_pid=$Ngo_pid");

		//write $R and $WR to database
	}
?>