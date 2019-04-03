<?php include '../templates/header.php'; ?>
<h2 class="text-center">Parties</h2>
<div class="panel panel-default">
	<p class="panel-heading text-center">Register Party</p>
	<div class="row">
	<form class="col-md-4 col-md-offset-4" action="" method="POST">
		<div class="form-group">
			<label>Official Party Name</label>
			<input type="text" class="form-control" name="party" placeholder="Enter Party Name">
		</div>
		<div class="form-group">
			<label>Official Party Abbreviation</label>
			<input type="text" class="form-control" name="abbr" placeholder="Enter Party Abbreviation" maxlength="5">
		</div>
		<button class="btn btn-primary" type="submit" name="register">Register Party</button>
	</form>
	<hr>
	<?php
	if(isset($_POST['register'])){
		$party = $_POST['party'];
		$abbr = $_POST['abbr'];
		$sql = mysqli_query($conn, "SELECT * FROM party WHERE name = '$party'") or die($sql);
		if($sql->num_rows > 0){
			echo "<span class='alert alert-danger'>".$party." already exists!!</span><hr>";
		}else {
			$reg = mysqli_query($conn, "INSERT INTO party(name, abbr) VALUES('$party', '$abbr')") or die($conn);
				echo "<span class='alert alert-success'>".$party." registered successfully!!</span>";
		}
	} 
	?>
</div>
</div>
<?php include '../templates/footer.php'; ?>