<?php
 include '../database/database.php';?>
<?php
//check if candidate wants to check approval
	if(isset($_POST['check'])) :
?>
			<?php include '../templates/header.php' ?>
			<h2 class="center">Check Application Success</h2>
			<div class="card">
				<div class="card-content">
				<span class="card-title">Enter your full name below</span>
				<div class="row center">
					<div class="col m8 offset m2">
				<form action="" method="POST">
					<div class="input-field">
						<input type="text" name="name" id="name" required class="validate">
						<label for="name">Enter Full Name used for application</label>
					</div>
					<button type="submit" name="validate" class="btn blue darken-4">Check Candidacy Approval</button>
				</form>
			</div>
			</div>
				</div>
				
			</div>
			<?php include '../templates/footer.php' ?>
		<?php elseif(isset($_POST['apply'])) : ?>
				<?php
				//check if submit variable apply has been posted
					include '../database/database.php';

						$name = $_POST['name'];
						$dob = $_POST['dob'];
						$state = $_POST['state'];
						$post = $_POST['post'];
						$gender = $_POST['gender'];
						$target = "../images/candidates/".basename($_FILES['picture']['name']);
						$picture = $_FILES['picture']['name'];
						move_uploaded_file($_FILES['picture']['tmp_name'], $target) or die(mysqli_error());
						if(!empty($name)){
						$query = mysqli_query($conn,"SELECT * FROM candidate WHERE name = '$name'") or die(mysqli_error()); if($row = mysqli_fetch_array($query)) {  
			 	 	$error = "SORRY...".$name." HAS ALREADY APPLIED FOR A POST...";
						}else{
							mysqli_query($conn, "INSERT INTO candidate(name, dob, state, position, picture, gender) VALUES('$name', '$dob', '$state', '$post', '$picture', '$gender') ") or die(mysqli_error($conn));
						if(mysqli_affected_rows($conn) > 0) {
							$success = "".$name."'s APPLICATION HAS BEEN REGISTERED. Check back for approval in the next 24 hours..";
						}
						}
					}
			?>
			<?php include '../templates/header.php' ?>
			<div class="center">
			<?php if(isset($error)): ?><div class='card-panel red-text darken-2'><p> <?php echo $error; ?></p></div> <?php endif;?>
			<?php if(isset($success)): ?><div class='card-panel green-text darken-3'><p><?php echo $success; ?></p></div> <?php endif;?>
			</div>
<h2 class="center">Application for Candidacy</h2>
<div class="card z-depth-3">
	<div class="card-content">
	<span class="card-title center">Fill the form below with valid details</span>
		<div class="row center">
		<div class="col m8 offset-m2">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="input-field">
			<input type="text" name="name" id="ni" required class="validate">
			<label for="ni">Full Name</label>
		</div>
		<div class="row">
		<div class="input-field col s6">
				<input type="text" class="datepicker" required name="dob" id="dobz">
				<label for="dobz">Date of Birth</label>
			</div>
		<div class="input-field col s6">
			<select name="state" required>
				<option value="Abuja FCT"> Abuja FCT </option>
			</select>
			<label>State</label>
		</div>
		</div>
		<div class="input-field">
			<select required name="post">
				<?php $query = mysqli_query($conn, "SELECT * FROM positions") or die('error'); while($row = mysqli_fetch_assoc($query)) :  ?>
				<option value="<?php echo $row['posts'] ?>"><?php echo $row['posts'] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Post</label>
		</div>
		<div class="row">
      	<div class="col offset">
				<input name="gender" type="radio" id="male" value="Male" />
      			<label for="male">Male</label>
				<input name="gender" type="radio" id="female" value="Female" />
      			<label for="female">Female</label>
  		</div>
		</div>
		<div class="file-field input-field">
      		<div class="btn">
        		<span>Upload Passport</span>
        		<input type="file" required name="picture">
      		</div>
      		<div class="file-path-wrapper">
        			<input class="file-path validate" type="text">
      		</div>
   			</div>
		<button type="submit" name="apply" class="btn blue accent-2">Apply</button>
			</form>
		</div>
		</div>
	</div>
		<div class="card-action">
	<form method="POST" action="">
		<button type="submit" name="check" class="btn blue darken-4">Check Candidacy Approval</button>
	</form>
	</div>
