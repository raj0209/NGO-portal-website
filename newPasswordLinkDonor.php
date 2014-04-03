<?php
include 'connect.php';
$email = $_POST['eml'];

$checkEmail = mysql_query("SELECT * FROM Donor WHERE email = '$email'");

if(mysql_num_rows($checkEmail)==0){
	?>
	<script>
	alert("This email id doesn't exist");
	</script>
	
<?php
	header("location:forgotpasswordDonor.php");
}

else
{

	header("location:sendNewPasswordDonor.php?a=$email");
}
?>