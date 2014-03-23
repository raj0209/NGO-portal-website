<?php

include 'connect.php';

session_start(); 

$f = $_POST['name'];
$e = $_POST['email'];
$m = $_POST['mobile'];
$p = md5($_POST['password']);

$target = "/img";
$target = $target.basename( $_FILES['photo']['name'] );

echo "im: ".$target;

//echo "fn: ".$f;
//echo "fn: ".$e;
//echo "fn: ".$m;
//echo "fn: ".$p;

$insertQuery = "insert into Donor(name,photo,email,contact,password) values('$f','photo','$e','$m','$p')";
$result = mysql_query($insertQuery);

if($result)
	echo "Registered Successfully";
else
	echo "Try again";

//get the new user id
$userid = mysql_insert_id();
             
//create a random key
$key = $username . $email . date('mY');
$key = md5($key);
             
//add confirm row
$confirm = mysql_query("INSERT INTO `confirm` VALUES(NULL,'$userid','$key','$email')"); 
             
if($confirm){
             
    //let's send the email
 
}else{
                 
    $action['result'] = 'error';
    array_push($text,'Confirm row was not added to the database. Reason: ' . mysql_error());
                 
}

?>