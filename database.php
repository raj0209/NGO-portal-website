<?php

/*
 * This file contains all the tables - Vijay13
 * Please do not use a variable for more than one assignment, its bad practice in PhP
 */

// Donor's detail table
$sqlQueryDonor = "CREATE TABLE IF NOT EXISTS Donor(
pid INT NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( pid ) ,
name VARCHAR( 30 ) NOT NULL ,
photo blob ,
email VARCHAR( 40 ) NOT NULL ,
contact VARCHAR( 20 ) ,
password VARCHAR( 20 ) NOT NULL)"; 

$resultDonor = mysql_query($sqlQueryDonor);

// ngo's detail table
$sqlQueryNgor = "CREATE TABLE IF NOT EXISTS Ngo(
pid INT NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( pid ) ,
name VARCHAR( 30 ) NOT NULL ,
logo blob ,
description VARCHAR ( 200 ) ,
vision VARCHAR ( 200 ) ,
contact_person VARCHAR ( 50 ) NOT NULL ,
email VARCHAR( 40 ) NOT NULL ,
contact VARCHAR( 20 ) ,
rate DOUBLE NOT NULL ,
website VARCHAR(100) ,
rstatus TINYINT ,
rnumber VARCHAR( 20 ) ,
password VARCHAR( 20 ) NOT NULL)";

$resultNgor = mysql_query($sqlQueryNgor);

// Event table, dstatus is donation status, estatus is email status sent/notsent,
// commdate is communication date 
$sqlQueryEvent = "CREATE TABLE IF NOT EXISTS Event(
donor_pid INT,
ngo_pid INT,
dstatus VARCHAR( 100 ),
commdate DATE ,
message VARCHAR( 200 ),
dateofevent DATE,
rategiven INT,
estatus TINYINT,
FOREIGN KEY (donor_pid) REFERENCES Donor(pid),
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultEvent = mysql_query($sqlQueryEvent);

// Who is whose favorite
$sqlQueryFav = "CREATE TABLE IF NOT EXISTS Fav(
donor_pid INT NOT NULL,
ngo_pid INT NOT NULL,
FOREIGN KEY (donor_pid) REFERENCES Donor(pid),
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultFav = mysql_query($sqlQueryFav);

// Details of contact person of NGO
$sqlQueryContNgo = "CREATE TABLE IF NOT EXISTS ContNgo(
ngo_pid INT NOT NULL,
pname VARCHAR( 100 ) NOT NULL,
pnumb VARCHAR( 10 ) NOT NULL,
pemail VARCHAR( 20 ) NOT NULL,
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultContNgo = mysql_query($sqlQueryContNgo);



if (!$resultDonor || !$resultNgor || !$resultEvent || !$resultFav || !$resultContNgo) {
    echo "<script type='text/javascript'>alert('failed!')</script>";
}
?>