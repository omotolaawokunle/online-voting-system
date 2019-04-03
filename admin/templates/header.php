<?php
	session_start();
	include '../database/database.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
			<a href="#" class="brand-logo center">EVS</a>
		<ul class="right hide-on-med-and-down">
			<li><a href="?logout">Logout</a></li>
		</ul>
	</div>
	</nav>
</div>
<ul id="slide-out" class="sidenav sidenav-fixed">
      <?php if(isset($_GET['dashboard'])) : ?>
            <li class="active"><a href="#">Dashboard</a></li>
        <?php else: ?>
            <li><a href="?dashboard">Dashboard</a></li>
        <?php endif; ?>
     <?php if(isset($_GET['approve'])) : ?>
            <li class="active"><a href="?approve">Approve Candidacy</a></li>
        <?php else : ?>
        	<li><a href="?approve">Approve Candidacy</a></li>
        <?php endif; ?>
        <?php if(isset($_GET['createp'])) : ?>
            <li class="active"><a href="?createp">Create Positions</a></li>
        <?php else: ?>
            <li><a href="?createp">Create Positions</a></li>
        <?php endif;?>
        <?php if(isset($_GET['deletec'])) : ?>
            <li class="active"><a href="?deletec">Delete Candidates</a></li>
            <?php else: ?>
            <li><a href="?deletec">Delete Candidates</a></li>
        <?php endif;?>
        <?php if(isset($_GET['deletep'])) : ?>
            <li class="active"><a href="?deletep">Delete Positions</a></li>
        <?php else: ?>
            <li><a href="?deletep">Delete Positions</a></li>
        <?php endif; ?>
    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fa fa-menu">menu</i></a>
          
<div class="container main" id="main">