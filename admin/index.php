<?php include 'templates/header.php'; ?>
 <?php include 'checklog.php'; ?>
 <?php if(isset($success)) : ?>
 	<span class="green-text center"><?php echo $success; ?></span>
 	<?php endif; ?>


		<?php if(isset($_GET['approve'])) : ?>
			<h1>Approve Candidacy</h1>
			<div class="table-responsive">
			<table class="table striped">
				<tr>
				<th>Name</th>
				<th>Position</th>
				<th></th>
			</tr>
			<?php 
			$query = mysqli_query($conn, "SELECT * FROM candidate WHERE validate=0");
			if($query->num_rows < 1 ){
				echo '<tr class="red-text"><td class="center">No candidate to validate!</td><td></td></tr>';
			}else { ?>
			<?php while ($row = mysqli_fetch_assoc($query)) : ?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['position']; ?></td>
				<td><form action="" method="post">
				<input type="hidden" name="name" value="<?php echo $row['name'];?>"/><button type="submit" class="btn btn-outline" name="success">Approve</button></form></td>
			</tr>
		<?php endwhile; ?>
		<?php if(isset($_POST['success'])){
				$name = $_POST['name'];
			$update = mysqli_query($conn, "UPDATE candidate SET validate=1 WHERE name='$name'") or die($conn);
			$success = '<p class="green-text">' .$name. ' approved successfully</p>';

		}
 ?>
		<?php } ?> 
		<?php if(isset($success)) {echo $success;} ?>
		</table>
	</div>
		<?php elseif(isset($_GET['createp'])) : ?>
			<div class="row">
			<h1>Create Posts</h1>
			<div class="col m10 offset-m1">
			<form action="" method="POST">
				<div class="input-field">
				<label for="po"> Post Name</label>
				<input type="text" name="post" class="validate" required id="po"> </div>
				<div class="input-field">
				<label for="l"> Limit</label>
				<input type="number" required name="limit" class="validate" id="l"> </div>
				<button type="submit" class="btn blue darken-4" name="savep">Save Post</button>
			</form>
			<?php if(isset($_POST['savep'])){
				$post = $_POST['post'];
				$limit = $_POST['limit'];
				$sql = mysqli_query($conn, "SELECT * FROM positions WHERE posts='$post'") or die('error');
				if($sql->num_rows > 0) {
					$error  = $post." has already been created!";
					echo '<span class="red-text center">'.$error.' </span>';
				}	else{
					mysqli_query($conn, "INSERT INTO positions(posts, limits) VALUES('$post', $limit) ") or die(mysqli_error($conn));
					$saved = $post. " created successfully";
					echo '<span class="green-text center">'.$saved.' </span>';
				}
			}
			  ?>
		</div>
	</div>
<?php elseif(isset($_GET['deletec'])) : ?>
	<div class="row">
			<h1>Delete Candidate</h1>
			<div class="col m10 offset-m1">
			<table class="table striped">
				<tr>
				<th>Name</th>
				<th>Position</th>
				<th></th>
			</tr>
			<?php 
			$query = mysqli_query($conn, "SELECT * FROM candidate");
			if($query->num_rows < 1 ){
				echo '<tr class="red-text"><td class="center">No candidates in database!</td><td></td></tr>';
			}else { ?>
			<?php while ($row = mysqli_fetch_assoc($query)) : ?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['position']; ?></td>
				<td><form action="" method="post">
				<input type="hidden" name="name" value="<?php echo $row['name'];?>"/><button type="submit" class="btn red darken-1" name="delc"><i class="fa fa-trash"></i></button></form></td>
			</tr>
		<?php endwhile; ?>
			<?php if(isset($_POST['delc'])){
				$name = $_POST['name'];
				$sql = mysqli_query($conn, "SELECT * FROM candidate WHERE name='$name'") or die('error');
				if($sql->num_rows < 1) {
					$error  = $name." does not exist!";
					echo '<span class="red-text center">'.$error.' </span><hr>';
				}	else{
					mysqli_query($conn, "DELETE FROM candidate WHERE name ='$name'") or die(mysqli_error($conn));
					$deleted = $post. " deleted successfully";
					echo '<span class="green-text center">'.$deleted.' </span>';
				}
			}
		}
			  ?>
</table>
</div>
</div>
		<?php elseif(isset($_GET['deletep'])) : ?>
	<div class="row">
			<h1>Delete Position</h1>
			<div class="col m10 offset-m1">
			<table class="table striped">
				<tr>
				<th>Position</th>
				<th></th>
			</tr>
			<?php 
			$query = mysqli_query($conn, "SELECT * FROM positions");
			if($query->num_rows < 1 ){
				echo '<tr class="red-text"><td class="center">No candidates in database!</td><td></td></tr>';
			}else { ?>
			<?php while ($row = mysqli_fetch_assoc($query)) : ?>
			<tr>
				<td><?php echo $row['posts']; ?></td>
				<td><form action="" method="post">
				<input type="hidden" name="name" value="<?php echo $row['posts'];?>"/><button type="submit" class="btn red darken-1" name="delp"><i class="fa fa-trash"></i></button></form></td>
			</tr>
		<?php endwhile; ?>
			<?php if(isset($_POST['delp'])){
				$name = $_POST['name'];
				$sql = mysqli_query($conn, "SELECT * FROM positions WHERE posts='$name'") or die('error');
				if($sql->num_rows < 1) {
					$error  = $name." does not exist!";
					echo '<span class="red-text center">'.$error.' </span><hr>';
				}	else{
					mysqli_query($conn, "DELETE FROM positions WHERE name ='$name'") or die(mysqli_error($conn));
					$deleted = $post. " deleted successfully";
					echo '<span class="green-text center">'.$deleted.' </span><hr>';
				}
			}
		}
			  ?>
			</table>
		</div>
	</div>
		<?php else : ?>
          <h1>Dashboard</h1>

          <div class="row">
            <div class="col m6">
              <h4>Voters</h4>
              <span>Number of Voters</span>
              <?php $sql = mysqli_query($conn, "SELECT * FROM voters") or die();
              echo '<h4>'.mysqli_num_rows($sql).'</h4>'; ?>
            </div>
            <div class="col m6">
           		<h4>Candidates</h4>
              <span>Number of Candidates</span>
              <?php $sql = mysqli_query($conn, "SELECT * FROM candidate") or die();
              echo '<h4>'.mysqli_num_rows($sql).'</h4>'; ?>
            </div>
          </div>
      <?php endif; ?>
<?php include 'templates/footer.php' ?>
