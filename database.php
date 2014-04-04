<?php

/*
 * This file contains all the tables - Vijay13
 * Please do not use a variable for more than one assignment, its bad practice in PhP
 */

// Donor's detail table
$sqlQueryDonor = "CREATE TABLE IF NOT EXISTS Donor(
pid INT NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( pid ) ,
name VARCHAR( 100 ) NOT NULL ,
photo VARCHAR( 300 ) ,
email VARCHAR( 100 ) NOT NULL Unique,
contact VARCHAR( 10 ) ,
verified_Donor VARCHAR(20) ,
password VARCHAR( 300 ) NOT NULL)"; 

$resultDonor = mysql_query($sqlQueryDonor);

// ngo's detail table
$sqlQueryNgo = "CREATE TABLE IF NOT EXISTS Ngo(
pid INT NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( pid ) ,
name VARCHAR( 100 ) NOT NULL ,
logo VARCHAR( 300 ) ,
address VARCHAR( 500 ),
city VARCHAR( 30 ),
state VARCHAR( 30 ),
description VARCHAR ( 2000 ) ,
vision VARCHAR ( 2000 ) ,
contact_person VARCHAR ( 100 ) NOT NULL ,
email VARCHAR( 100 ) NOT NULL Unique,
contact VARCHAR( 10 ) ,
rate DOUBLE NOT NULL ,
website VARCHAR(100) ,
rstatus TINYINT ,
rnumber VARCHAR( 30 ) ,
verified_Ngo VARCHAR(20),
weighted_rate DOUBLE,
password VARCHAR( 300 ) NOT NULL)";

$resultNgo = mysql_query($sqlQueryNgo);

// Event table, dstatus is donation status, estatus is email status sent/notsent,
// commdate is communication date 
$sqlQueryEvent = "CREATE TABLE IF NOT EXISTS Event(
donor_pid INT,
ngo_pid INT,
dstatus VARCHAR( 300 ),
commdate TIMESTAMP UNIQUE ,
message VARCHAR( 2000 ),
dateofevent DATE,
estatus TINYINT,
FOREIGN KEY (donor_pid) REFERENCES Donor(pid),
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultEvent = mysql_query($sqlQueryEvent);

// Ngo catagories
$sqlQueryCat = "CREATE TABLE IF NOT EXISTS CatNgo(
ngo_pid INT NOT NULL,
category VARCHAR( 50 ),
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultCatNgo = mysql_query($sqlQueryCat);

// Who is whose favorite
$sqlQueryFav = "CREATE TABLE IF NOT EXISTS Fav(
donor_pid INT NOT NULL,
ngo_pid INT NOT NULL,
FOREIGN KEY (donor_pid) REFERENCES Donor(pid),
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultFav = mysql_query($sqlQueryFav);


// Details of posts of NGO
$sqlQueryPostNgo = "CREATE TABLE IF NOT EXISTS NgoPost(
ngo_pid INT NOT NULL,
name VARCHAR( 100 ) NOT NULL,
detail VARCHAR( 1000 ) ,
postTime TIMESTAMP UNIQUE,
fromDate VARCHAR( 20 ) ,
toDate VARCHAR( 20 ) ,
location VARCHAR( 100 ) ,
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultPostNgo = mysql_query($sqlQueryPostNgo);

//rating table
$sqlQueryRate = "CREATE TABLE IF NOT EXISTS Rates(
donor_pid INT NOT NULL,
ngo_pid INT NOT NULL,
rating TINYINT NOT NULL,
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid),
FOREIGN KEY (donor_pid) REFERENCES Donor(pid))";

$resultRate = mysql_query($sqlQueryRate);

if (!$resultDonor || !$resultNgo || !$resultEvent || !$resultFav || !$resultRate || !$resultPostNgo || !$resultCatNgo ) {
    echo "<script type='text/javascript'>alert('failed!')</script>";
}
?>