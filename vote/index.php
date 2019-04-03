<?php include '../templates/header.php'; ?>
<?php include 'checklog.php'; ?>
<h2 class="center">Polls</h2>
<?php
if(isset($_POST['code'])){
    $secret = $_POST['code'];
    $name = $_SESSION['name'];
    $sql = mysqli_query($conn,"SELECT * FROM voters WHERE name='$name' && code='$secret'") or die(mysqli_error($conn));
    if($sql->num_rows == 0){
        echo '<p class="red-text center">Secret Code Invalid</p>';
    }else{
	$sql = mysqli_query($conn, "SELECT * FROM positions") or die($conn);
	if($sql->num_rows < 1) {
?>
<p class="red-text center">No polls available</p>
<?php } else{
	echo "<div class='row'>";
	echo "<div class='col m10 offset-m1'>";
	echo "<table class='table striped'>";
	echo "<tr><th>Poll</th><th>Vote</th></tr>";
	while($row = mysqli_fetch_assoc($sql)) :
 ?>
 	<tr>
 		<td><?php echo $row['posts']; ?></td>
 		<td><form action="vote.php" method="post">
 			<input type="hidden" name="post" value="<?php echo $row['posts']; ?>"><button class="btn blue darken-4" type="submit" name="vote">Vote</button></form></td>
 	</tr>
 <?php endwhile; } ?>
</table>
<hr class="divider"><a class="btn btn-outline" href="../poll_result">Poll Results</a>
</div>
</div>
<?php }
}else{
   echo '<p class="red-text center">Please enter your secret code!</p>';
}?>
<?php include '../templates/footer.php'; ?>