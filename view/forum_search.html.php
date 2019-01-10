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
		<a class="navbar-brand" href="index.html.php"><img src="../images/navtitle.png" /></a>
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
				<h1>Search Results</h1>
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
		<!-- Place add here
		<div>
		</div>
		-->
	</div>
	<!-- footer -->
	<div class="footer">
		<h5><a href="#" id="footer-contacts">Contact</a> Finding Kita</h5>
	</div>
</body>
</html>
