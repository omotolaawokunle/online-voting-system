<?php include '../templates/header.php' ?>
<?php include '../database/database.php';
	if(isset($_POST['login'])){
		$name = $_POST['name'];
		$password = md5($_POST['password']);
		$query = mysqli_query($conn, "SELECT * FROM voters WHERE name ='$name' AND password = '$password'") or die('error');
		$data = mysqli_fetch_assoc($query);
		if(mysqli_num_rows($query) > 0){
			$_SESSION['name'] = $name;
			$_SESSION['logged_in'] = TRUE;
			$_SESSION['state'] = $data['state'];
			header("Location: index.php");
		}else{
			$error = "Name or Password is invalid";
		}
	}
?>
<h2 class="text-center">Voters Login</h2>
<div class="card center">
<div class="card-content">
	<span class="card-title">Login</span>
	<p class="center">Not Registered? Please <a href='/OVS/voters/register.php'>Sign Up</a></p>
	<div class="row">
		<div class="col m4 offset-m4">
	<form action="" method="POST">
		<div class="input-field">
			<label for="n">Full Name</label>
			<input type="text" name="name" required class="form-control" id="n">
		</div>
		<div class="input-field">
			<label for='p'>Password</label>
			<input type="password" required name="password" class="validate" id="p">
		</div>
		<div class="card-action">
		<button type="submit" name="login" class="btn blue darken-1">Login</button>
		</div>
	</form>
	<div>
			<?php if(isset($error)): ?><span class='red-text center'> <?php echo $error; ?></span> <?php endif;?>
			</div>
</div>
</div>
</div>
</div>

<?php include '../templates/footer.php' ?>
