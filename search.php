<?php
	//Start session
	session_start();

	include 'connect.php';

    $searchQuery = $_POST['searchQuery'];
    $searchCatagory = $_POST['selectedCatagory'];

    if($searchCatagory == "All")
    {
    	$sqlQuery = "SELECT * FROM Ngo WHERE  name LIKE('%$searchQuery%') or address LIKE('%$searchQuery%')";
    	$result = mysql_query($sqlQuery);
    }else{
    	$sqlQuery = "SELECT * FROM ( SELECT pid, name, logo, description FROM Ngo WHERE  name LIKE('%$searchQuery%') or address LIKE('%$searchQuery%') ) AS ngo 
    	INNER JOIN ( SELECT * FROM CatNgo WHERE  category LIKE('%$searchCatagory%') ) AS cat ON ngo.pid=cat.ngo_pid";
    	$result = mysql_query($sqlQuery);
    }
?>

<!DOCTYPE html>
<html>
	<?php	include 'head.php'; ?>		
	
	<body>
		<?php	include 'header.php'; ?>

		<div  class="wrapperForSearch">
			<div  class="columns">

				<?php 
				if($result) {
				// setting this variable to pass check in authontication in auth.php and ngohome.php
					$_SESSION['search'] = "true";
					
					if(mysql_num_rows($result) > 0) {
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
					}
				}else {
					echo "No event posted so far";
				}
				?>
				
			</div>
		</div>
		
	</body>


</html>