<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/png" href="../images/fav.png"/>
	<title>Project Location North</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/forum.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<script type="text/javascript" src="../js/forum/forum_home.js"></script>
	<script type="text/javascript" src="../js/forum/forum_buttons.js"></script>
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
		<!-- create thread modal -->
		<div id="createThread" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Create Thread</h4>
					</div>
					<div class="modal-body user-modal">
						<label>Title</label>
						<input class="form-control" type="text" id="create_thread_title" placeholder="Enter Title" /></br>
						<label>Post</label>
						<textarea class="form-control" rows="3" id="create_thread_post" placeholder="Enter Post"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-secondary create-thread-submit-button" data-dismiss="modal">Submit</button>
					</div>
				</div>
			</div>
		</div>
		<!-- reply post modal -->
		<div id="replyPost" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Reply</h4>
					</div>
					<div class="modal-body user-modal">
						<div id="quote">
							<label>Quote</label>
							<p id="quote-post-content"></p>
						</div>
						<label>Post</label>
						<textarea class="form-control" rows="5" id="reply-post-content" placeholder="Enter Post"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-secondary reply-post-submit-button" data-dismiss="modal">Submit</button>
					</div>
				</div>
			</div>
		</div>
		<!-- topics list -->
		<div class="container forum-topics">
			<div class="container">
				<h1>Share Your Ideas</h1>
				<h4>If you're having trouble finding the perfect gift, be part of the community and let others help you, or give advice, and find what you need.</h4>
			</div>
			<div class="create-thread-button">
				<button class="btn btn-secondary" data-toggle="modal" data-target="#createThread" type="submit">Create Thread</button>
			</div>
			<div id="nav-forum">
				<span onmouseover="" id="nav-forum-text"></span>
			</div>
			<table class="table well" id="forum-topic-table">
				<thead id="forum-topic-head">
				</thead>
				<tbody id="forum_topic_body">
				</tbody>
			</table>
		</div>
	</div>
	<!-- div results from search -->
	<div class="container" id="search_results_body">
		<!-- seperate list by API -->
		<div class="container" id="shopping_list">
			<table class="table" id="full_width">
				<thead>
					<tr>
						<th>Shop List</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td id="amazon">Amazon</td>
					</tr>
					<!-- <tr>
						<td>Shop2</td>
					</tr> -->
				</tbody>
			</table>
		</div>
		<!-- list of results -->
		<div class="container well" id="results_list">
		</div>
	</div>
	<!-- footer -->
	<div class="footer">
		<h5><a href="#" id="footer-contacts">Contact</a> Finding Kita</h5>
	</div>
</body>
</html>
