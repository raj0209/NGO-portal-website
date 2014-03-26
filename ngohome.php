<!DOCTYPE html>
<?php
	require_once('auth.php');
	//include 'header.php';
	include 'connect.php';
?>

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

              <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
              <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
              <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
              <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
              <link rel="shortcut icon" href="ico/favicon.png">
              <script type="text/javascript" src="main.js"></script>
    </head>

    <?php
        include 'header.php';
		$type=$_SESSION['SESS_TYPE'];
		$email=$_SESSION['SESS_EMAIL'];
		$pid=$_SESSION['SESS_MEMBER_ID'];
		
		if($type=="NGO")
		{
		$qry="SELECT * FROM Ngo WHERE email='$email' AND pid=$pid";
		$result=mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
			$member = mysql_fetch_assoc($result);
			$ngoname = $member['name'];
			$des = $member['description'];
			$vision = $member['vision'];
			$logo = $member['logo'];
			$web = $member['website'];
            $address = $member['address'];
			}
		}	
		else
		  echo $pid;
		}
		else
			header("location: donorhome.php");

	?>
    <body>
        <div class="container">
            <div class="row" id="ngoProfileContainer" style="margin-top: -75px;">
                <div class="col-md-4" >
                    <div class="well well-sm" style="height: auto;"> 
                        <div class="media">
                            <a class="thumbnail pull-left" href="#">
                                <img style="height: 200px;" class="media-object" src="<?php echo $logo?>">
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
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#postEventModal" id="postEventButton">Post Event</button>
									<button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#" id="donorButton" onclick="changeName();">Donors</button>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#" id="contactButton">Contact</button>
									<button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#" id="editProfileButton">Edit Profile</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="allPostContainer">
                <div class="col-md-4" >
                    <div class="well well-sm" style="height: auto;">
                        <h1>Events<h1>
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
                                                    <div class="well well-sm">
                                                        <h3 class="media-heading"><?php echo $postName ?><small><?php echo " ".substr($postTime,0,10) ?></small></h3>
                                                        <div class="media">
                                                            <p><b>From:</b> <?php echo $postFromDate ?>  &nbsp; &nbsp;<b>To:</b> <?php echo $postToDate ?> </p>
                                                            <p ><b>Detail:</b><?php echo $postDetail ?></p>
                                                            <p ><b>Location:</b><?php echo $postLocation ?></p>
                                                        </div>
                                                    </div>
                                               <?php
                                           }  
                                        }
                                    }else {
                                        die("No event posted so far");
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="allDonorContainer">
                <div class="col-md-4" >
                    <div class="well well-sm" style="height: auto;">
                        <h1>Donors<h1>
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
                                        }else {
                                            die("No Donor so far");
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
								<input type="text" value="Name of Event" id="eventName" name="eventName" class="input-xlarge" onClick="eventNamef()" style="color:grey">
								<label>Details of Event</label>
	  							<textarea rows="3" id="eventDetails" name="eventDetails" class="input-xlarge" onClick="eventDetailsf()" style="color:grey"></textarea>
								<label>Start Date </label>
								<input type="date" name="startDate" id="startDate" class="input-xlarge" style="color:grey">
								<label>End Date </label>
								<input type="date" name="endDate" id="endDate" class="input-xlarge" style="color:grey">
								<label>Location</label>
								<input type="text" value="Location of Event" id="eventLocation" name="eventLocation" class="input-xlarge" onClick="eventLocationf()" style="color:grey">
								<div>
									<input type="submit" class="btn btn-primary" name="postEvent" value="Post Event" onClick="return eventPostf()"></button>
								</div>
							</form>	
						</div>		
					</div>
				</div>
			</div>
		</div>
     </body>
</html>


