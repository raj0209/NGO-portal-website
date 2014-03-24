<!DOCTYPE html>
<?php
	require_once('auth.php');
	include 'header.php';
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
            <div class="row" style="margin-top: -75px;">
                <div class="col-md-4" >
                    <div class="well well-sm" style="height: 210px;"> 
                        <div class="media">
                            <a class="thumbnail pull-left" href="#">
                                <img style="height: 200px;" class="media-object" src="<?php echo $logo?>">
                            </a>
                            <div class="media-body" style="margin-left: 225px;">
                                <h1 class="media-heading" id="nameOfNgo" name="nameOfNgo"><?php echo $ngoname ?></h1>
                                <div >
                                    <br>
                                    <h4>Vision:</h4>
                                    <p id="vision" name="vision"> <?php echo $vision ?></p>
                                    <h4>Discription:</h4>
                                    <p id="discription" name="discription"><?php echo $des ?></p>
                                    <h4>Website:</h4>
                                    <p id="address" name="address"><a href="http://<?php echo $web ?>" target="_blank"><?php echo $web ?></p>
									<p align="left"><a href="logout.php">logout</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </body>
</html>
