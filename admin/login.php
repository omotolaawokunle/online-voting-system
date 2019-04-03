<?php include '../templates/header.php' ?>
<?php include '../database/database.php';
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = mysqli_query($conn, "SELECT * FROM admin WHERE username ='$username' AND password = '$password'") or die('error');
		if(mysqli_num_rows($query) > 0){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['admin_logged_in'] = TRUE;
			header("Location: index.php?dashboard");
		}else{
			$error = "Name or Password is invalid";
		}
	}
?>
<div class="row">
	<div class="col s8 offset-s2">
<div class="card center">
<div class="card-content">
	<span class="card-title">Admin Login</span>
	<div class="row">
		<div class="col m8 offset-m2">
	<form action="" method="POST">
		<div class="input-field">
			<label for="name"><i class="fa fa-user"></i> User Name</label>
			<input type="text" name="username" required class="validate" id="name" />
		</div>
		<div class="input-field">
			<label for="pass"><i class="fa fa-key"></i> Password</label>
			<input type="password" required name="password" class="validate">
		</div>
		<div class="card-action">
		<button type="submit" name="login" class="btn blue darken-3"><i class="fa fa-sign-in"></i> Login</button>
		</div>
	</form>
	<div>
			<?php if(isset($error)): ?><span class='red-text center'> <?php echo $error; ?></span> <?php endif;?>
			</div>
</div>
	
</div>
</div>
</div>
</div>
</div>
<?php include '../templates/footer.php' ?>
