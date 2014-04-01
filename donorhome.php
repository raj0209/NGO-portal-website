<?php
	
	require_once('auth.php');
	include 'header.php';
	include 'connect.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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
    </head>

    <?php
      	
		$type=$_SESSION['SESS_TYPE'];
		$email=$_SESSION['SESS_EMAIL'];
		$pid=$_SESSION['SESS_MEMBER_ID'];

		if($type=="DONOR")
		{
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
				
			}
		}	
		else
		  echo $pid;
		}
		else
			header("location: ngohome.php");

	?>

		
    <body>
        <div class="container">
            <div class="row" style="margin-top: -75px;">
                <div class="col-md-4" >
                    <div class="well well-sm" style="height: 210px;"> 
                        <div class="media">
                            <a class="thumbnail pull-left" href="#">
                                <img style="height: 200px;" class="media-object" src="<?php echo $photo?>">
                            </a>
                            <div class="media-body" style="margin-left: 225px;">
								<h1 class="media-heading"><?php echo $name ?></h1>
                                <div >
                                    <br>
                                    <h4>Email:</h4>
                                    <p id="vision" name="email"><h8> <?php echo $email ?></h8></p>
                                    <p>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#" id="EventButton" onClick="DisplayEvents()">Events</button>
									<button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#" id="ngoFavButton" onClick="DisplayNgo()">Favourite NGOs</button> 
									<button class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="modal" data-target="#editProModal" id="editProButton">Edit Profile</button>
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
                                    $query = "SELECT * FROM Fav WHERE donor_pid = '$pid'";
                                    $result = mysql_query($query);

                                    if($result) {
                                        if(mysql_num_rows($result) > 0) {
                                            while ($row = mysql_fetch_assoc($result)) {
                                               $ngoPid = $row['ngo_pid'];

                                                // now find and add favorite donors into well
                                                $queryNgo = "SELECT * FROM ngoPost WHERE pid = '$ngoPid'";
                                                $resultNgo = mysql_query($queryNgo);

                                                if($resultNgo) {
                                                    if(mysql_num_rows($resultNgo) > 0) {
                                                        while ($rowNgo= mysql_fetch_assoc($resultNgo)) {
                                                            $nameEvent = $rowNgo['name'];
                                                            $detailEvent = $rowNgo['detail'];
                                                            $fdEvent = $rowNgo['fromDate'];
                                                            $tdEvent = $rowNgo['toDate']; 
															$locationEvent = $rowNgo['location'];?>
                                                <form action="#"  method="post">
                                                    <div class="well well-sm">
                                                        <!--<input type="hidden" name="postTime" value=" <?php echo $postTime ?>">
                                                        <input type="hidden" name="ngoPid" value=" <?php echo $pid ?>">-->
                                                        <h3 class="media-heading"><?php echo $nameEvent ?><small><?php echo " ".substr($postTime,0,10) ?></small></h3>
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
											}
										}
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
                        <div class="media">
                            <div class="media-body">
                                <?php
                                    $query = "SELECT * FROM Fav WHERE donor_pid = '$pid'";
                                    $result = mysql_query($query);

                                    if($result) {
                                        if(mysql_num_rows($result) > 0) {
                                            while ($row = mysql_fetch_assoc($result)) {
                                                $ngoPid = $row['ngo_pid'];

                                                // now find and add favorite donors into well
                                                $queryNgo = "SELECT * FROM ngoPost WHERE pid = '$ngoPid'";
                                                $resultNgo = mysql_query($queryNgo);

                                                if($resultNgo) {
                                                    if(mysql_num_rows($resultNgo) > 0) {
                                                        while ($rowNgo= mysql_fetch_assoc($resultNgo)) {
                                                            $nameEvent = $rowNgo['name'];
                                                            $detailEvent = $rowNgo['detail'];
                                                            $fdEvent = $rowNgo['fromDate'];
                                                            $tdEvent = $rowNgo['toDate']; 
															$locationEvent = $rowNgo['location'];?>
                                                                <div class="well well-sm">
                                                                    <div class="media">
                                                                            <a class="thumbnail pull-left" href="#">
                                                                                <img style="height: 100px;" class="media-object" src="<?php echo $photoDonor ?>">
                                                                            </a>
                                                                            <div class="media-body" style="margin-left: 120px;">
                                                                                <h3 class="media-heading" ><?php echo $nameEvent ?></h3>
                                                                                <div class="media">
                                                                                    <p ><b>Details: </b><?php echo $detailEvent ?></p>
                                                                                    <p ><b>From: </b><?php echo $fdEvent ?></p>&nbsp; &nbsp; <p ><b>From: </b><?php echo $fdEvent ?></p>
                                                                                    <p ><b>Location: </b><?php echo $locationEvent ?></p>
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
                                            echo "No Favourite NGos";
                                        }
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
								<label>Name</label>
	  							<input type="text" value="<?php echo $name?>" id="efn" name="ename" class="input-xlarge" onClick="fnf()" style="color:black">
	  							<label>Email</label>
	  							<input type="text" value="<?php echo $email?>" id="eem" name="eemail" class="input-xlarge" onClick="emlf()" style="color:black">
	  							<label>Contact Number</label>
	  							<input type="text" value="<?php echo $cont?>" id="emob" name="emobile" maxlength="10" class="input-xlarge" onClick="mobf()" style="color:black">
	  							<label>Password</label>
	  							<input type="password" value="<?php echo $pass?>" id="epass" name="epassword" maxlength="25" class="input-xlarge" onClick="pwdf()" style="color:black">	   
	  							<div>
	  								<div class="btn btn-default btn-file" style="margin-right: 60px;">
	  									<label for="file">Browse Photo</label>
	  									<input type="file" name="image" >
	  								</div >
									<input type="submit" class="btn btn-primary" name="saveChangesDonor" value="Save Changes" onClick="return editProfielForDonor()"></button>
	  							</div>							
							</form>	
						</div>		
					</div>
				</div>
			</div>
		</div>
     </body>
</html>