<?php include '../templates/header.php' ?>
<h2 class="center">Candidacy Application</h2>
<div class="card z-depth-2">
	<div class="card-content">
	<span class="card-title">Rules for Candidacy</span>
	<div class="collection">
	<p class="collection-item">You must enter valid details for any chance of approval.</p>
	<p class="collection-item">You must register as a voter after applying for candidacy else you will not be approved.</p>
	<p></p>
	</div>
	</div>
</div>
<div class="row">
	<a href="application.php" class="btn blue col s4">Apply for Candidacy</a>
	<p class="col s1"></p>
	<form method="POST" action="application.php">
		<button type="submit" name="check" class="btn blue darken-3 col s4">Check Candidacy Approval</button>
	</form>
</div>
<hr>
<?php include '../templates/footer.php' ?>
