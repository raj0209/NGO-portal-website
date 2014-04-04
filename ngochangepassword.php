<?php

include 'connect.php';
require_once('auth.php');
$cur_pass = sha1($_POST['currentPassword']);
$new_pass = sha1($_POST['newPassword']);
$confirm_pass = sha1($_POST['confirmPassword']);


		if(isset($_SESSION['SESS_TYPE'])){
		$pid=$_SESSION['SESS_MEMBER_ID'];
		$current_email=$_SESSION['SESS_EMAIL'];
		}
		$qry="SELECT * FROM Ngo WHERE pid=$pid AND password='$cur_pass'";
		//echo $qry;
		$result=mysql_query($qry);
		if($result) 
		{
		if(mysql_num_rows($result) > 0) 
		{
					if($new_pass == $confirm_pass)
						{
						$updateQuery = "UPDATE Ngo SET password='".$new_pass."' WHERE email='".$current_email."'";
						$result = mysql_query($updateQuery);
						if($result)
						{
						Header("refresh:0.001;url=http://localhost/sampark/NGO-portal-website/ngohome.php?id=".$pid);
						return true;
						}
					}
					else
						{
						echo "Password Mismatch";
						Header("refresh:0.0011;url=http://localhost/sampark/NGO-portal-website/ngohome.php?id=".$pid);
						}
				
				
		}
		else
		{
				?>
				<script>
				alert("Incorrect password");
				</script>
				<?php
				Header("refresh:0.001;url=http://localhost/sampark/NGO-portal-website/ngohome.php?id=".$pid);
				
		}
		}
		 
		 
?>