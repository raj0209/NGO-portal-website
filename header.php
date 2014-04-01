<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to Sampark</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="icons/NGO_icon_Browser_bar.png">
		<!-- Le styles -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="main.css" rel="stylesheet">	    
		<style>
		.dropdown{
			display:inline-block;
		}
		</style>
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="jquery.js"></script>
		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="ico/favicon.png">
		<script type="text/javascript" src="main.js"></script>
	</head>

	<body>

	  	<div class="navbar navbar-inverse navbar-fixed-top">
	  		<div class="navbar-inner">
	  			<div class="container">
	  				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	  					<span class="icon-bar"></span>
	  					<span class="icon-bar"></span>
	  					<span class="icon-bar"></span>
	  				</button>
	  				<!--<img class="img-responsive" src="icons/NGO_icon.png">-->

	  				<div class="nav-collapse collapse" style="margin-top:9px">
	  					<ul class="nav nav-tabs">
	  						<li  class= "active" ><a class="brand" href="#">Sampark</a></li>
	  						<li><a href="rankingpage.php">Top Organizations</a></li>
	  						<li><a href="contact.php">Contact</a></li>	
	  					</ul>
	  					<div align="center" class="nav-collapse collapse" style="margin:10px">
	  						<ul class="nav">
	  							<form style="z-index: -1;" action="search.php" method="post" enctype="multipart/form-data" >
	  								<input type="text" name="searchQuery" class="span4 search-query" style="margin:10px" placeholder="Search for NGO"/>
	  								<div class="dropdown">
	  									<a id="dLabel" role="button" class="btn btn-primary" data-toggle="dropdown" data-target="#">
	  										Category <span class="caret"></span>								
	  									</a>
	  									<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
	  										<li><a tabindex="-1" href="#" >Health</a></li>
	  										<li><a tabindex="-1" href="#">Education</a></li>
	  										<li><a tabindex="-1" href="#">Food</a></li>
	  									</ul>
	  								</div>
	  								<button type="submit" class="btn btn-success">Search</button>	
	  							</form>
	  						</ul>
	  					</div>

	  					<ul class="nav pull-right" style="margin-top:9px">
							<?php if(isset($_SESSION['SESS_MEMBER_ID'])){ if($_SESSION['SESS_MEMBER_ID']=="NGO"){echo "<a style=\"color:white;text-decoration:none\" href=\"ngohome.php\"><input type=\"button\" class=\"btn btn-success\" name=\"myhome\" value=\"My Home\" id=\"signup\" style=\"margin:10px\" data-toggle=\"modal\"></a>";} else { echo "<a style=\"color:white;text-decoration:none\" href=\"ngohome.php\"><input type=\"button\" class=\"btn btn-success\" name=\"myhome\" value=\"My Home\" id=\"signup\" style=\"margin:10px\" data-toggle=\"modal\"></a>"; }} else echo "<input type=\"button\" class=\"btn btn-success\" name=\"signup\" value=\"Create Account\" id=\"signup\" style=\"margin:10px\" data-toggle=\"modal\" data-target=\"#signupModal\">"?>
							<?php if(isset($_SESSION['SESS_MEMBER_ID'])) echo "<a style=\"color:white;text-decoration:none\" href=\"logout.php\"><button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\" style=\"margin:10px\" data-toggle=\"modal\">Log out</button></a>"; else echo "<button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\" style=\"margin:10px\" data-toggle=\"modal\" data-target=\"#signinModal\" id=\"signinHomeButton\">Sign In</button>" ?>
							
						</ul>
	  				</div><!--/.nav-collapse -->
	  			</div>
	  		</div>
	  	</div>

	  	<div class="container" style="margin:50px">
	  		<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  			<div class="modal-dialog">
	  				<div class="modal-header">
	  					<button type="button" id="closes" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  				</div>
	  				<br>
	  				<div class="modal-content">
	  					<div class="modal-body">
	  						<div class="well">
	  							<div id="signinModalContent">
	  								<h4 class="modal-title" id="myModalLabel">Sign In </h4>		
	  								<br>
	  								<ul class="nav nav-tabs">
	  									<li class="active" id="donorTab" ><a href="#signinDonor" data-toggle="tab">Donor</a></li>
	  									<li id="ngoTab"><a href="#signinNgo" data-toggle="tab">NGO</a></li>
	  								</ul>
	  								<div id="myTabContent" class="tab-content">
	  									<div class="tab-pane active in" id="signinDonor">									
	  										<form action="login_donor.php" method="post" id="tabDonor" enctype="multipart/form-data">
	  											<input type="hidden" name="donor" value="donor">
	  											<label>Email</label>
	  											<input type="text" placeholder="Email" id="emailDonor" name="emailDonor" class="input-xlarge" style="color:black">
	  											<label>Password</label>
	  											<input type="password"  id="passwordDonor" name="passwordDonor" maxlength="25" class="input-xlarge" placeholder="Password" style="color:black">
	  											<div class="well form-inline">
	  												<div>
	  													<input type="submit" class="btn btn-primary" name="dlogin" value="Login" onClick="return submitSignin('emailDonor','passwordDonor')">
	  													<input type="button" class="btn btn-default" name="dforgot" value="Forgot Password" onClick="#">
	  												</div>
	  											</div>
	  											<!--<div>
	  												<input type="button" class="btn btn-success" name="dsub" value="Sign Up" id="signupDonorButton" >
	  											</div>-->
	  										</form>
	  									</div>
	  								</div>
	  								<div class="tab-pane fade" id="signinNgo">
	  										<form action="login_ngo.php" method="post" id="tabNgo" enctype="multipart/form-data">
	  											<input type="hidden" name="ngo" value="ngo">				
	  											<label>Email</label>
	  											<input type="text" placeholder="Email" id="emailNgo" name="emailNgo" class="input-xlarge" style="color:black">
	  											<label>Password</label>
	  											<input type="password"  id="passwordNgo" name="passwordNgo" maxlength="25" class="input-xlarge" placeholder="Password" style="color:black">
	  											<div class="well form-inline">
	  												<div>
	  													<input type="submit" class="btn btn-primary" name="nlogin" value="Login" onClick="return submitSignin('emailNgo','passwordNgo')">
	  													<input type="button" class="btn btn-default" name="nforgot" value="Forgot Password" onClick="#">
	  												</div>
	  											</div>
	  										</form>

  											<!--<div>
  												<input type="button" class="btn btn-success" name="signup_ngo_reg" value="Sign Up as NGO" id="signupNgo">
  											</div>-->
	  								</div>
	  							</div>
	  							
	  					</div>

	  				</div> 
	  				<script src="bootstrap.min.js"></script>
	  			</div>

	  		</div>
	  	</div><!-- /container -->
		<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  			<div class="modal-dialog">
	  				<div class="modal-header">
	  					<button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  				</div>
	  				<br>
	  				<div class="modal-content">
	  					<div class="modal-body">
	  						<div class="well">
								<div id="signupModalContent">	
											<h4 >Sign Up</h4>
											<br>

											<ul class="nav nav-tabs">
												<li class="active" id="tabDonorSignUp"><a href="#SignupDonor" data-toggle="tab">For Donor</a></li>
												<li id="tabRegNGOSignUp"><a href="#regSignupNgo" data-toggle="tab" >For Registered NGO</a></li>
												<li id="tabUnRegNGOSignUp"><a href="#unregSignupNgo" data-toggle="tab">For Unregistered NGO</a></li>
											</ul>
											<div id="myTabContent" class="tab-content">
	  										<div class="tab-pane active in" id="SignupDonor">
												<form action="signupdonor.php" method="post" id="tab" enctype="multipart/form-data" >

												<label>Name</label>
												<input type="text" placeholder="First Name" id="fn" name="name" class="input-xlarge" style="color:black">
												<label>Email</label>
												<input type="text" placeholder="Email" id="em" name="email" class="input-xlarge" style="color:black">
												<label>Contact Number</label>
												<input type="text" placeholder="Mobile Number" id="mob" name="mobile" maxlength="10" class="input-xlarge" style="color:black">
												<label>Password</label>
												<input type="password" placeholder="Password" id="pass" name="password" maxlength="25" class="input-xlarge" style="color:black">	       
												<div>
														<span>Profile Picture</span>
	  													<div>
															<input name="image" type="file" />
														</div> 												
														<input type="submit" class="btn btn-primary" name="submitFormDonor" value="Sign Up" onClick="return submitSignUpForDonor()">
												</div>
												</form>
											</div>
											
	  										<div class="tab-pane fade" id="regSignupNgo">
	  											<form action="signupregngo.php" method="post" id="tab" enctype="multipart/form-data">

	  												<label>NGO Name</label>
	  												<input type="text"  id="nn" name="nn" class="input-xlarge" placeholder="Name of NGO" style="color:black">
	  												<label>Registration Number</label>
	  												<input type="text" id="regno" name="regno" class="input-xlarge" placeholder="Registration Number" style="color:black">
	  												<label>Name of Contact Person</label>
	  												<input type="text"  id="cn" name="cn" class="input-xlarge" placeholder="Name of Contact Person" style="color:black">
	  												<label>Email</label>
	  												<input type="text" placeholder="Email" id="eml" name="eml" class="input-xlarge" style="color:black">
	  												<label>Contact Number</label>
	  												<input type="text"  id="cont" name="cont"  maxlength="10" class="input-xlarge" placeholder="Contact Number" style="color:black">
	  												<label>Password</label>
	  												<input type="password"  id="pwd" name="pwd" maxlength="25" class="input-xlarge" placeholder="Password" style="color:black">
	  												<label>Description</label>
	  												<textarea rows="5" id="dc" name="dc" class="input-xlarge" placeholder="Description" style="color:black"></textarea>
	  												<label>Address</label>
	  												<textarea rows="5" id="add" name="add" class="input-xlarge" placeholder="Address" style="color:black"></textarea>
													<label>Vision</label>
	  												<textarea  rows="3" id="vi" name="vi" class="input-xlarge" placeholder="Vision" style="color:black"></textarea>
	  												<label>Website</label>
	  												<input type="text"  id="web" name="web" class="input-xlarge" placeholder="Website" style="color:black">
	  												
													<label name ="category"> Category </label>
														<input type="checkbox" id = "Health" name="box[]" value="Health"> Health<br>
														<input type="checkbox" id = "Food"  name="box[]" value="Food"> Food <br>
														<input type="checkbox" id = "Education"  name="box[]" value=" Education"> Education<br>
														<input type="checkbox" id = "Old"  name="box[]" value="Old"> Oldage<br>
														<input type="checkbox" id = "Child"  name="box[]" value=" Child"> Child<br>
													<div>
	  													<span>Upload Logo</span>
														<div>										
														<input name="regNgoLogo" type="file" />
														</div>
	  													<input type="submit" class="btn btn-primary" name="submitFormRegNgo" value="Sign Up" onClick="return submit3()">
	  												</div>
	  											</form>
	  										</div>

	  										<div class="tab-pane fade" id="unregSignupNgo">
	  											<form action="signupunregngo.php" method="post" id="tab" enctype="multipart/form-data">

	  												<label>NGO Name</label>
	  												<input type="text"  id="unn" name="unn" class="input-xlarge" placeholder="Name of NGO" style="color:black">
	  												<label>Name of Contact Person</label>
	  												<input type="text"  id="ucn" name="ucn" class="input-xlarge" placeholder="Name of Contact Person" style="color:black">
	  												<label>Email</label>
	  												<input type="text" placeholder="Email" id="ueml" name="ueml" class="input-xlarge" style="color:black">
	  												<label>Contact Number</label>
	  												<input type="text"  id="ucont" name="ucont" maxlength="10" class="input-xlarge" placeholder="Contact Number" style="color:black">
	  												<label>Password</label>
	  												<input type="password"  id="upwd" name="upwd" maxlength="25" class="input-xlarge" placeholder="Password" style="color:black">
	  												<label>Description</label>
	  												<textarea rows="5" id="udc" name="udc" class="input-xlarge" placeholder="Description" style="color:black"></textarea>
	  												<label>Address</label>
	  												<textarea rows="5" id="uadd" name="uadd" class="input-xlarge" placeholder="Address" style="color:black"></textarea>
													<label>Vision</label>
	  												<textarea  rows="3" id="uvi" name="uvi" placeholder="vision" class="input-xlarge" style="color:black"></textarea>
														<label> Category </label>
														<input type="checkbox" id ="uHealth" name="box[]" value="Health"> Health<br>
														<input type="checkbox" id ="uFood" name="box[]" value="Food"> Food <br>
														<input type="checkbox" id ="uEducation" name="box[]" value=" Education"> Education<br>
														<input type="checkbox" id ="uOld" name="box[]" value="Old"> Oldage<br>
														<input type="checkbox" id ="uChild" name="box[]" value="Child"> Child<br>
													
													<div>
														<span>Upload Logo</span>
	  													<div>	  														
														<input name="regNgoLogo" type="file" />
	  													</div>
	  													<input type="submit" class="btn btn-primary" name="submitFormUnRegNgo" value="Sign Up" onClick="return submit4()">
	  												</div>
	  											</form>
	  										</div>
	  									</div>
										
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>	  						
	</div>
	</body>
</html>
