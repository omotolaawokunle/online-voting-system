<?php include "../database/database.php"; ?>
<?php 
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$query = mysqli_query($conn, "SELECT *  FROM admin WHERE username='$username' AND password='$password'");
 if ($query->num_rows != 1) {
 		header("Location:login.php");
 		$error = "You have not logged in"; 
}
?>