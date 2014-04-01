<?php
	include 'connect.php';
	include 'database.php';
?>	
<!DOCTYPE html>
<html>
	<?php include 'head.php' ?>
	
	<body>
	<?php include 'header.php' ?>	

	 
		<div class="container">
			<table class="table table-bordered">
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
						while($cnt<=12)
						{
							$row = mysql_fetch_array($result);
							?>
						<tr>
							<td><?php echo $cnt ?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['address'];?></td>
							<td><?php echo $row['contact'];?></td>
							<td><?php echo $row['weighted_rate'];?></td>

						</tr>

						<?php $cnt=$cnt+1;
					}			
					?> <!--
						$_name=mysql_query("SELECT name from Ngo ORDER BY weighted_rating DESC");
						$_location=mysql_query("SELECT location from Ngo ORDER BY weighted_rating DESC");
						$_domain=mysql_query("SELECT catNgo.category from Ngo, catNgo where catNgo.Ngo_pid=Ngo.Ngo_pid ORDER BY Ngo.weighted_rating DESC");
						$_rating=mysql_query("SELECT weighted_rating from Ngo ORDER BY weighted_rating DESC");
						

						$i;

						for($i=0;$i<12;$i++)
							print "<tr><td>$_name[i]</td><td>$_location[i]</td><td>$_domain[i]</td><td>$_rating[i]</td></tr>\n"

						<td>1</td>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
						<td>1</td>
					</tr>
					
					<tr>
						<td>2</td>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
						<td>1</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Larry the Bird</td>
						<td>@twitter</td>
						<td>1</td>
						<td>1</td>
					</tr>-->


				</tbody>
			</table>
		</div>
	</body>


</html>



