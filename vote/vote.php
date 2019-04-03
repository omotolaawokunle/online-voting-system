<?php include '../templates/header.php'; ?>
<?php include 'checklog.php'; ?>
<h2 class="text-center">Vote</h2>
<?php if(isset($_POST['poll'])){
	$cand = $_POST['name'];
	$sel = mysqli_query($conn, "SELECT * FROM candidate WHERE name ='$cand'") or die($conn);
	$d = mysqli_fetch_assoc($sel);
	$post = $d['position'];
	$save = mysqli_query($conn,"INSERT INTO votecount(CandID, Position, Result, VoterID) VALUES('$cand', '$post', 1,'$name')") or die($conn->error.__LINE__);
	$ver = mysqli_query($conn,"UPDATE votecount SET VoterID = '$name' WHERE CandID='$cand'") or die($conn);
	$sql = mysqli_query($conn,"UPDATE candidate SET votecount = votecount + 1 WHERE name='$cand'") or die($conn);
	echo "<p class='green-text center'>You have voted successfully!! <a href='../poll_result/' class='btn btn-outline'>Check Ongoing poll results</a><hr><a href='index.php'>Go back to Polls</a></p>";
	die();
}else { 
 if(!isset($_POST['vote'])){
	header("Location: index.php");
}
 ?>
<div class="row">
	<div class="col m8 offset-m2">
		<?php
			if(isset($_POST['vote'])) {
				$post = $_POST['post'];
				$call = mysqli_query($conn, "SELECT * FROM voters WHERE name = '$name'") or die($conn);
				$data = mysqli_fetch_assoc($call);
				$state = $data['state'];
				$ck = mysqli_query($conn, "SELECT * FROM votecount WHERE Position = '$post' AND VoterID='$name' ") or die($conn);
				if($ck->num_rows > 0){
					echo "<p class='red-text center'> You have already voted in the ".$post." poll!! <a href='index.php'> Go back to Polls</a></p>";
				} else{
				if($post === "Governor"){
					$gov = mysqli_query($conn, "SELECT * FROM candidate WHERE position='$post' AND state='$state' AND validate=1") or die($conn);
				if($gov->num_rows < 1){
					echo "<p class='red-text center'>No governorship polls in ".$state."</p>";
				}else{
					echo "<h5 class='center'>".$post." Polls for ".$state."</h5>";
					echo "<ul class='collection'><form action='' method='post'>";
					while($row = mysqli_fetch_assoc($gov)) {
						echo '<li class="collection-item avatar">
             <img src = "/OVS/images/candidates/'.$row['picture'].'" alt="candidate image" class="responsive-img circle">
			<label>
			<input type="radio" required name="name" value="'.$row['name'].'"> <span>'  .$row['name'].'</span>
		</label>
		</li>';
					}
				echo '<li class="collection-item center">
	<button class="btn blue darken-4" type="submit" name="poll"><i class="fa fa-check-square-o"></i>  Vote</button>
</li>
</form>
</ul>';
}
	}else{
				$sql = mysqli_query($conn, "SELECT * FROM candidate WHERE position='$post'  AND validate=1") or die($conn);
				if($sql->num_rows < 1){
					echo "<p class='red-text center'>No candidates currently for this poll</p>";
				}else{
					echo "<h5 class='blue-text center'>".$post." Polls</h5>";
					echo "<div class='collection'><form action='' method='post'>";
					while($row = mysqli_fetch_assoc($sql)) :
		?>
		<div class="collection-item avatar">
		<img src = "/OVS/images/candidates/<?php echo $row['picture']?>" alt="candidate image" class="circle">
			<label>
			<input type="radio" required name="name" value="<?php echo $row['name']; ?>"/><span> <?php echo $row['name']; ?></span>
		</label>
		</div>
	<?php endwhile; ?>
	<div class="collection-item center">
	<button class="btn blue darken-4" type="submit" name="poll"><i class="fa fa-check-square-o"></i>  Vote</button>
</div>
</form>
</div>
		<?php }}}} ?>
	</div>
</div>
<?php } ?>
<?php include '../templates/footer.php'; ?>