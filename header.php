<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<div class="nav-collapse collapse" style="margin:10px">
				<ul class="nav nav-tabs">
					<li  class= "active" ><a class="brand" href="index.php">Sampark</a></li>
					<li><a href="rankingpage.php">Top Organizations</a></li>
					<li><a href="contact.php">Contact</a></li>	
				</ul>

				<div align="center" class="nav-collapse collapse">
					<div class="nav">
						<form style="z-index: -1;" action="search.php" method="post" enctype="multipart/form-data" >
              <input type="text" name="searchQuery" class="span4 search-query" style="margin:10px; height: 30px" placeholder="Search for NGO"/>
              <input type="hidden" id="selectedCatagory" name="selectedCatagory" value="All" >
              
              <div class="dropdown">
                <a style="height: 20px; width:100px" id="dLabel" role="button" class="btn btn-success" data-toggle="dropdown" data-target="#">
                  Category <span class="caret" style="float: right"></span>                
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">

                  <?php
                  // this fetches catagories present in database and adds to list
                  $queryCats = "SELECT DISTINCT category FROM CatNgo";
                  $resultCats = mysql_query($queryCats);

                  if($resultCats) {
                    if(mysql_num_rows($resultCats) > 0) {
                      while ($row = mysql_fetch_assoc($resultCats)) {
                         $nameCat = $row['category'];
                         ?>
                            <li><a tabindex="-1" href="#" onClick="itemSelected('<?php echo $nameCat; ?>')" ><?php echo $nameCat; ?></a></li>
                         <?php 
                      }
                    }else{ ?>
                      <li><a tabindex="-1" href="#" onClick="itemSelected('All')" >All</a></li>
                      <?php
                    }
                  }else{?>
                      <li><a tabindex="-1" href="#" onClick="itemSelected('All')" >All</a></li>
                      <?php
                  }
                  ?>

                </ul>
              </div>
              
              <button type="submit" class="btn btn-primary">Search</button> 
            </form>
					</div>
				</div>
				
        <div style="margin-top:10px">
				<?php if(!isset($_SESSION))
				session_start() ?>
  				<ul class="nav pull-right" style="margin-top:5px" >
  					<?php if(isset($_SESSION['SESS_MEMBER_ID'])){ if($_SESSION['SESS_TYPE']=="NGO"){echo "<a style=\"color:white;text-decoration:none\" href=\"ngohome.php\"><input type=\"button\" class=\"btn btn-success\" name=\"myhome\" value=\"My Home\" id=\"signup\" style=\"margin:10px\" data-toggle=\"modal\"></a>";} else { echo "<a style=\"color:white;text-decoration:none\" href=\"donorhome.php\"><input type=\"button\" class=\"btn btn-success\" name=\"myhome\" value=\"My Home\" id=\"signup\" style=\"margin:10px\" data-toggle=\"modal\"></a>"; }} else echo "<input type=\"button\" class=\"btn btn-success\" name=\"signup\" value=\"Create Account\" id=\"signup\" style=\"margin:10px\" data-toggle=\"modal\" data-target=\"#signupModal\">"?>
  					<?php if(isset($_SESSION['SESS_MEMBER_ID'])) echo "<a style=\"color:white;text-decoration:none\" href=\"session/logout.php\"><button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\" style=\"margin:10px\" data-toggle=\"modal\">Log out</button></a>"; else echo "<button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\" style=\"margin:10px\" data-toggle=\"modal\" data-target=\"#signinModal\" id=\"signinHomeButton\">Sign In</button>" ?>

  				</ul>
				</div>
			
      </div><!--/.nav-collapse -->
		</div>
	</div>
</div>
<!-- 
<script type="text/javascript" > alert("Hey you"); $('#signinModal').modal({ show: true}) </script>
 -->
