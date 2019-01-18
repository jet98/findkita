<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/png" href="../images/fav.png"/>
	<title>Gift My Idea</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/keypress/2.1.5/keypress.min.js"></script>
	<script type="text/javascript" src="../js/user_edit.js"></script>
	<script type="text/javascript" src="../js/questions.js"></script>
	<script type="text/javascript" src="../js/userSavedQuestions.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<script type="text/javascript" src="../js/upload.js"></script>
	<script type="text/javascript" src="../js/amazon/get_Items.js"></script>
	<script type="text/javascript" src="../js/searchBox.js"></script>
</head>
<body>
	<!-- top nav bar -->
	<div class="navbar navbar-full" id="header">
		<a class="navbar-brand" href="index.html.php"><img src="../images/navtitle.png" /></a>
		<ul class="nav navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="user_home.html.php"><?php include_once '../php/userdata.php'; echo username(); ?></a>
			</li>
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
		<!-- profile picture / upload photo -->
		<div id="profile_picture">
			<h3 id="logo">Profile Picture</h3>
			<img src="<?php include_once '../php/userData.php'; echo uploadedFile(); ?>" id="edit-profile-picture" title="Profile Picture" />
			<form name="file" method="post" enctype="multipart/form-data">
				<input type="file" name="file_to_upload" id="file_to_upload">
				<input type="button" value="Upload Image" id="upload_file">
			</form>
			<div id="user_info">
				<h4 id="edit_page_username">
					<?php include_once '../php/userData.php'; echo username(); ?>
				</h4>
				<h4 id="edit_page_name">
					<?php include_once '../php/userData.php'; echo name(); ?>
				</h4>
				<h4 id="edit_page_email">
					<?php include_once '../php/userData.php'; echo email(); ?>
				</h4>
			</div>
		</div>
		<!-- edit profile form -->
		<div class="well" id="edit_profile">
			<h3>Edit Profile</h3>
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-md-3 control-label">Username:</label>
					<div class="col-md-8">
						<input class="form-control" type="text" id="username" value="<?php include_once '../php/userData.php'; echo username(); ?>" disabled="true">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Email:</label>
					<div class="col-md-8">
						<input class="form-control" type="text" id="email" value="<?php include_once '../php/userData.php'; echo email(); ?>" disabled="true">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">About Me:</label>
					<div class="col-md-8">
						<input class="form-control edit-user-about-me" type="text" id="about_me" value="<?php include_once '../php/userData.php'; echo aboutMe(); ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-8">
						<input type="button" class="btn btn-secondary" value="Save Changes" id="save-edit-button">
						<span></span>
						<input type="button" class="btn btn-secondary" value="Change Password" data-toggle="modal" data-target="#changePasswordModal">
					</div>
				</div>
			</form>
			<!-- change password modal -->
			<div id="changePasswordModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" id="change-password-error">Change Password</h4>
						</div>
						<div class="modal-body user-modal">
							<label>Current Password</label>
							<input class="form-control change-password" type="password" placeholder="Enter Current Password" id="current-password" /></br>
							<label>New Password</label>
							<input class="form-control change-password" type="password" placeholder="Enter New Password" id="enter-new-password" /></br>
							<label>Confirm Password</label>
							<input class="form-control change-password" type="password" placeholder="Enter New Password" id="confirm-new-password"/>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-secondary change-password-submit-button" data-dismiss="modal">Submit</button>
						</div>
					</div>
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
						<h4 class="modal-title">Contact <img src="../images/navtitle.png" /></h4>
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
		<h5><span onmouseover="" style="color:#FF0000; cursor:pointer;" data-toggle="modal" data-target="#footerModal" id="footer-contacts">Contact</span> Finding Kita</h5>
	</div>
</body>
</html>