</div>
<?php include '../templates/footer.php' ?>
<?php elseif(isset($_POST['validate'])): ?>
<?php
	//check if submit variable validate has been posted
 	$name = $_POST['name'];
 	include '../database/database.php';
 	$query = mysqli_query($conn, "SELECT * FROM candidate WHERE name = '$name'");
 	if($query->num_rows < 1){
 		$error = $name." not found in the database!";
 	} else{
 	$row = mysqli_fetch_array($query);
 	$validate = $row['validate'];
 	$post = $row['position'];
 	if($validate < 1){
 		$error = $name. " HAS NOT BEEN APPROVED! Please check back later";
 	} else{
 		$success = $name. " HAS BEEN APPROVED to run for ".$post.". Congratulations!!";
 	}}
?>
<?php include '../templates/header.php' ?>
			<div>
			<?php if(isset($error)): ?><div class='card-panel red-text darken-2'><p> <?php echo $error; ?></p></div> <?php endif;?>
			<?php if(isset($success)): ?><div class='card-panel green-text darken-3'><p><?php echo $success; ?></p></div> <?php endif;?>
			</div>
			<h2 class="center">Check Application Success</h2>
			<div class="card">
				<div class="card-content">
				<span class="card-title">Enter your full name below</span>
				<div class="row center">
					<div class="col m8 offset m2">
				<form action="" method="POST">
					<div class="input-field">
						<input type="text" name="name" id="name" required class="validate">
						<label for="name">Enter Full Name used for application</label>
					</div>
					<button type="submit" name="validate" class="btn blue darken-4">Check Candidacy Approval</button>
				</form>
			</div>
			</div>
				</div>
				
			</div>
			<?php include '../templates/footer.php' ?>
		<?php else: ?>
			<?php include '../templates/header.php' ?>
			<div>
			<?php if(isset($error)): ?><div class='card-panel red-text darken-2'><p> <?php echo $error; ?></p></div> <?php endif;?>
			<?php if(isset($success)): ?><div class='card-panel green-text darken-3'><p><?php echo $success; ?></p></div> <?php endif;?>
			</div>
<h2 class="center">Application for Candidacy</h2>
<div class="card z-depth-3">
	<div class="card-content">
	<span class="card-title center">Fill the form below with valid details</span>
		<div class="row center">
		<div class="col m8 offset-m2">
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="input-field">
			<input type="text" name="name" id="ni" required class="validate">
			<label for="ni">Full Name</label>
		</div>
		<div class="row">
		<div class="input-field col s6">
				<input type="text" class="datepicker" required name="dob" id="dobz">
				<label for="dobz">Date of Birth</label>
			</div>
		<div class="input-field col s6">
			<select name="state" required>
				<option value="Abuja FCT"> Abuja FCT </option>
			</select>
			<label>State</label>
		</div>
		</div>
		<div class="input-field">
			<select required name="post">
				<?php $query = mysqli_query($conn, "SELECT * FROM positions") or die('error'); while($row = mysqli_fetch_assoc($query)) :  ?>
				<option value="<?php echo $row['posts'] ?>"><?php echo $row['posts'] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Post</label>
		</div>
		<div class="row">
      	<div class="col offset">
				<input name="gender" type="radio" id="male" value="Male" />
      			<label for="male">Male</label>
				<input name="gender" type="radio" id="female" value="Female" />
      			<label for="female">Female</label>
  		</div>
		</div>
		<div class="file-field input-field">
      		<div class="btn">
        		<span>Upload Passport</span>
        		<input type="file" required name="picture">
      		</div>
      		<div class="file-path-wrapper">
        			<input class="file-path validate" type="text">
      		</div>
   			</div>
		<button type="submit" name="apply" class="btn blue accent-2">Apply</button>
			</form>
		</div>
		</div>
	</div>
		<div class="card-action">
	<form method="POST" action="">
		<button type="submit" name="check" class="btn blue darken-4">Check Candidacy Approval</button>
	</form>
	</div>
</div>
<?php include '../templates/footer.php' ?>
	<?php endif; ?>