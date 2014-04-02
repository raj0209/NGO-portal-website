<?php
//MySQL Database Connect
include 'connect.php';
include 'database.php';
?>
<!DOCTYPE HTML>

<html lang="en">
	<?php
		include 'head.php'; 
	?>

	<body>
	<?php
		include 'header.php'; 
	?>
		<div class="container">
			
				<div >
					<div id="wowslider-container1" style="margin-left:15px; margin-top:20px;">

						<div class="ws_images">
							<ul>
								<li><img src="data1/images/pic1.jpg" alt="pic1" title="" id="wows1_0"/></li>
								<li><img src="data1/images/pic2.jpg" alt="pic2" title="" id="wows1_1"/></li>
								<li><img src="data1/images/pic3.jpg" alt="pic3" title="" id="wows1_2"/></li>
								<li><img src="data1/images/pic4.jpg" alt="pic4" title="" id="wows1_3"/></li>
							</ul>
						</div>

						<div class="ws_bullets">
							<div>
								<a href="#" title="pic1"><img src="data1/tooltips/pic1.jpg" alt="pic1"/>1</a>
								<a href="#" title="pic2"><img src="data1/tooltips/pic2.jpg" alt="pic2"/>2</a>
								<a href="#" title="pic3"><img src="data1/tooltips/pic3.jpg" alt="pic3"/>3</a>
								<a href="#" title="pic4"><img src="data1/tooltips/pic4.jpg" alt="pic4"/>4</a>
							</div>
						</div>

						<span class="wsl"><a href="#"></a></span>

					</div>

					<script type="text/javascript" src="engine/wowslider.js"></script>
					<script type="text/javascript" src="engine/script.js"></script>
				</div>
				
		
				<div style="float: left">
					
					<div class="DetailBoxes">
						<div class="pin" style="min-width: 450px; width: auto">
							<div >
								<h4><font color="black">Welcome to Sampark</font></h4>
							</div>
							<p style="width: 450px" > Browse for socially working organizations. </p>
							<p style="width: 450px" >Favourite/Follow the organizations you're interested in.</p>
							<p style="width: 450px" >Connect with the organizations. Rate organizations.</p>
						</div>
					</div>
					
					<div class="DetailBoxes">
						<div class="pin" style="min-width: 450px; width: auto">
							<div >
								<h4><font color="black">What is this site?</font></h4>
							</div>
							<div >
							<p style="width: 450px" > Hey! We provide a platform for willing contributors to connect to socially working non-profit organizations. We have felt an urgent need for this, seeing that there are a lot of socially working organizations (statistics suggest that there is an NGO for every 600 citizens of the country). What happens in such a scenario is that the bigger, or the more profound organizations attract willing donors with a greater propensity as compared to smaller ones.</font></p>
							<p style="width: 450px" ><em>Sampark</em>
							is an attempt to bring these organizations at the same level of accessibility. From the perspective of users, it only aims to increase the ease of usage. Sampark is the ideal platform for you to come online, and look for appropriate organizations which you would be willing to contribute to. Come online and step into the world of complete awareness about all the coming up events at your favourite organizations.</p>
				
							</div>
							
						</div>
					</div>

				</div>
				
		
		</div>

<!-- 		<?php
		include 'footer.php'; 
		?> -->
	</body>
</html>
