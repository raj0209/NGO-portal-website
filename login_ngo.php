<?php

include 'connect.php';


if (isset($_POST["donor"])) {

	$email = $_POST["emailDonor"];
	$password = $_POST["passwordDonor"];
	
	$query = "SELECT * FROM Donor WHERE email = '".$email."'";
	$result = mysql_query($query);

	// If one row is returned, username and password are valid
    if ($result) {

    	while($row = mysql_fetch_array($result))
    	{
    		if(decryptIt($row['password']) == $password)
    		{
    			echo "Logged in successfully";

    			http_redirect('http://localhost/sampark/index.php');
    		}else{
    			echo "Wrong password";
    		}	
    	}

    } 
    else {
        // If number of rows returned is not one, redirect back to login screen
        echo "Wrong username";
    }

}elseif(isset($_POST["ngo"])){  
    echo "ngo is not set".$_POST["emailNgo"].$_POST["passwordNgo"];
}else{
	echo "ngo is not set";
}

function decryptIt( $q ) {
    $cryptKey  = 'manmeramanena';
    //$qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $q );
}

?>