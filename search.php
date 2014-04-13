<?php
	//Start session
	session_start();

	include 'connect.php';

	$start = 0;
	$end = 10;
	$count = 10;

    $searchQuery = $_POST['searchQuery'];
    $searchCatagory = $_POST['selectedCatagory'];

    if($searchCatagory == "All")
    {
    	$sqlQuery = "SELECT * FROM Ngo WHERE  name LIKE('%$searchQuery%') or address LIKE('%$searchQuery%')";
    }else{
    	$sqlQuery = "SELECT * FROM ( SELECT pid, name, logo, description FROM Ngo WHERE  name LIKE('%$searchQuery%') or address LIKE('%$searchQuery%') ) AS ngo 
    	INNER JOIN ( SELECT * FROM CatNgo WHERE  category LIKE('%$searchCatagory%') ) AS cat ON ngo.pid=cat.ngo_pid";
    }

    $sqlQuery = $sqlQuery." LIMIT ".$start.", ".$end;

    $result = mysql_query($sqlQuery);
?>

<!DOCTYPE html>
<html>
	<?php	include 'head.php'; ?>		
	
	<body>
		<?php	include 'header.php'; ?>
		<div  class="wrapperForSearch" style="margin-top:-60px; margin-bottom:-40px">
		<?php if($searchQuery != "") {
			?>
			<h3>Search results for "<?php echo $searchQuery ?>" under <?php echo strtolower($searchCatagory) ?> category</h3>
		<?php }else {
			?>
			<h3>All NGOs under <?php echo strtolower($searchCatagory) ?> category </h3>
		<?php } ?>
		</div>

			<?php 
			if($result) {

			// setting this variable to pass check in authontication in auth.php and ngohome.php
				$_SESSION['search'] = "true";
				
				if(mysql_num_rows($result) > 0) {

					?>
					<div  class="wrapperForSearch">
						<div  class="columns">
					<?php
					while ($row = mysql_fetch_assoc($result)) {
						$pid = $row['pid'];
						$nameNgo = $row['name'];
						$logoUrl = $row['logo'];
						$descNgo = substr($row['description'],0,150)."...";
					//echo " ".$nameNgo.$logoUrl.$descNgo;

						?>
						<form action="ngohome.php?id=<?php echo $pid ?>" method="post" enctype="multipart/form-data">
							<div class="pin">
								<input type="hidden" name="ngoPid" value=" <?php echo $pid ?>">
								<img src="<?php echo $logoUrl ?>" />
								<input type="submit" value="<?php echo $nameNgo ?>" style="width: 200px; font-weight:bold" onClick="ClearAll();" >
								<p><?php echo $descNgo ?></p>
							</div>
						</form>
						<?php
					}
					?>
						</div>
					</div>
					<?php 
				}
			}else {
				echo "No NGO has registered so far";
			}
			?>
			
	</body>


</html>