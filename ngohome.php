<!DOCTYPE html>

<?php
require_once('auth.php');
//session_start();
include 'connect.php';

if(isset($_SESSION['SESS_TYPE'])){
    $type=$_SESSION['SESS_TYPE'];
    $email=$_SESSION['SESS_EMAIL'];
    $pid=$_SESSION['SESS_MEMBER_ID'];
}
else
{
    $type="GUEST";
}

if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '' )){
    $loggedIn = false;
}else{
    $loggedIn = true;
}


// if ngoPid is set that means person is coming here from search page and SESS_MEMBER_ID can be different from the id of ngo that user want to see
if( isset($_POST['ngoPid'])){
    $pid = $_POST['ngoPid'];
}

if(isset($_GET["id"]))
{
    $idFromLink = htmlspecialchars($_GET["id"]);

    if(intval($idFromLink)){
        // id is integer
        $pid = $idFromLink;
    }else{
        Header("Location: error.php");
    }
}

if(!isset($pid)){
    Header("Location: error.php");
}

if($loggedIn && $type == "DONOR")
{
	$donorpid = $_SESSION['SESS_MEMBER_ID'];
	$donorquery = "SELECT * FROM Donor WHERE pid=$donorpid";
	$donorresult = mysql_query($donorquery);
	if(mysql_num_rows($donorresult) > 0) {
		$dmember = mysql_fetch_assoc($donorresult);
		$donorname = $dmember['name'];
		$donormob = $dmember['contact'];
		$donoremail = $dmember['email'];
	}
}
if($loggedIn && $type == "DONOR") { 
$donorPid=$_SESSION['SESS_MEMBER_ID'];


$result=mysql_query("SELECT * From Fav where donor_pid=$donorPid AND ngo_pid=$pid");
$counter1=mysql_num_rows($result);

if(isset($_POST['counter1']))
{
    $counter1=$_POST['counter1'];
}

if(($counter1%2)==1&&mysql_num_rows($result)==0)
{
    if($loggedIn && $type == "DONOR") { 
                                    $donorPid=$_SESSION['SESS_MEMBER_ID'];}
    $donorPid=$_SESSION['SESS_MEMBER_ID'];

    mysql_query("INSERT INTO Fav VALUES($donorPid, $pid)");
}
 if(($counter1%2)==0)
{
    $donorPid=$_SESSION['SESS_MEMBER_ID'];
    if($loggedIn && $type == "DONOR") { 
                                    $donorPid=$_SESSION['SESS_MEMBER_ID'];}
    mysql_query("DELETE FROM Fav where Ngo_pid=$pid AND donor_pid=$donorPid");
}
}
$qry="SELECT * FROM Ngo WHERE pid=$pid";
$result=mysql_query($qry);
if($result) {
 if(mysql_num_rows($result) > 0) {
     $member = mysql_fetch_assoc($result);
     $ngoname = $member['name'];
     $regno = $member['rnumber'];
     $cpn = $member['contact_person'];
     $email = $member['email'];
     $cno = $member['contact'];
     $des = $member['description'];
     $vision = $member['vision'];
     $rstatus = $member['rstatus'];
     $logo = $member['logo'];
     $web = $member['website'];
     $address = $member['address'];
	 $city = $member['city'];
	 $state = $member['state'];
     $password = $member['password'];
 }else{
    // NGO id is not present
    Header("Location: error.php");
 }
} 
else{
    Header("Location: error.php");
}

?>

<html>
    <?php include 'head.php'; ?>
