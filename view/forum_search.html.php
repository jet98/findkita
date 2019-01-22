<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/png" href="../images/fav.png"/>
	<title>Gift My Idea</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/forum.css">
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/tabletools/2.2.1/css/dataTables.tableTools.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/keypress/2.1.5/keypress.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
  <script type="text/javascript" src="../js/searchBox.js"></script>
	<script type="text/javascript" src="../js/forum/forum_buttons.js"></script>
</head>
<body>
	<!-- top nav bar -->
	<div class="navbar navbar-full" id="header">
		<a class="navbar-brand" href="index.html.php"><img id="navimage" src="../images/giftmyideaxcf.png" /></a>
		<ul class="nav navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" id="nav_user_home" href="user_home.html.php"><?php include_once '../php/userdata.php'; echo username(); ?></a>
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

		<!-- topics list -->
		<div class="container forum-topics">
			<div class="container">
				<h1 id="search_result_title">Search Results</h1>
			</div>
			<div id="nav-forum">
				<span onmouseover="" id="nav-forum-text"></span>
			</div>
			<table class="table" id="forum-topic-table">
				<thead id="forum_topic_head">
				</thead>
				<tbody id="forum_topic_body">
				</tbody>
			</table>
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
