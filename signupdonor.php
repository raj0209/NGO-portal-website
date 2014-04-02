<?php

include 'connect.php';

$f = $_POST['name'];
$e = $_POST['email'];
$m = $_POST['mobile'];
$p = sha1($_POST['password']);



	if ($_FILES["image"]["error"] > 0)
	{
		$filePath = "img/logos/default_donor.jpeg";
	}

	else
	{
		$randomName = substr(sha1(rand()), 0, 10);
		$filePath = "img/logos/_".$randomName."_".$_FILES["image"]["name"];
	  
		if(!move_uploaded_file($_FILES["image"]["tmp_name"],$filePath))
		{
			$filePath = "img/logos/default_donor.jpeg";
		}
	}
  
	$result2 = mysql_query("SELECT * FROM Donor WHERE email = '$e'");
	
	if(mysql_num_rows($result2)>0){
	?>
		<script type="text/javascript">
		alert("The email address <?php echo $e; ?> is already registered.");
		
		</script>

	<?php
		header("refresh:0.1;url=http://localhost/sampark/NGO-portal-website/index.php");
	}
		
		//$('#signupModalContent').modal("show");
	
		
	
		
	else
	{	
	$insertQuery = "insert into Donor(name,photo,email,contact,password) values('$f','$filePath','$e','$m','$p')";
	$result = mysql_query($insertQuery);
		
		if (!$result)
		{
			echo "'$f','$e','$m','$p',Error: ";
		}
		else
		{
			echo "<font size = '5'><font color=\"#0CF44A\">ACCOUNT CREATED...SIGN IN USING THE ACTIVATION LINK SENT TO YOUR EMAIL ID";
			//header("refresh:3;url=http://localhost/sampark/NGO-portal-website/index.php");
		}
		
		header("location:sendmail.php?a=$e");
	}

?>