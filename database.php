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
contact VARCHAR( 20 ) ,
password VARCHAR( 300 ) NOT NULL)"; 

$resultDonor = mysql_query($sqlQueryDonor);

// ngo's detail table
$sqlQueryNgor = "CREATE TABLE IF NOT EXISTS Ngo(
pid INT NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( pid ) ,
name VARCHAR( 100 ) NOT NULL ,
logo VARCHAR( 300 ) ,
address VARCHAR( 500 ),
description VARCHAR ( 2000 ) ,
vision VARCHAR ( 2000 ) ,
contact_person VARCHAR ( 100 ) NOT NULL ,
email VARCHAR( 100 ) NOT NULL Unique,
contact VARCHAR( 20 ) ,
rate DOUBLE NOT NULL ,
website VARCHAR(100) ,
rstatus TINYINT ,
rnumber VARCHAR( 30 ) ,
password VARCHAR( 300 ) NOT NULL)";

$resultNgor = mysql_query($sqlQueryNgor);

// Event table, dstatus is donation status, estatus is email status sent/notsent,
// commdate is communication date 
$sqlQueryEvent = "CREATE TABLE IF NOT EXISTS Event(
donor_pid INT,
ngo_pid INT,
dstatus VARCHAR( 300 ),
commdate DATE ,
message VARCHAR( 2000 ),
dateofevent DATE,
rategiven INT,
estatus TINYINT,
FOREIGN KEY (donor_pid) REFERENCES Donor(pid),
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultEvent = mysql_query($sqlQueryEvent);

// Ngo catagories
$sqlQueryCat = "CREATE TABLE IF NOT EXISTS catNgo(
ngo_pid INT NOT NULL,
category VARCHAR( 50 ),
FOREIGN KEY (donor_pid) REFERENCES Donor(pid))";

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
pnumb VARCHAR( 20 ) NOT NULL,
pemail VARCHAR( 100 ) NOT NULL,
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultContNgo = mysql_query($sqlQueryContNgo);

// Details of posts of NGO
$sqlQueryPostNgo = "CREATE TABLE IF NOT EXISTS ngoPost(
ngo_pid INT NOT NULL,
name VARCHAR( 100 ) NOT NULL,
detail VARCHAR( 100 ) ,
postTime DATETIME UNIQUE,
fromDate VARCHAR( 20 ) ,
toDate VARCHAR( 20 ) ,
location VARCHAR( 100 ) ,
FOREIGN KEY (ngo_pid) REFERENCES Ngo(pid))";

$resultPostNgo = mysql_query($sqlQueryPostNgo);



if (!$resultDonor || !$resultNgor || !$resultEvent || !$resultFav || !$resultContNgo || !$resultPostNgo) {
    echo "<script type='text/javascript'>alert('failed!')</script>";
}
?>