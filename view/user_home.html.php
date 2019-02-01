<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/png" href="../images/fav.png"/>
	<title>Gift My Idea</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/tabletools/2.2.1/css/dataTables.tableTools.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/keypress/2.1.5/keypress.min.js"></script>
	<script type="text/javascript" src="../js/user_home.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<script type="text/javascript" src="../js/searchBox.js"></script>
</head>
<body>
	<!-- top nav bar -->
	<div class="navbar navbar-full" id="header">
		<a class="navbar-brand" href="index.html.php"><img id="navimage" src="../images/giftmyideaxcf.png" /></a>
		<ul class="nav navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="index.html.php">Topics</a>
			</li>
		</ul>
		<form class="form-inline pull-xs-right" id="search_div">
			<input class="form-control" id="search" type="text" placeholder="Search">
			<button class="btn btn-secondary search" type="button">Search</button>
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
				<h3 id="username"><?php include_once '../php/userdata.php'; echo username(); ?><span>'s Activity</span></h3>
				<div id="users_profile_info">
					<!-- post -->
					<table class="table well" id="table_well">
						<thead>
							<tr>
								<th id="user-table-post">Latest Post</th>
								<th id="user-table-comment">Comment</th>
								<th id="user-table-date">Date</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		<!-- Place add here
		<div>
		</div>
		-->
	</div>
	<!-- footer -->
	<div class="footer">
		<!-- Footer Modal -->
		<div id="footerModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Contact <img src="../images/giftmyideaxcf.png" /></h4>
					</div>
					<form class="modal-body user-modal" method="post" enctype="text/plain">
						<label>Name</label>
						<input class="form-control" type="text" id="contact-name" name="name" placeholder="Enter Name" /></br>
						<label>Email</label>
						<input class="form-control" type="text" id="contact-email" name="email" placeholder="Enter Email" /></br>
						<label>Subject</label>
						<input class="form-control" type="text" id="contact-subject" name="subject" placeholder="Enter Subject" /></br>
						<label>Message</label>
						<textarea class="form-control" rows="3" type="text" id="contact-message" name="message" placeholder="Enter Message"></textarea>
					</form>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-secondary contact-message" data-dismiss="modal" onclick="sendMessage()" >Send</button>
					</div>
				</div>
			</div>
		</div>
		<h5><span onmouseover="" style="color:#FF0000; cursor:pointer;" data-toggle="modal" data-target="#footerModal" id="footer-contacts">Contact</span> Find Kita</h5>
	</div>
</body>
</html>
