<?php include '../templates/header.php' ?>
<?php
				//check if submit variable register has been posted
					include '../database/database.php';
					if(isset($_POST['register'])){
						$name = $_POST['name'];
						$password = md5($_POST['password']);
						$state = $_POST['state'];
						$number = $_POST['mnumb'];
						$nok = $_POST['nok'];
						$dob = $_POST['dob'];
						$email = $_POST['email'];
						$code = random_int(1000, 9999);
						$target = "../images/voters/".basename($_FILES['picture']['name']);
						$picture = $_FILES['picture']['name'];
						move_uploaded_file($_FILES['picture']['tmp_name'], $target) or die(mysqli_error("File too large"));
						if(!empty($name)){
						$query = mysqli_query($conn,"SELECT * FROM voters WHERE email = '$email'") or die(mysqli_error()); if($row = mysqli_fetch_array($query)) {  
			 	 	$error = "SORRY...".$email." HAS ALREADY REGISTERED!";
						}else{
							mysqli_query($conn, "INSERT INTO voters(name, password, state, pnumber, picture, nextofkin, dob, email, code) VALUES('$name', '$password', '$state', '$number', '$picture', '$nok', '$dob', '$email', '$code') ") or die(mysqli_error($conn));
						if(mysqli_affected_rows($conn) > 0) {
							$success = "".$name."'s REGISTRATION IS SUCCESSFUL. Your secret code is ".$code.".<br> Please write it down and keep. It will be used for Voting later on.";
						}
						}
					}
				}
			?>
			<div class="center">
			<?php if(isset($success)): ?><span class='green-text'> <?php echo $success; ?></span><?php endif;?>
			<?php if(isset($error)): ?><span class='red-text'> <?php echo $error; ?></span><?php endif;?>
			</div>
<h2 class="center">Voters Registration</h2>
<div class="card center">
	<div class="card-content text-center">
	<span class="card-title">Please fill all fields in the form below</span>
	<p class="center">Registration commences a month before the elections and ends a week before elections.</p>
	<div class="center"><span>Already Registered? Please <a href='/OVS/voters/login'>Login</a></span></div>
	<div class="row">
		<div class="col m8 offset-m2">
	<form action="" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="input-field col s6">
			<label for="name">Full Name</label>
			<input type="text" name="name" required class="validate" id="name">
		</div>
		<div class="input-field col s6">
			<label for="p">Password</label>
			<input type="password" required name="password" class="validate" id="p">
		</div>
		</div>
		<div class="row">
		<div class="input-field col s6">
			<select required name="state">
				<option disabled selected>Choose Your State </option>
				<option value="Abuja FCT">Abuja FCT</option>
				<option value="??">??</option>
			</select>
		</div>
		<div class="input-field col s6">
			<label for="num">Phone Number</label>
			<input type="number" required name="mnumb" class="validate" id="num">
		</div>
		</div>
		<div class="row">
		<div class="input-field col s6">
			<label for="d">Date of Birth</label>
			<input type="text" required name="dob" class="datepicker" id="d">
		</div>
		<div class="input-field col s6">
			<label for="nok">Full Name of Next of Kin</label>
			<input type="text" name="nok" required class="validate" id="nok">
		</div>
		</div>
		<div class="row">
			<div class="input-field col s8 offset-s2">
				<label for="e">Email</label>
				<input type="email" required name="email" class="validate" id="e">
			</div>
		</div>
		<div class="file-field input-field">
      		<div class="btn blue accent-2">
        		<span>Upload Passport</span>
        		<input type="file" required name="picture">
      		</div>
      		<div class="file-path-wrapper">
        			<input class="file-path validate" type="text">
      		</div>
   			</div>
   			<div class="card-action">
		<button type="submit" name="register" class="btn blue darken-4">Register</button>
		</div>
	</form>
</div>
</div>
	</div>	
</div>
<?php include '../templates/footer.php' ?>