<body>
    <?php include 'header.php'; ?>
    
    <div class="container">
        <div class="row" id="ngoProfileContainer" style="margin-top: -75px;">
            <div class="col-md-4" >
                <div class="well well-sm" style="height: auto;"> 
                    <div class="media">
                        <a class="thumbnail pull-left" href="#">
                            <img style="height: 175px;width:175px;" class="media-object" src="<?php echo $logo ?>">
                        </a>
                        <div class="media-body" style="margin-left: 225px;">
                            <h1 class="media-heading" id="nameOfNgo" name="nameOfNgo"><?php echo $ngoname ?></h1>
                            <div style="margin-top: -15px;">
                                <br>
                                <h4>Vision:</h4>
                                <p id="vision" name="vision"> <?php echo $vision ?></p>
                                <h4>Discription:</h4>
                                <p id="discription" name="discription"><?php echo $des ?></p>
                                <h4>Website:</h4>
                                <p id="website" name="website"><a href="http://<?php echo $web ?>" target="_blank"><?php echo $web ?></a></p>
                                <p id="address" name="address"><b>Address:  </b><?php echo $address ?></p>		
                                <p id="city" name="city"><b>City:  </b><?php echo $city." "; echo ($state); ?></p>
                                
								
                            </div>
                            <p>
                                <?php if($loggedIn && $type == "NGO" && $pid==$_SESSION['SESS_MEMBER_ID']) { ?>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#postEventModal" id="postEventButton">Post Event</button>
                                <?php } ?>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#" id="donorButton" onclick="changeName();">Followers</button>
                                <?php if($loggedIn && $type == "NGO" && $pid==$_SESSION['SESS_MEMBER_ID']) {?>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#editProfileModal" id="editProfileButton">Edit Profile</button>
								<button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#changePassModal" id="changePasswordButton">Change Password</button>
								<button class="btn btn-lg btn-primary btn-block" type="submit" id="showMyDonor" onClick="DisplayAllDonors()">Message</button>
                                <?php }elseif($loggedIn && $type == "DONOR") { ?>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#contactNgoModal" id="contactButton">Contact</button>
                                <?php
									?>
									<form method="post">
									<?php $result=mysql_query("SELECT * From Fav where donor_pid=$donorPid AND ngo_pid=$pid");
                                    $nResult=mysql_num_rows($result);
                                    
                                    if(($nResult%2)==0)
                                    {?>
										<button type="submit" class="btn btn-default" name="counter1" value="<?php echo ($counter1+1);?>" ><i class="icon-star icon-black"></i> Favourite</button>
									<?php } ?>
									<?php
									if(($nResult%2)>0)
									{?>
									
									<button type="submit" class="btn btn-default" name="counter1" value="<?php echo ($counter1+1);?>" ><i class="icon-star-empty icon-black"></i> Unfavourite</button>
									
									<?php }
									?>
									</form>
									<form method="post">
									<?php
										$donorPid=$_SESSION['SESS_MEMBER_ID'];
										$erResult=mysql_query("SELECT * From Acknowledge where donor_pid=$donorPid AND ngo_pid=$pid");
										$nErResult=mysql_num_rows($erResult);
										if($nErResult>0)
										{
											?>
											<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ratingModal" name="counterER" value="<?php echo ($counterER+1);?>" ><i class="icon-heart icon-white"></i> Rate this NGO</button>
											<?php
											
										}
									
									?>
									
									</form>
									
								<?php 
								} // end of else if
								?>  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="allPostContainer">
            <div class="col-md-4" >
                <div class="well well-sm" style="height: auto;">
                    <h1>Events</h1>
                    <div class="media">
                        <div class="media-body">
                            <?php
                            $query = "SELECT * FROM NgoPost WHERE ngo_pid = '$pid' ORDER BY postTime DESC";
                            $result = mysql_query($query);

                            if($result) {
                                if(mysql_num_rows($result) > 0) {
                                    while ($row = mysql_fetch_assoc($result)) {
                                       $postName = $row['name'];
                                       $postTime = $row['postTime'];
                                       $postDetail = $row['detail'];
                                       $postFromDate = $row['fromDate'];
                                       $postToDate = $row['toDate'];
                                       $postLocation = $row['location']; ?>
                                       <form action="deletePost.php"  method="post" enctype="multipart/form-data">
                                        <div class="well well-sm" style="position: relative;">
                                            <input type="hidden" name="postTime" value=" <?php echo $postTime ?>">
                                            <input type="hidden" name="ngoPid" value=" <?php echo $pid ?>">
                                            <h3 class="media-heading"><?php echo $postName ?><small><?php echo " ".substr($postTime,0,10); ?></small></h3>
                                            <div class="media">
                                                <p><b>From: </b> <?php echo $postFromDate ?>  &nbsp; &nbsp;<b>To:</b> <?php echo $postToDate ?> </p>
                                                <p ><b>Detail: </b><?php echo $postDetail ?></p>
                                                <div>
                                                    <p style="float:left;"><b>Location: </b><?php echo $postLocation ?></p>
													<?php if($loggedIn && $type == "NGO" && $pid==$_SESSION['SESS_MEMBER_ID']) { ?>
                                                    <input style="position:absolute;right: 5px;bottom: 5px;" type="submit" class="btn btn-primary" name="deletePost" value="Delete" onClick="return confirm('Are you sure you wish to Delete this Event?')" >
														<?php }?>
                                                </div>	
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }  
                            }
                        }
                        else {
                            echo "No event posted so far";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="allDonorContainer" style="display: none;">
        <div class="col-md-4" >
            <div class="well well-sm" style="height: auto;">
                <h1>Followers</h1>
                <div>
                    <div>
                        <?php
                        $query = "SELECT * FROM Fav WHERE ngo_pid = '$pid'";
                        $result = mysql_query($query);

                        if($result) {
                            if(mysql_num_rows($result) > 0) {
                                while ($row = mysql_fetch_assoc($result)) {
                                    $donorPid = $row['donor_pid'];

                                                // now find and add favorite donors into well
                                    $queryDonor = "SELECT * FROM Donor WHERE pid = '$donorPid'";
                                    $resultDonor = mysql_query($queryDonor);

                                    if($resultDonor) {
                                        if(mysql_num_rows($resultDonor) > 0) {
                                            while ($rowDonor = mysql_fetch_assoc($resultDonor)) {
                                                $nameDonor = $rowDonor['name'];
                                                $photoDonor = $rowDonor['photo'];
                                                $emailDonor = $rowDonor['email'];
                                                $contactDonor = $rowDonor['contact']; ?>
                                                <div class="well well-sm" style='height: 110px;'>
                                                    <div class="media">
                                                      <a class=" thumbnail pull-left" href="#">
                                                        <img style="height: 100px;width: 100px;" class="media-object" src="<?php echo $photoDonor ?>">
                                                      </a>
                                                      <div class="media-body" style="margin-left: 130px;">
                                                        <a href= "<?php echo $_SESSION['LINK_DONORHOME']."?did=".$donorPid ?>"><h3 class="media-heading" ><?php echo $nameDonor ?></h3></a>
                                                        <p ><b>Email: </b><?php echo $emailDonor ?></p>
                                                      </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            }
                            else {
                                echo "No Donor so far";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="postEventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Post Event</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <form action="eventPosted.php" method="post">
                        <label>Name of Event</label>
                        <input type="text" placeholder="Name of Event" id="eventName" name="eventName" class="input-xlarge" onClick="clearElement('eventName')" style="color:black">
                        <label>Details of Event</label>
                        <textarea rows="3" id="eventDetails" name="eventDetails" placeholder="Details of Event" class="input-xlarge" onClick="clearElement('eventDetails')" style="color:black"></textarea>
                        <label>Start Date </label>
                        <input type="date" name="startDate" id="startDate" class="input-xlarge" style="color:black">
                        <label>End Date </label>
                        <input type="date" name="endDate" id="endDate" class="input-xlarge" style="color:black">
                        <label>Location</label>
                        <input type="text" placeholder="Location of Event" id="eventLocation" name="eventLocation" class="input-xlarge" onClick="clearElement('eventLocation')" style="color:black">
                        <div>
                            <input type="submit" class="btn btn-primary" name="postEvent" value="Post Event" onClick="return eventPostf()"></button>
                        </div>
                    </form>	
                </div>		
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div>
            <div class="modal-body">
                    <div class="well">
                           <form action="editedProfile.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="pidNgo" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
                                <label>NGO Name</label>
                                <input type="text"  id="enn" name="enn" class="input-xlarge" value="<?php echo $ngoname?>" onClick="clearElement('enn')" style="color:black">
                                <?php
                                if($rstatus)
                                {
                                    ?>
                                    <label>Registration Number</label>
                                    <input type="text" id="eregno" name="eregno" class="input-xlarge" value="<?php echo $regno?>" onClick="clearElement('eregno')" style="color:black">
                                    <?php
                                }
                                ?>								
                                <label>Name of Contact Person</label>
                                <input type="text"  id="ecn" name="ecn" class="input-xlarge" value="<?php echo $cpn?>" onClick="clearElement('ecn')" style="color:black">
                                <label>Email</label>
                                <input type="text" value="<?php echo $email?>" id="eeml" name="eeml" class="input-xlarge" onClick="clearElement('eeml')" style="color:black">
                                <label>Contact Number</label>
                                <input type="text"  id="econt" name="econt"  maxlength="10" class="input-xlarge" value="<?php echo $cno?>" onClick="clearElement('econt')" style="color:black">                           
                                <label>Description</label>
                                <textarea rows="5" id="edc" name="edc" class="input-xlarge" onClick="clearElement('edc')" style="color:black"><?php echo $des?></textarea>
                                <label>Vision</label>
                                <textarea  rows="3" id="evi" name="evi" class="input-xlarge" onClick="clearElement('evi')" style="color:black"><?php echo $vision?></textarea>
                                <?php
                                if($rstatus)
                                {
                                    ?>
                                    <label>Website</label>
                                    <input type="text"  id="eweb" name="eweb" class="input-xlarge" value="<?php echo $web?>" onClick="clearElement('eweb')" style="color:black">
                                    <?php
                                }
                                ?>
                                <div>
                                   <div>
									<span>Upload Logo</span>
									<div>										
										<input name="regNgoLogo" id="regNgoLogo" type="file" />
									</div>
									</div>
                                <input type="submit" class="btn btn-primary" name="saveChangesRegNgo" value="Save Changes" onClick="return esubmit3()"></button>
                            </div>							
                        </form>	
                    </div>		
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Change Password</h4>
            </div>
            <div class="modal-body">
                    <div class="well">
                           <form action="ngochangepassword.php" name="frmChange" method="post" enctype="multipart/form-data">
								
                                <label>Current Password</label>
                                <input type="password"  id="currentPasswordNgo" name="currentPassword" maxlength="25" class="input-xlarge" style="color:black">
                                <label>New Password</label>
                                <input type="password"  id="newPasswordNgo" name="newPassword" maxlength="25" class="input-xlarge"  style="color:black">
                                <label>Confirm Password</label>
                                <input type="password"  id="confirmPasswordNgo" name="confirmPassword" maxlength="25" class="input-xlarge" style="color:black">
								<div>
								<input type="submit" class="btn btn-primary" name="SavePassword" value="Save Password" onClick="return validatePassword('currentPasswordNgo','newPasswordNgo','confirmPasswordNgo')"></button>
								</div>
													
                        </form>	
                    </div>
						
            </div>
        </div>
    </div>
</div>
	  
<div class="modal fade" id="contactNgoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel2">Contact NGO</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <form action="contactNgo.php" method="post">
                        <label>Your Name</label>
						<input type="text" id="dn" name="dn" class="input-xlarge" value="<?php echo $donorname?>" style="color:black" readonly>						
                        <label>NGO Name</label>
                        <input type="text" id="cnn" name="cnn" class="input-xlarge" value="<?php echo $ngoname?>" style="color:black" readonly>
                        <label>Your Mobile Number</label>
                        <input type="text"  id="dm" name="dm" maxlength="10" class="input-xlarge" value="<?php echo $donormob?>" style="color:black" readonly>
                        <label>Event Subject</label>
                        <input type="text"  id="subject" name="subject" class="input-xlarge" placeholder="Subject of the Event" onClick="clearElement('subject')" style="color:black"> 
						<label>Date of Event/Donation</label>
                        <input type="date" name="DonationDate" id="DonationDate" class="input-xlarge" style="color:black">
                        <label>Description/Message</label>
                        <textarea rows="5" id="message" name="message" class="input-xlarge" onClick="clearElement('dd')" placeholder=""style="color:black"></textarea>
						<input type="hidden" name="nPid" value=" <?php echo $pid ?>">
						<input type="hidden" name="nEmail" value=" <?php echo $email ?>">
						<input type="hidden" name="dEmail" value=" <?php echo $donoremail ?>">
						<div>
                           <input type="submit" class="btn btn-primary" name="contactNgo" value="Contact" onClick="return contactForm()"></button>
                       </div>							
                    </form>	
                </div>		
            </div>
        </div>
    </div>
</div>
<div class="row" id="MessageContainer" style="margin-left:60px;margin-right:88px;display:none;">
            <div class="col-md-4" >
                <div class="well well-sm" style="height: auto;">
                    <h2>Message to my Followers</h2>
                    <div class="media">
                        <div class="media-body">
                            <?php
                            $query = "SELECT * FROM Event WHERE ngo_pid = '$pid' AND acknowledged = '0'";
                            $result = mysql_query($query);

                            if($result) {
                                if(mysql_num_rows($result) > 0) {
                                    while ($row = mysql_fetch_assoc($result)) {											
                                       $eventSub = $row['event_subject'];
                                       $commDate = $row['commdate'];
                                       $eventMessage = $row['message'];
                                       $eventDate = $row['dateofevent'];
                                       $donorid = $row['donor_pid'];

										$donorInfoQuery = "SELECT * FROM Donor WHERE pid = '$donorid'";
										$donorInfoResult = mysql_query($donorInfoQuery);

										if($donorInfoResult) {
											if(mysql_num_rows($donorInfoResult) > 0) {
												while ($donorMember = mysql_fetch_assoc($donorInfoResult)) {
													$donorName = $donorMember['name'];
													$donorNumber = $donorMember['contact'];
													$donorPhoto = $donorMember['photo'];													
                                      
										?>
										<form  method="post" enctype="multipart/form-data">
                                        <div class="well well-sm" style="position: relative; height:110px">
                                            
                                            <input type="hidden" name="ngoPid" value=" <?php echo $pid ?>">
											<div class="media">
												<a class=" thumbnail pull-left" href="#">
                                                   <img style="height: 100px;width: 100px;" class="media-object" src="<?php echo $donorPhoto ?>">
                                                </a>
                                                <div class="media-body" style="margin-left: 130px;">
													<a href= "<?php echo $_SESSION['LINK_DONORHOME']."?did=".$donorPid ?>"><h3 class="media-heading"><?php echo $donorName ?></h3></a>
													<p><b>Communication Date:  </b> <?php echo $commDate ?> </p>
													<p><b>Event Subject:  </b> <?php echo $eventSub ?> </p>
													<p ><b>Message/Details:  </b><?php echo $eventMessage ?></p>
													<p><b>Event Date:  </b> <?php echo $eventDate ?> </p>
													<div>
														<?php if($loggedIn && $type == "NGO" && $pid==$_SESSION['SESS_MEMBER_ID']) { ?>
														<button style="position:absolute;right: 5px;bottom: 5px;" type="button" id="giveAck" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#acknowledgeModal">Acknowledge</button>
														<?php }?>
													</div>
												</div>													
                                            </div>
                                        </div>
										</form>
										<?php
												}  
											}
										}
									}
								}
							}										
							else {
								echo "No requests received so far";
							}	
							?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="acknowledgeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel2">Acknowledge User</h4>
            </div>
            <div class="modal-body">
                <div class="well">
                    <form action="acknowledged.php" method="post" enctype="multipart/form-data">
                        <label>NGO Name</label>
                        <input type="text" id="mesngo" name="mesngo" class="input-xlarge" value="<?php echo $ngoname?>" style="color:black" readonly>
                        <label>Subject</label>
                        <input type="text"  id="sub" name="sub" class="input-xlarge" placeholder="Subject" onClick="clearElement('sub')" style="color:black"> 
						<label>Details</label>
                        <textarea rows="5" id="details" name="details" class="input-xlarge" onClick="clearElement('details')" placeholder="Details"style="color:black"></textarea>
						<input type="hidden" name="ngoPid" value=" <?php echo $pid ?>">
						<input type="hidden" name="donorPid" value=" <?php echo $donorPid ?>">
						<div>
						<span>Upload Attachments</span>
  							<div>										
							<input name="attachments" id="attachments" type="file" />
  							</div>
  						</div>								
						<div>
                           <input type="submit" class="btn btn-primary" name="ackNgo" value="Acknowledge" onClick="return acknowledge()"></button>
                       </div>							
                    </form>	
                </div>		
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Rate NGO</h4>
      </div>
      <div class="modal-body">
	  <div class="well">
        <form method="post" action="rated.php" name="ratingvalue">
            <select name = "rating">
				<option value="1">1 - Poor</option>
				<option value="2">2 - Not Satisfied</option>
				<option value="3">3 - Neutral</option>
				<option value="4">4 - Fairly Satisfied</option>
				<option value="5">5 - Excellent</option>
			</select>
			<div>
				<input type="hidden" name="pid" value="<?php echo $pid;?>">
				<br/>
				<button type="submit" class="btn btn-primary">Rate</button>
			</div>
		</form>
	  </div>
    </div>  
    </div>
  </div>
</div>

</body>
</html>