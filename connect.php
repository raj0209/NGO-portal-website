<?php 

//connection detail
$server = 'http://119.9.73.226/';
$user = 'ngoportal';
$pass = 'ngoportal';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['LINK_INDEX'] = "http://119.9.73.226/index.php";
$_SESSION['LINK_DONORHOME'] = "http://119.9.73.226/donorhome.php";
$_SESSION['LINK_NGOHOME'] = "http://119.9.73.226/ngohome.php";

// Create connection
$con = mysql_connect($server, $user, $pass) or die("Can't connect from connect.php");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
// Make sampark the current database
$db_selected = mysql_select_db('sampark', $con);

// if sampark database does not exist we create it here -Vijay13
if (!$db_selected) {
  // If we couldn't, then it either doesn't exist, or we can't see it.
  $sql = 'CREATE DATABASE sampark';

  if (mysql_query($sql)) {
      //echo "Database sampark created successfully from connect.php";
  } else {
      echo 'Error creating database: ' . mysql_error() . "from connect.php";
  }
}

?> 