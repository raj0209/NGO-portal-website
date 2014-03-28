<?php 
	include 'connect.php';
    include 'header.php';

    $searchQuery = $_POST['searchQuery'];

    $sqlQuery = "SELECT * FROM Ngo WHERE  name LIKE('%$searchQuery%') or address LIKE('%$searchQuery%')";
    $result = mysql_query($sqlQuery);

?>

<div  class="wrapper">
	<div  class="columns">

		<?php 
			if($result) {
				if(mysql_num_rows($result) > 0) {
					while ($row = mysql_fetch_assoc($result)) {
						$nameNgo = $row['name'];
						$logoUrl = $row['logo'];
						$descNgo = substr($row['description'],0,150)."...";
						//echo " ".$nameNgo.$logoUrl.$descNgo;

							?>
								<div class="pin">
									<img src="<?php echo $logoUrl ?>" />
									<h4><?php echo $nameNgo ?></h4>
									<p><?php echo $descNgo ?></p>
								</div>
						<?php
					}  
				}
			}else {
				echo "No event posted so far";
			}
		?>
		
	</div>
</div>