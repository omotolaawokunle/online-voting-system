<?php include '../templates/header.php'; ?>
<?php include 'checklog.php'; ?>
<h2 class="center">Poll Results</h2>
<?php
	$sql = mysqli_query($conn, "SELECT * FROM positions") or die($conn);
	if($sql->num_rows < 1) {
?>
<p class="red-text center">No polls available</p>
<?php } else{
	echo "<div class='row'>";
	while($row = mysqli_fetch_assoc($sql)) :
 ?>
 	
 		<div class='col m6'>
 		<h3 class="text-center"><?php echo $row['posts']; ?></h3>
 		<?php
 		$post = $row['posts']; 
 		$ca = mysqli_query($conn, "SELECT * FROM candidate WHERE position ='$post'") or die($conn);
 		if($ca->num_rows < 1){
 			echo '<p class="red-text center">No polls available for ' .$row["posts"]. '</p>';
 		} else{
 			echo "<div class='responsive-table'><table class='table'>";
 			echo "<thead><th>Name</th><th>No. of Votes</th></thead>";
 			echo "<tbody>";
 			while($col = mysqli_fetch_assoc($ca)){
 			echo "<tr><td>".$col['name']."</td><td>".$col['votecount']."</td></tr>";
 		}
 		echo "</tbody></table></div>";
 		} ?>
 		</div>

 <?php endwhile; } ?>
</div>
</div>
<?php include '../templates/footer.php'; ?>