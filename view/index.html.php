<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/png" href="../images/fav.png"/>
	<title>Project Location North</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/forum.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/tabletools/2.2.1/css/dataTables.tableTools.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<script type="text/javascript" src="../js/forum/forum_home.js"></script>
	<script type="text/javascript" src="../js/forum/forum_thread.js"></script>
  <script type="text/javascript" src="../js/forum/forum_post.js"></script>
	<script type="text/javascript" src="../js/forum/forum_buttons.js"></script>
</head>
<body>
	<!-- top nav bar -->
	<div class="navbar navbar-full" id="header">
		<a class="navbar-brand" href="index.html.php"><img src="../images/navtitle.png" /></a>
		<ul class="nav navbar-nav">
			<li class="nav-item active" id="user-home-link">
				<a class="nav-link" href="user_home.html.php">User Home</a>
			</li>
			<!-- <li class="nav-item active">
				<a class="nav-link" href="gift_finder.html.php">Gift Finder</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="forum_home.html.php">Community</a>
			</li> -->
		</ul>
		<form class="form-inline pull-xs-right" id="search_div">
			<input class="form-control" id="search" type="text" placeholder="Search">
			<button class="btn btn-secondary search" type="button">Search</button>
		</form>
		<div class="navbar-left" id="home-logout-button">
			<button class="btn btn-secondary" type="button">Logout</button>
		</div>
		<!-- login/register buttons -->
		<div class="text-center" id="home-login-buttons">
			<h4 class="login_error"></h4>
			<button class="btn btn-secondary login-btn" type="button" data-toggle="modal" data-target="#loginModal">Login</button>
			<button class="btn btn-secondary register-btn" type="button" data-toggle="modal" data-target="#registerModal">Register</button>
		</div>
	</div>
	<!-- Register Modal -->
	<div id="registerModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Register Account</h4>
				</div>
				<form>
					<div class="modal-body user-modal">
						<label>First Name</label>
						<input class="form-control firstname" type="text" placeholder="Enter First Name" /></br>
						<label>Last Name</label>
						<input class="form-control lastname" type="text" placeholder="Enter Last Name" /></br>
						<label>Username</label>
						<input class="form-control new-username" type="text" placeholder="Enter Username" /></br>
						<label>Email</label>
						<input class="form-control email" type="text" placeholder="Enter Email" /></br>
						<label>Password</label>
						<input class="form-control new-password" type="password" placeholder="Enter Password" /></br>
						<label>Confirm Password</label>
						<input class="form-control confirm-password" type="password" placeholder="confirm Password" />
					</div>
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-secondary register-submit-button" type="submit" data-dismiss="modal">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Login Modal -->
	<div id="loginModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Login Account</h4>
				</div>
				<div class="modal-body user-modal">
					<label>Username</label>
					<input class="form-control username" type="text" placeholder="Enter Username" /></br>
					<label>Password</label>
					<input class="form-control password" type="password" placeholder="Enter Password" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-secondary login-submit-button" data-dismiss="modal">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<!-- main body -->
	<div class="container" id="main_body">
		<!-- topics list -->
		<div class="container forum-topics">
			<div class="container">
				<h1>Share Your Ideas</h1>
				<h4>If you're having trouble finding the perfect gift, be part of the community and let others help you, or give advice and find what you need.</h4>
			</div>
			<div id="nav-forum">
				<span onmouseover="" id="nav-forum-text"></span>
			</div>
			<table class="table" id="forum-topic-table">
				<thead id="forum-topic-head">
				</thead>
				<tbody id="forum_topic_body">
				</tbody>
			</table>
		</div>
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
