
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="en">


<?php

require_once('auth.php');
include 'connect.php';
include 'head.php';

$type=$_SESSION['SESS_TYPE'];
$email=$_SESSION['SESS_EMAIL'];
$pid=$_SESSION['SESS_MEMBER_ID'];

if(isset($pid) && $type == "DONOR")
{
    if(isset($_GET["did"]))
    {
        $idFromLink = htmlspecialchars($_GET["did"]);

        if(intval($idFromLink) == $pid){
            $loggedInAsDonor = true;
        }else{
            $loggedInAsDonor = false;
            $pid = intval($idFromLink);
        }
    }else{
        $loggedInAsDonor = true;
    }
}else{
    $loggedInAsDonor = false;

    if(isset($_GET["did"]))
    {
        $idFromLink = htmlspecialchars($_GET["did"]);

        if(intval($idFromLink)){
        // id is integer
            $pid = $idFromLink;
        }else{
            Header("Location: error.php");
        }
    }
}

$qry="SELECT * FROM Donor WHERE pid=$pid";
$result=mysql_query($qry);
if($result) {
   if(mysql_num_rows($result) > 0) {
       $member = mysql_fetch_assoc($result);
       $name = $member['name'];
       $email = $member['email'];
       $photo = $member['photo'];
       $cont = $member['contact'];
       $pass = $member['password'];

   }else{
    Header("Location: error.php");
    }
}
else{
    Header("Location: error.php");    
}

?>


<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="row" style="margin-top: -75px;">
            <div class="col-md-4" >
                <div class="well well-sm" style="height: 210px;"> 
                    <div class="media">
                        <a class="thumbnail pull-left" href="#">
                            <img style="height: 200px; width: 200px;" class="media-object" src="<?php echo $photo?>">
                        </a>
                        <div class="media-body" style="margin-left: 225px;">
                            <h1 class="media-heading"><?php echo $name ?></h1>
                            <div >
                                <br>
                                
                                <p id="vision" name="email"><b>Email:</b><h8> <?php echo $email ?></h8></p>
                                <p><?php 
                                if($loggedInAsDonor){
                                    ?>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#" id="EventButton" onClick="DisplayEvents()">Events</button> 
                                    <?php }else{ echo '<script type="text/javascript"> DisplayNgo(); </script>'; } ?>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#" id="ngoFavButton" onClick="DisplayNgo()">Favourite NGOs</button>
                                    <?php if($loggedInAsDonor) { ?>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#editProModal" id="editProButton">Edit Profile</button>
									<button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#changePassModal" id="changePasswordButton">Change Password</button>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row" id="allEventsContainer" style="margin-left:35px; margin-right:95px;">
        <div class="col-md-4" style="margin-left:30px;">
            <div class="well well-sm" style="height: auto;">
                <h1>Events</h1>
                <div class="media">
                    <div class="media-body">
                        <?php
                            $query = "SELECT * FROM (SELECT ngo_pid FROM Fav WHERE donor_pid = '$pid') AS fav_ngos INNER JOIN (SELECT ngo_pid,name,postTime,detail,fromDate,toDate,location FROM NgoPost) AS post ON fav_ngos.ngo_pid = post.ngo_pid ORDER BY postTime DESC";
                            //echo "string ".$query;
                            $result = mysql_query($query);

                            if($result) {
                                if(mysql_num_rows($result) > 0) {
                                    while ($rowNgo= mysql_fetch_assoc($result)) {
                                        $nameEvent = $rowNgo['name'];
                                        $postTime = $rowNgo['postTime'];
                                        $detailEvent = $rowNgo['detail'];
                                        $fdEvent = $rowNgo['fromDate'];
                                        $tdEvent = $rowNgo['toDate']; 
                                        $locationEvent = $rowNgo['location'];?>
                                        <form action="#"  method="post">
                                            <div class="well well-sm">
                                                <h3 class="media-heading"><?php echo $nameEvent ?><small><?php echo " ".substr($postTime,0,10); ?></small></h3>
                                                <div class="media">
                                                    <p><b>From: </b> <?php echo $fdEvent ?>  &nbsp; &nbsp;<b>To:</b> <?php echo $tdEvent ?> </p>
                                                    <p ><b>Detail: </b><?php echo $detailEvent ?></p>
                                                    <div>
                                                        <p style="float:left;"><b>Location: </b><?php echo $locationEvent ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                    }  
                                }
                            }
                            else 
                            {
                                echo "No event posted so far";

                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="allFavNgoContainer" style="margin-left:35px; margin-right:95px; display: none;">
        <div class="col-md-4" style="margin-left:30px;" >
            <div class="well well-sm" style="height: auto;">
                <h1>Favourite NGOs</h1>
                <!-- Shubham: Modifying code here, this code is buggy and not working. So putting my code here-->
                        <div class="media">
                            <div class="media-body">
                                <?php
                                    $result = mysql_query("SELECT * FROM Fav WHERE donor_pid = $pid");
                                    $nResult = mysql_num_rows($result); 
                                    if($nResult>0) {
                                        while ($row = mysql_fetch_array($result)) {
                                           $NgoPid= $row['ngo_pid'];
                                           $result1=mysql_query("SELECT * from Ngo where pid=$NgoPid");
                                           $nResult1=mysql_num_rows($result1);
                                           while($row1=mysql_fetch_array($result1))
                                           {
                                                $pid = $row1['pid'];
                                                $nameNgo = $row1['name'];
                                                $logoUrl = $row1['logo'];
                                                $emailNgo = $row1['email'];
                                                $descNgo = substr($row1['description'],0,150)."..."; 
                                        ?>
                                        <div class="well well-sm" style='height: 110px;'>
                                                    <div class="media">
                                                      <a class=" thumbnail pull-left" href="#">
                                                        <img style="height: 100px;width: 100px;" class="media-object" src="<?php echo $logoUrl ?>">
                                                      </a>
                                                      <div class="media-body" style="margin-left: 130px;">
                                                        <a href="<?php echo $_SESSION['LINK_NGOHOME']."?id=".$pid ?>"><h3 class="media-heading" ><?php echo $nameNgo ?></h3></a>
                                                        <p><b>Email: </b><?= $emailNgo?></p>
                                                        <p><b>Description: </b><?= $descNgo?></p>
                                                      </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }  
                                        }
                                    }else {
                                            echo "You currently have no Favourite NGOs";
                                        }
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="editProModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="well">
                         <form action="editedDonorProfile.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="pidDonor" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
                            <label>Name</label>
                            <input type="text" value="<?php echo $name?>" id="ename" name="ename" class="input-xlarge" onClick="clearElement('ename')" style="color:black">
                            <label>Email</label>
                            <input type="text" value="<?php echo $email?>" id="eemail" name="eemail" class="input-xlarge" onClick="clearElement('eemail')" style="color:black">
                            <label>Contact Number</label>
                            <input type="text" value="<?php echo $cont?>" id="emobile" name="emobile" maxlength="10" class="input-xlarge" onClick="clearElement('emobile')" style="color:black">
                            <div>
                                <div class="btn btn-default btn-file" style="margin-right: 60px;">
                                    <label for="file">Browse Photo</label>
                                    <input type="file" name="donorImage" >
                                </div >
                                <input type="submit" class="btn btn-primary" name="saveChangesDonor" value="Save Changes" onClick="return editProfielForDonor()"></button>
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
                           <form action="Donorchangepassword.php" name="frmChange" method="post" enctype="multipart/form-data">
                                
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
</body>

</html>