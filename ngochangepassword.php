<?php

include 'connect.php';
require_once('auth.php');

//fetches current password, new password and confirmed password
$cur_pass = sha1($_POST['currentPassword']);
$new_pass = sha1($_POST['newPassword']);
$confirm_pass = sha1($_POST['confirmPassword']);

		//fetches id and email of ngo
		if(isset($_SESSION['SESS_TYPE'])){
		$pid=$_SESSION['SESS_MEMBER_ID'];
		$current_email=$_SESSION['SESS_EMAIL'];
		}
		$qry="SELECT * FROM Ngo WHERE pid=$pid AND password='$cur_pass'";
		
		$result=mysql_query($qry);
		if($result) 
		{
		if(mysql_num_rows($result) > 0) 
		{
					if($new_pass == $confirm_pass)  //checks if new password is same as confirm password
						{
						//updates password
						$updateQuery = "UPDATE Ngo SET password='".$new_pass."' WHERE email='".$current_email."'";
						$result = mysql_query($updateQuery);
						if($result)
						{
						Header("refresh:0.001;url=".$_SESSION['LINK_NGOHOME']."?id=".$pid);
						return true;
						}
					}
					else   //if new password & confirm password don't match then display password mismatch
						{
						echo "Password Mismatch";
						Header("refresh:0.0011;url=".$_SESSION['LINK_NGOHOME']."?id=".$pid);
						}
				
				
		}
		else   //if current password entered isn't the correct one then display incorrect password
		{
				?>
				<script>
				alert("Incorrect password");
				</script>
				<?php
				Header("refresh:0.001;url=".$_SESSION['LINK_NGOHOME']."?id=".$pid);
				
		}
		}
		 
		 
?>