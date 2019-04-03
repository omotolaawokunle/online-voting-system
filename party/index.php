<?php include '../templates/header.php'; ?>
<h2 class="text-center">Parties</h2>
<div class="container">
	<p class="alert alert-info text-center">Parties in the database.</p>
	<?php $query = mysqli_query($conn, "SELECT * FROM party") or die($conn);
		if($query->num_rows < 1){
			echo "<span class='alert alert-danger'>No parties in the database</span><hr>";
		} else{
			echo "<div class='table-responsive'><table class='table table-striped text-center'><tr><td>Parties</td></tr>";
			while($row = mysqli_fetch_assoc($query)){
				echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "</tr>";
			}
			echo "</table></div>";
		}
	?>
	<a class="btn btn-primary" href="party.php">Register Party</a>
</div>


<?php include '../templates/footer.php'; ?>