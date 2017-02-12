<?php
  session_start();

  require_once "../functions.php";
  require_once "../db_login.php";

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');

  $mysqli = new mysqli($db_hostname,$db_username,$db_password,$db_database);
  if ($mysqli->connect_error)
  {
    die("Connection failed: " . $mysqli->connect_error);
  }

  $cmd = getValue('cmd');

  if ($cmd == 'loadPosts')
  {
    $thread = getValue('threadTitle');
    $response = loadPosts($thread);
    echo json_encode($response);
  }

  function loadPosts($thread) {
    global $mysqli;
    $response = array();
    $query = 'SELECT forum_posts.post, forum_posts.post_date, users.f_name, avatar.avatar_link  FROM forum_posts INNER JOIN forum_thread ft ON ft.thread_id = forum_posts.parent_id INNER JOIN users ON users.user_id = forum_posts.user_id INNER JOIN avatar ON avatar.avatar_id = forum_posts.avatar_id WHERE ft.thread_title = ?';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('s', $thread);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc())
    {
      $response[] = $row;
    }
    $stmt->close();

    return $response;
  }

  $mysqli->close();
?>
