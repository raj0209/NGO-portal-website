<?php
include 'connect.php';
$email = $_POST['eml'];


$checkEmail = mysql_query("SELECT * FROM Ngo WHERE email = '$email'");

if(mysql_num_rows($checkEmail)==0){
	?>
	<script>
	alert("This email id doesn't exist");
	</script>
	
<?php
	header("location:forgotpasswordNgo.php");
}

else
{
	header("location:sendNewPasswordNgo.php?a=$email");
}
?>