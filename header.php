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

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		    <!--[if lt IE 9]>
		      <script src="js/html5shiv.js"></script>
		      <![endif]-->

		      <!-- Fav and touch icons -->
		      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
		      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
		      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
		      <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
		      <link rel="shortcut icon" href="ico/favicon.png">
		      <script type="text/javascript" src="main.js"></script>


		      <style>
		      #signupDonor{
		      	display:none;
		      }

		      #signupNgoModal{
		      	display:none;
		      }
		      </style>

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

	  				<div class="nav-collapse collapse">
	  					<ul class="nav nav-tabs">
	  						<li  class= "active" ><a class="brand" href="#">Sampark</a></li>
	  						<!--<li class="active"><a href="#">Home</a></li>-->
	  						<li><a href="#about">About</a></li>
	  						<li><a href="#contact">Contact</a></li>
	  					</ul>
	  					<div align="center" class="nav-collapse collapse" style="margin:10px">
	  						<ul class="nav">
	  							<form class "form-search">
	  								<input type "text" class "span6 search-query" style="margin:10px" placeholder="Search for NGO"/>

	  								<div class="dropdown">
	  									<a id="dLabel" role="button" class="btn btn-primary" data-toggle="dropdown" data-target="#">
	  										Category <span class="caret"></span>								
	  									</a>


	  									<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
	  										<li><a tabindex="-1" href="#">Health</a></li>
	  										<li><a tabindex="-1" href="#">Education</a></li>
	  										<li><a tabindex="-1" href="#">Food</a></li>
	  									</ul>
	  								</div>
	  								<button type="button" class="btn btn-success">Search</button>	
	  							</form>
	  						</ul>
	  					</div>

	  					<ul class="nav pull-right">
	  						<button class="btn btn-lg btn-primary btn-block" type="submit"style="margin:10px" data-toggle="modal" data-target="#signinModal" id="signinHomeButton">Sign in</button>
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
	  								<h4 class="modal-title" id="myModalLabel">Sign in</h4>		
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
	  											<input type="text" value="Email" id="emailDonor" name="emailDonor" class="input-xlarge" onClick="email('emailDonor')" style="color:grey">
	  											<label>Password</label>
	  											<input type="password"  id="passwordDonor" name="passwordDonor" maxlength="25" class="input-xlarge" value="Password" onClick="password('passwordDonor')" style="color:grey">
	  											<form class "well form-inline">
	  												<div>
	  													<input type="submit" class="btn btn-primary" name="dlogin" value="Login" onClick="return submitSignin('emailDonor','passwordDonor')"></button>
	  													<input type="submit" class="btn btn-default" name="dforgot" value="Forgot Password" onClick="#"></button>
	  												</div>
	  											</form>
	  											<div>
	  												<input type="submit" class="btn btn-success" name="dsub" value="Sign Up" id="signupDonorButton" ></button>
	  											</div>
	  										</form>
	  									</div>
	  								</div>
	  								<div class="tab-pane fade" id="signinNgo">
	  										<form action="login_ngo.php" method="post" id="tabNgo" enctype="multipart/form-data">
	  											<input type="hidden" name="ngo" value="ngo">				
	  											<label>Email</label>
	  											<input type="text" value="Email" id="emailNgo" name="emailNgo" class="input-xlarge" onClick="email('emailNgo')" style="color:grey">
	  											<label>Password</label>
	  											<input type="password"  id="passwordNgo" name="passwordNgo" maxlength="25" class="input-xlarge" value="Password" onClick="password('passwordNgo')" style="color:grey">
	  											<form class "well form-inline">
	  												<div>
	  													<input type="submit" class="btn btn-primary" name="nlogin" value="Login" onClick="return submitSignin('emailNgo','passwordNgo')"></button>

	  													<input type="submit" class="btn btn-default" name="nforgot" value="Forgot Password" onClick="#"></button>
	  												</div>
	  											</form>
	  											<div>
	  												<input type="submit" class="btn btn-success" name="signup_ngo_reg" value="Sign Up as NGO" id="signupNgo"></button>
	  											</div><br/>
	  										</form>
	  								</div>
	  							</div>
	  							<div id="signupModalContent">
	  								<div id="signupDonor">
	  									<h4 >Sign up for Donors</h4>
	  									<br>
	  									<form action="signupdonor.php" method="post" id="tab" enctype="multipart/form-data" >

	  										<label>Name</label>
	  										<input type="text" value="First Name" id="fn" name="name" class="input-xlarge" onClick="fnf()" style="color:grey">
	  										<label>Email</label>
	  										<input type="text" value="Email" id="em" name="email" class="input-xlarge" onClick="emlf()" style="color:grey">
	  										<label>Contact Number</label>
	  										<input type="text" value="Mobile Number" id="mob" name="mobile" maxlength="10" class="input-xlarge" onClick="mobf()" style="color:grey">
	  										<label>Password</label>
	  										<input type="password" value="Password" id="pass" name="password" maxlength="25" class="input-xlarge" onClick="pwdf()" style="color:grey">	       
	  										<div>
	  											<div class="btn btn-default btn-file">
	  												<label for="file">Browse Photo</label>
	  												<input type="file" name="image" >
	  											</div >
	  											<input type="submit" class="btn btn-primary" name="submitFormDonor" value="Sign Up" onClick="return submitSignUpForDonor()"></button>
	  										</div>
	  									</form>
	  								</div>

	  								<div id="signupNgoModal">
	  									<h4 >Sign up for NGOs</h4>
	  									<br>

	  									<ul class="nav nav-tabs">
	  										<li class="active"><a href="#regSignupNgo" data-toggle="tab" id="tabRegNGO" >For Registered NGO</a></li>
	  										<li><a href="#unregSignupNgo" data-toggle="tab" id="tabUnRegNGO">For Unregistered NGO</a></li>
	  									</ul>
	  									<div id="myTabContent" class="tab-content">
	  										<div class="tab-pane active in" id="regSignupNgo">
	  											<form action="signupregngo.php" method="post" id="tab" enctype="multipart/form-data">

	  												<label>NGO Name</label>
	  												<input type="text"  id="nn" name="nn" class="input-xlarge" value="Name of NGO" onClick="nnf()" style="color:grey">
	  												<label>Registration Number</label>
	  												<input type="text" id="regno" name="regno" class="input-xlarge" value="Registration Number" onClick="regnof()" style="color:grey">
	  												<label>Name of Contact Person</label>
	  												<input type="text"  id="cn" name="cn" class="input-xlarge" value="Name of Contact Person" onClick="cnf()" style="color:grey">
	  												<label>Email</label>
	  												<input type="text" value="Email" id="eml" name="eml" class="input-xlarge" onClick="emf()" style="color:grey">
	  												<label>Contact Number</label>
	  												<input type="text"  id="cont" name="cont"  maxlength="10" class="input-xlarge" value="Contact Number" onClick="contf()" style="color:grey">
	  												<label>Password</label>
	  												<input type="password"  id="pwd" name="pwd" maxlength="25" class="input-xlarge" value="Password" onClick="passf()" style="color:grey">
	  												<label>Description</label>
	  												<textarea rows="5" id="dc" name="dc" class="input-xlarge" onClick="dcf()" style="color:grey"></textarea>
	  												<label>Vision</label>
	  												<textarea  rows="3" id="vi" name="vi" value="vision" class="input-xlarge" onClick="vif()" style="color:grey"></textarea>
	  												<label>Website</label>
	  												<input type="text"  id="web" name="web" class="input-xlarge" value="Website" onClick="webf()" style="color:grey">
	  												<div>
	  													<div class="btn btn-default btn-file">
	  														<label for="file">Upload Logo</label>
	  														<input type="file" name="regNgoLogo" >
	  													</div >
	  													<input type="submit" class="btn btn-primary" name="submitFormRegNgo" value="Sign Up" onClick="return submit3()"></button>
	  												</div>
	  											</form>
	  										</div>
	  										<div class="tab-pane active in" id="unregSignupNgo">
	  											<form action="signupunregngo.php" method="post" id="tab" enctype="multipart/form-data">

	  												<label>NGO Name</label>
	  												<input type="text"  id="unn" name="unn" class="input-xlarge" value="Name of NGO" onClick="unnf()" style="color:grey">
	  												<label>Name of Contact Person</label>
	  												<input type="text"  id="ucn" name="ucn" class="input-xlarge" value="Name of Contact Person" onClick="ucnf()" style="color:grey">
	  												<label>Email</label>
	  												<input type="text" value="Email" id="ueml" name="ueml" class="input-xlarge" onClick="uemf()" style="color:grey">
	  												<label>Contact Number</label>
	  												<input type="text"  id="ucont" name="ucont" maxlength="10" class="input-xlarge" value="Contact Number" onClick="ucontf()" style="color:grey">
	  												<label>Password</label>
	  												<input type="password"  id="upwd" name="upwd" maxlength="25" class="input-xlarge" value="Password" onClick="upassf()" style="color:grey">
	  												<label>Description</label>
	  												<textarea rows="5" id="udc" name="udc" class="input-xlarge" onClick="udcf()" style="color:grey"></textarea>
	  												<label>Vision</label>
	  												<textarea  rows="3" id="uvi" name="uvi" value="vision" class="input-xlarge" onClick="uvif()" style="color:grey"></textarea>
	  												<div>
	  													<div class="btn btn-default btn-file">
	  														<label for="file">Upload Logo</label>
	  														<input type="file" name="unregNgoLogo" >
	  													</div >
	  													<input type="submit" class="btn btn-primary" name="submitFormUnRegNgo" value="Sign Up" onClick="return submit4()"></button>
	  												</div>
	  											</form>
	  										</div>
	  									</div>
	  								</div>
	  							</div>


	  						</div>
	  					</div>

	  				</div> 
	  				<script src="bootstrap.min.js"></script>
	  			</div>

	  		</div>
	  	</div><!-- /container -->

	 </body>
</html>