<div class="container" id="signinModalContainer" style="margin:50px">
	<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none">
	
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
									<form action="session/login_donor.php" method="post" id="tabDonor" enctype="multipart/form-data">
										<input type="hidden" name="donor" value="donor">
										<label>Email</label>
										<input type="text" placeholder="Email" id="emailDonor" name="emailDonor" class="input-xlarge" style="color:black">
										<label>Password</label>
										<input type="password"  id="passwordDonor" name="passwordDonor" maxlength="25" class="input-xlarge" placeholder="Password" style="color:black">
										
                    <?php if(isset($_SESSION['LOGIN_DONOR_ERRMSG_ARR'])) { ?>
                    <div><p>Incorrect username or password</p></div>
                    <?php } unset($_SESSION['LOGIN_DONOR_ERRMSG_ARR']); ?>

                    <div class="well form-inline">
											<div>
												<input type="submit" class="btn btn-primary" name="dlogin" value="Login" onClick="return submitSignin('emailDonor','passwordDonor')">&nbsp;&nbsp;&nbsp;&nbsp;<a href="forgotpasswordDonor.php" style="text-decoration:none">Forgot password ?</a>
											</div>
										</div>
	  											<!--<div>
	  												<input type="button" class="btn btn-success" name="dsub" value="Sign Up" id="signupDonorButton" >
	  											</div>-->
	  										</form>
	  									</div>
	  								</div>
	  								<div class="tab-pane fade" id="signinNgo">
	  									<form action="session/login_ngo.php" method="post" id="tabNgo" enctype="multipart/form-data">
	  										<input type="hidden" name="ngo" value="ngo">				
	  										<label>Email</label>
	  										<input type="text" placeholder="Email" id="emailNgo" maxlength="100" name="emailNgo" class="input-xlarge" style="color:black">
	  										<label>Password</label>
	  										<input type="password"  id="passwordNgo" name="passwordNgo" maxlength="25" class="input-xlarge" placeholder="Password" style="color:black">
	  										
                        <?php if(isset($_SESSION['LOGIN_NGO_ERRMSG_ARR'])) { ?>
                        <div><p>Incorrect username or password</p></div>
                        <?php } unset($_SESSION['LOGIN_NGO_ERRMSG_ARR']); ?>

                        <div class="well form-inline">
	  											<div>
	  												<input type="submit" class="btn btn-primary" name="nlogin" value="Login" onClick="return submitSignin('emailNgo','passwordNgo')">&nbsp;&nbsp;&nbsp;&nbsp;<a href="forgotpasswordNgo.php" style="text-decoration:none">Forgot password ?</a>
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
  												<form action="session/signupdonor.php" method="post" id="tab" enctype="multipart/form-data" onsubmit="return checkSize(1048576,'donorProfPic')" >

  													<label>Name</label>
  													<input type="text" placeholder="First Name" maxlength="100" id="fn" name="name" class="input-xlarge" style="color:black">
  													<label>Email</label>
  													<input type="text" placeholder="Email" maxlength="100" id="em" name="email" class="input-xlarge" style="color:black">

                            <?php if(isset($_SESSION['DONOR_EMAIL_EXISTS_ERRMSG_ARR'])) { ?>
                            <div><p>Email already exists</p></div>
                            <?php } unset($_SESSION['DONOR_EMAIL_EXISTS_ERRMSG_ARR']); ?>

  													<label>Contact Number ( 10 digits ) </label>
  													<input type="text" placeholder="Mobile Number" id="mob" name="mobile" maxlength="10" class="input-xlarge" style="color:black">
  													<label>Password ( minimum 6 character ) </label>
  													<input type="password" placeholder="Password" id="pass" name="password" maxlength="25" class="input-xlarge" style="color:black">	       
  													<div>
  														<span>Profile Picture</span>
  														<div>
  															<input name="image" type="file" id="donorProfPic"/>
  														</div> 												
  														<input type="submit" class="btn btn-primary" name="submitFormDonor" value="Sign Up" onClick="return submitSignUpForDonor()">
  													</div>
  												</form>
  											</div>

  											<div class="tab-pane fade" id="regSignupNgo">
  												<form action="session/signupregngo.php" method="post" id="tab" enctype="multipart/form-data" onsubmit="return checkSize(1048576,'regNgoLogo')" >

  													<label>NGO Name</label>
  													<input type="text" maxlength="100" id="nn" name="nn" class="input-xlarge" placeholder="Name of NGO" style="color:black">
  													<label>Registration Number</label>
  													<input type="text" id="regno" name="regno" maxlength="15" class="input-xlarge" placeholder="Registration Number" style="color:black">
  													<label>Name of Contact Person</label>
  													<input type="text" maxlength="100" id="cn" name="cn" class="input-xlarge" placeholder="Name of Contact Person" style="color:black">
  													<label>Email</label>
  													<input type="text" maxlength="100"  placeholder="Email" id="eml" name="eml" class="input-xlarge" style="color:black">

                            <?php if(isset($_SESSION['REGNGO_EMAIL_EXISTS_ERRMSG_ARR'])) { ?>
                            <div><p>Email already exists</p></div>
                            <?php } unset($_SESSION['REGNGO_EMAIL_EXISTS_ERRMSG_ARR']); ?>

  													<label>Contact Number</label>
  													<input type="text"  id="cont" name="cont"  maxlength="10" class="input-xlarge" placeholder="Contact Number" style="color:black">
  													<label>Password</label>
  													<input type="password"  id="pwd" name="pwd" maxlength="25" class="input-xlarge" placeholder="Password" style="color:black">
  													<label>Address</label>
  													<textarea rows="3" id="add" name="add" class="input-xlarge" placeholder="Address" style="color:black"></textarea>
													<br/>
  													<input type="text" maxlength="30" id="cityreg" name="cityreg" class="input-small" placeholder="City" style="color:black">
  													<input type="text" maxlength="30" id="statereg" name="statereg" class="input-medium" placeholder="State" style="color:black">
													<label>Description</label>
  													<textarea rows="3" id="dc" name="dc" class="input-xlarge" placeholder="Description" style="color:black"></textarea>
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
                            <input type="checkbox" id = "Others"  name="box[]" value=" Others"> Others<br>
  													<div>
  														<span>Upload Logo</span>
  														<div>										
  															<input name="regNgoLogo" id="regNgoLogo" type="file" />
  														</div>
  														<input type="submit" class="btn btn-primary" name="submitFormRegNgo" value="Sign Up" onClick="return submitSignUpForRegNGO()">
  													</div>
  												</form>
  											</div>

  											<div class="tab-pane fade" id="unregSignupNgo">
  												<form action="session/signupunregngo.php" method="post" id="tab" enctype="multipart/form-data" onsubmit="return checkSize(1048576,'unregNgoLogo')" >

  													<label>NGO Name</label>
  													<input type="text" maxlength="100" id="unn" name="unn" class="input-xlarge" placeholder="Name of NGO" style="color:black">
  													<label>Name of Contact Person</label>
  													<input type="text" maxlength="100" id="ucn" name="ucn" class="input-xlarge" placeholder="Name of Contact Person" style="color:black">
  													<label>Email</label>
  													<input type="text" maxlength="100" placeholder="Email" id="ueml" name="ueml" class="input-xlarge" style="color:black">
  													
                            <?php if(isset($_SESSION['UNREGNGO_EMAIL_EXISTS_ERRMSG_ARR'])) { ?>
                            <div><p>Email already exists</p></div>
                            <?php } unset($_SESSION['UNREGNGO_EMAIL_EXISTS_ERRMSG_ARR']); ?>

                            <label>Contact Number</label>
  													<input type="text"  id="ucont" name="ucont" maxlength="10" class="input-xlarge" placeholder="Contact Number" style="color:black">
  													<label>Password</label>
  													<input type="password"  id="upwd" name="upwd" maxlength="25" class="input-xlarge" placeholder="Password" style="color:black">
  													<label>Address</label>
  													<textarea rows="3" id="uadd" name="uadd" class="input-xlarge" placeholder="Address" style="color:black"></textarea>
  													<br/>
  													<input type="text"  maxlength="30" id="cityunreg" name="cityunreg" class="input-small" placeholder="City" style="color:black">
  													<input type="text"  maxlength="30" id="stateunreg" name="stateunreg" class="input-medium" placeholder="State" style="color:black">
													<label>Description</label>
  													<textarea rows="3" id="udc" name="udc" class="input-xlarge" placeholder="Description" style="color:black"></textarea>
													<label>Vision</label>
  													<textarea  rows="3" id="uvi" name="uvi" placeholder="vision" class="input-xlarge" style="color:black"></textarea>
  													<label> Category </label>
  													<input type="checkbox" id ="uHealth" name="box[]" value="Health"> Health<br>
  													<input type="checkbox" id ="uFood" name="box[]" value="Food"> Food <br>
  													<input type="checkbox" id ="uEducation" name="box[]" value=" Education"> Education<br>
  													<input type="checkbox" id ="uOld" name="box[]" value="Old"> Oldage<br>
  													<input type="checkbox" id ="uChild" name="box[]" value="Child"> Child<br>
                            <input type="checkbox" id ="uOthers" name="box[]" value="Others"> Others<br>

  													<div>
  														<span>Upload Logo</span>
  														<div>	  														
  															<input name="unregNgoLogo" id="unregNgoLogo" type="file" />
  														</div>
  														<input type="submit" class="btn btn-primary" name="submitFormUnRegNgo" value="Sign Up" onClick="return submitSignUpForUnRegNGO()">
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
