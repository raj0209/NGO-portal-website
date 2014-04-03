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
                            <img style="height: 200px;" class="media-object" src="<?php echo $logo ?>">
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
                                <h4>Address:</h4>
                                <p id="address" name="address"><?php echo $address ?></p>

                            </div>
                            <p>
                                <?php if($loggedIn && $type == "NGO" && $pid==$_SESSION['SESS_MEMBER_ID']) { ?>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#postEventModal" id="postEventButton">Post Event</button>
                                <?php } ?>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#" id="donorButton" onclick="changeName();">Donors</button>
                                <?php if($loggedIn && $type == "NGO" && $pid==$_SESSION['SESS_MEMBER_ID']) {?>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#editProfileModal" id="editProfileButton">Edit Profile</button>
								<button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#changePassModal" id="changePasswordButton">Change Password</button>
                                <?php }elseif($loggedIn && $type == "DONOR") { ?>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#contactNgoModal" id="contactButton">Contact</button>
                                <?php }?> 
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
                            $query = "SELECT * FROM ngoPost WHERE ngo_pid = '$pid' ORDER BY postTime DESC";
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
                                        <div class="well well-sm">
                                            <input type="hidden" name="postTime" value=" <?php echo $postTime ?>">
                                            <input type="hidden" name="ngoPid" value=" <?php echo $pid ?>">
                                            <h3 class="media-heading"><?php echo $postName ?><small><?php echo " ".substr($postTime,0,10) ?></small></h3>
                                            <div class="media">
                                                <p><b>From: </b> <?php echo $postFromDate ?>  &nbsp; &nbsp;<b>To:</b> <?php echo $postToDate ?> </p>
                                                <p ><b>Detail: </b><?php echo $postDetail ?></p>
                                                <div>
                                                    <p style="float:left;"><b>Location: </b><?php echo $postLocation ?></p>
													<?php if($loggedIn && $type == "NGO" && $pid==$_SESSION['SESS_MEMBER_ID']) { ?>
                                                    <input style="float:right;" type="submit" class="btn btn-primary" name="deletePost" value="Delete" onClick="return confirm('Are you sure you wish to Delete this Event?')" >
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
                <h1>Donors</h1>
                <div class="media">
                    <div class="media-body">
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
                                                <div class="well well-sm">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#">
                                                            <img style="height: 100px;" class="media-object" src="<?php echo $photoDonor ?>">
                                                        </a>
                                                        <div class="media-body" style="margin-left: 120px;">
                                                            <h3 class="media-heading" ><?php echo $nameDonor ?></h3>
                                                            <div class="media">
                                                                <p><b>Photo:</b> <?php echo $photoDonor ?> </p>
                                                                <p ><b>Email: </b><?php echo $emailDonor ?></p>
                                                                <p ><b>Contact: </b><?php echo $contactDonor ?></p>
                                                            </div>
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
                        <input type="text" value="Name of Event" id="eventName" name="eventName" class="input-xlarge" onClick="clearElement('eventName')" style="color:black">
                        <label>Details of Event</label>
                        <textarea rows="3" id="eventDetails" name="eventDetails" class="input-xlarge" onClick="clearElement('eventDetails')" style="color:black"></textarea>
                        <label>Start Date </label>
                        <input type="date" name="startDate" id="startDate" class="input-xlarge" style="color:black">
                        <label>End Date </label>
                        <input type="date" name="endDate" id="endDate" class="input-xlarge" style="color:black">
                        <label>Location</label>
                        <input type="text" value="Location of Event" id="eventLocation" name="eventLocation" class="input-xlarge" onClick="clearElement('eventLocation')" style="color:black">
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
                                <label>Password</label>
                                <input type="password"  id="epwd" name="epwd" maxlength="25" class="input-xlarge" onClick="clearElement('epwd')" style="color:black">
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
                                   <div class="btn btn-default btn-file" style="margin-right: 60px;">
                                    <label for="file">Upload Logo</label>
                                    <input type="file" name="regNgoLogo" >
                                </div >
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
                           <form action="" name="frmChange" method="post" enctype="multipart/form-data">
								
                                <label>Current Password</label>
                                <input type="password"  id="currentPassword" name="currentPassword" maxlength="25" class="input-xlarge" onClick="clearElement('currentPassword')" style="color:black">
                                <label>New Password</label>
                                <input type="password"  id="newPassword" name="newPassword" maxlength="25" class="input-xlarge" onClick="clearElement('newPassword')" style="color:black">
                                <label>Confirm Password</label>
                                <input type="password"  id="confirmPassword" name="confirmPassword" maxlength="25" class="input-xlarge" onClick="clearElement('confirmPassword')" style="color:black">
								<div>
								<input type="submit" class="btn btn-primary" name="SavePassword" value="Save Password" onClick="return validatePassword()"></button>
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
						<input type="text"  disabled="disabled" id="dn" name="dn" class="input-xlarge" value="<?php echo $donorname?>" style="color:black">						
                        <label>NGO Name</label>
                        <input type="text" id="cnn" name="cnn" class="input-xlarge" value="<?php echo $ngoname?>" style="color:black" readonly>
                        <label>Your Mobile Number</label>
                        <input type="text"  id="dm" name="dm"  disabled="disabled" maxlength="10" class="input-xlarge" value="<?php echo $donormob?>" style="color:black">
                        <label>Date of Event/Donation</label>
                        <input type="date" name="DonationDate" id="DonationDate" class="input-xlarge" style="color:black">
                        <label>Description/Message</label>
                        <textarea rows="5" id="message" name="message" class="input-xlarge" onClick="clearElement('dd')" style="color:black"></textarea>
						<input type="hidden" name="nPid" value=" <?php echo $pid ?>">
						<div>
                           <input type="submit" class="btn btn-primary" name="contactNgo" value="Contact" onClick="#"></button>
                       </div>							
                    </form>	
                </div>		
            </div>
        </div>
    </div>
</div>

</body>
</html>