<?php include '../templates/header.php'; ?>
<?php include 'checklog.php'; ?>
<h2 class="text-center">Voters Page</h2>
		<?php
				include '../database/database.php';
			$query = mysqli_query($conn,"SELECT * FROM voters WHERE name='$name'") or die("ERROR");
	 $row=mysqli_fetch_assoc($query);
	 ?>
		<div class="row">
			<div class="col m6 z-depth-4">
				<div class="card">
					<div class="card-image">
					<img src="/OVS/images/voters/<?php echo $row['picture'];?>" class='responsive-img' alt="<?php echo $row['name']?>">
					<span class="card-title">Voter's Card</span>
					</div>
					<div class="card-content">
					<ul class="collection">
						<li class="collection-item"><div><i class='fa fa-user'></i> Name <span class="secondary-content"><?php echo $row['name'];?></span></div></li>
						<li class="collection-item"><div><i class='fa fa-calendar'></i> Date of Birth <span class="secondary-content"><?php echo $row['dob'];?></span></div></li>
						<li class="collection-item"><div><i class='fa fa-state'></i> State <span class="secondary-content"><?php echo $row['state'];?></span></div></li>
						<li class="collection-item"><div><i class='fa fa-group'></i> Next of Kin <span class="secondary-content"><?php echo $row['nextofkin'];?></span></div></li>
						<li class="collection-item"><div><i class='fa fa-phone'></i> Phone Number <span class="secondary-content"><?php echo $row['pnumber'];?></span></div></li>
						<li class="collection-item"><div><i class='fa fa-envelope'></i> Email <span class="secondary-content"><?php echo $row['email'];?></span></div></li>
						<li class="collection-item"><div><i class='fa fa-key'></i> Secret Code <span class="secondary-content"><?php echo $row['code'];?></span></div></li>
					</ul>
					</div>
				</div>
 		</div>
 		<div class="col m6 right">
 			<div class="card">
 			<div class="card-content">
 				<span class="card-title">Vote</span>
 				<form method="post" action="/OVS/vote/index.php">
 					<div class="input-field">
 						<label for="c">Enter your Secret Code</label>
 						<input type="text" name="code" id="c" class="validate" required>
 					</div>
 					<div class="card-action">
 						<button type="submit" class="btn blue darken-4" name="submit">Vote</button>
 					</div>
 				</form>
 			</div>
 			</div>
 		</div>
	</div>


<?php include '../templates/footer.php' ?>
