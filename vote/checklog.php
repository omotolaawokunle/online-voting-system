<?php include "../database/database.php"; ?>
<?php 
$name = $_SESSION['name'];
$query = mysqli_query($conn, "SELECT *  FROM voters WHERE name='$name'");
 if ($query->num_rows != 1) {
 		header("Location:../voters/login.php");
 		$error = "You have not logged in"; 
}
?>