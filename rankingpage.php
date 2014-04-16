<?php
	include 'connect.php';
	include 'database.php';


	// the following code is to add "Load more NGOs" functionality on this page.
	$counter = 1;
	
	if(isset($_POST['counter'])){
		$counter=$_POST['counter'];
	}
	$endinitial=10*$counter;
	$cnt=1;
?>	
<!DOCTYPE html>
<html>
	<?php include 'head.php' ?>
	
	<body>
	<?php include 'header.php' ?>	
	
	<!--activates the current tab -->
	<script>
	document.getElementById("home").setAttribute("class", "");
	document.getElementById("ranks").setAttribute("class", "active");
	document.getElementById("contactUs").setAttribute("class", "");
	</script>
	 
	<!--following code is about displaying top organisations in tabular form -->
	<div class="container">
			<table class="table table-striped">
				<thead>
				  <tr>
					<th>Rank</th>
					<th>Name of the Organisation</th>
					<th>Location</th>
					<th>Contact Number</th>
					<th>Rating</th>
				  </tr>
				</thead>
				<tbody>
					
					<?php
						$result=mysql_query("SELECT * FROM Ngo Order by weighted_rate DESC");
						$cnt=1;
						$nResults = mysql_num_rows($result);
						while($cnt<=$endinitial && $cnt<=$nResults)
						{
							$row = mysql_fetch_array($result);

							?>
						<!--following code gets the information about the NGOs -->	
						<tr>
							<td><?php echo $cnt ?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['city']; echo ' , ' ; echo $row['state'];?></td>
							<td><?php echo $row['contact'];?></td>
							<td><?php echo number_format((float)$row['weighted_rate'], 2, '.', '');?> </td>

						</tr>

						<?php $cnt=$cnt+1;
					}			
					?> 
				</tbody>
			</table>

			<!--code of loading more NGOs -->
			<div background="NONE">
					<form action="rankingpage.php" method="post">
						<?php
							if($cnt<$nResults)
							{
						?>
						<button type="submit" class="btn btn-warning" name="counter" value="<?php echo ($counter+1);?>" >Load more NGOs</button>
						<?php
							}

							else if($cnt==$nResults)
							{?>
						<button type="hidden" class="btn btn-warning" name="counter" value="<?php echo ($counter+1);?>" >Load more NGOs</button>

							<?php
							}
						?>

					</form>
			</div>

		</div>
	
	</body>


</html>



