<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/png" href="../images/fav.png"/>
	<title>Project Location North</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/user_home.js"></script>
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
			<input class="form-control" id="search" type="text" placeholder="Search" />
			<button class="btn btn-secondary" type="submit">Search</button>
		</form>
		<div class="navbar-left" id="home-logout-button">
			<button class="btn btn-secondary" type="button">Logout</button>
		</div>
	</div>
	<!-- main body -->
	<div class="container" id="main_body">
		<!-- user profile -->
		<div class="well" id="users_profile">
			<div class="container" id="full_width">
				<div class="text-center" id="users_profile_image">
					<h3 id="username">
						<?php include_once '../php/userdata.php'; echo username(); ?>
					</h3>
					<img src="<?php include_once '../php/userData.php'; echo uploadedFile(); ?>" id="edit-profile-picture" /></br>
					<a href="user_edit.html.php">Edit</a> | <a id="delete_profile" href="#">Delete Profile</a>
				</div>
				<div id="profile_info">
					<?php include_once '../php/userData.php'; echo aboutMe(); ?>
				</div>
			</div>
		</div>
		<!-- user activity -->
		<div class="well" id="users_profile">
			<div class="container" id="full_width">
				<h3 id="username">Username<span>'s Activity</span></h3>
				<div id="users_profile_info">
					<!-- shopping -->
					<!-- <table class="table well" id="table_well">
						<thead>
								<tr>
									<th id="user-table">Price</th>
									<th id="user-table">Latest Purchase</th>
									<th id="user-table">Image</th>
								</tr>
								<tbody>
									<td id="user-table">$23.45</td>
									<td id="user-table">Aposon Men's Digital Electronic Waterproof LED Sport Watch Casual Quartz Military Multifunction 12H/24H Time Back Light with Simple Design 164FT 50M Water Resistant Calendar Month Date Day -Black</td>
									<td id="user-table"><img id="shopping_image" src="http://placehold.it/150x150"/></td>
								</tbody>
						</thead>
					</table> -->
					<!-- post -->
					<table class="table well" id="table_well">
						<thead>
							<tr>
								<th id="user-table">Latest Post</th>
								<th id="user-table">Comment</th>
								<th id="user-table">Date</th>
							</tr>
						</thead>
						<!-- remove later -->
						<tbody>
							<tr>
								<td id="user-table">Anniversary</td>
								<td id="user-table">this is an example of what your comment was for this post</td>
								<td id="user-table">12-12-12</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<h5><a href="#" id="footer-contacts">Contact</a> Finding Kita</h5>
	</div>
</body>
</html>
