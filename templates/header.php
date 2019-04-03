<?php
	session_start();
	if($_SERVER['PHP_SELF'] !== "/OVS/index.php" && $_SERVER['PHP_SELF'] !== "/OVS/about.php"){
	require_once('../database/database.php'); } 
	$home = '/OVS/';
	if(isset($_GET['logout'])){
		session_destroy();
		header("Location:".$home."index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0,
maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo $home; ?>favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $home; ?>favicon.ico" type="image/x-icon">
	<title>Online Voting System</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $home; ?>css/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $home; ?>css/materialize/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $home; ?>css/style.css">
</head>
<body>
<div class="navbar">
	<nav>
		<div class="nav-wrapper blue darken-2">
			<a href="#" class="brand-logo">EVS</a>
		<ul class="right hide-on-med-and-down">
			<li class="active"><a href="index.php">Home</a></li>
			<?php if(!isset($_SESSION['logged_in'])) : ?>
			<li><a class="dropdown-button" href="#" data-target="dropdown1">Register</a></li>
			<li><a class="dropdown-button" href="#" data-target="dropdown2">Login</a></li>
			<?php elseif(isset($_SESSION['logged_in'])) : ?>
				<li><a href="<?php echo $home; ?>voters">Profile</a></li>
				<li><a href="?logout">Logout</a></li>
			<?php endif; ?>
			<li><a href="#">About</a></li>
		</ul>
	</div>
	</nav>
	<ul id="dropdown1" class="dropdown-content">
  <li><a href="/OVS/voters/register.php">Voters</a></li>
  <li class="divider"></li>
  <li><a href="/OVS/candidates/application.php">Candidates</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><a href="/OVS/voters/">Voters</a></li>
  <li class="divider"></li>
  <li><a href="/OVS/candidates/index.php">Candidates</a></li>
</ul>
	</div>
<div class="container main">

