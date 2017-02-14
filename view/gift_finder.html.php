<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/png" href="../images/fav.png"/>
	<title>Project Location North</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<script type="text/javascript" src="../js/amazon/get_Items.js"></script>
	<script type="text/javascript" src="../js/amazon/search_results.js"></script>
</head>
<body>
	<!-- top nav bar -->
	<div class="navbar navbar-full" id="header">
		<a class="navbar-brand" href="index.html.php"><img src="../images/navtitle.png" /></a>
		<ul class="nav navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="index.html.php">Home</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="gift_finder.html.php">Gift Finder</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="forum_home.html.php">Community</a>
			</li>
		</ul>
		<form class="form-inline pull-xs-right" id="search_div">
			<input class="form-control" id="search" type="text" placeholder="Search">
			<button class="btn btn-secondary" type="submit">Search</button>
		</form>
		<div class="navbar-left" id="home-logout-button">
			<button class="btn btn-secondary" type="button">Logout</button>
		</div>
	</div>
	<!-- main body -->
	<div class="container" id="main_body">
		<div class="well">
			<!-- questionnaire  -->
			<h3>Let's Personalize Your Search</h3>
			<form class="form-horizontal">
				<?php include_once "../php/questions.php"; loadProfileQuestions("questions", "profile_answers", "profile"); ?>
				<div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-8">
						<button class="btn btn-secondary" onclick="location.href='results.html'" type="button">Search</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="footer">
		<h5><a href="#" id="footer-contacts">Contact</a> Finding Kita</h5>
	</div>
</body>
</html>
