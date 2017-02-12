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

  if ($cmd == 'loadThread')
  {
    $topic = getValue('topicTitle');
    $response = loadThread($topic);
    setSessionValue('topic', $topic);
    echo json_encode($response);
  }
  elseif($cmd == 'createThread') {
    $title = getValue('title');
    $post = getValue('post');
    addThread($title, $post);
    echo json_encode($title);
  }

  function loadThread($topic) {
    global $mysqli;
    $response = array();
    $query = 'SELECT forum_thread.*, users.f_name FROM forum_thread INNER JOIN forum_topics ft ON ft.topic_id = forum_Thread.parent_id INNER JOIN users ON users.user_id = forum_thread.user_id WHERE ft.topic = ?';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('s', $topic);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc())
    {
      $response[] = $row;
    }
    $stmt->close();

    return $response;
  }

  function addThread($title, $post){
    global $mysqli;
    $user = $_SESSION['user'][0]['user_id'];
    $topic = $_SESSION['topic'];
    $avatar = $_SESSION['avatar']['avatar_id'];
    $query = 'INSERT INTO forum_thread(thread, post_date, parent_id, user_id, thread_title) VALUES(?, NOW(), (SELECT topic_id FROM forum_topics WHERE topic = ?), ?, ?)';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('ssss', $post, $topic, $user, $title);
    $stmt->execute();
    $res = $stmt->get_result();

    $query = 'INSERT INTO forum_posts(parent_id, user_id, avatar_id, post, post_date) VALUES((SELECT topic_id FROM forum_topics WHERE topic = ?), ?, ?, ?, NOW())';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('ssss', $topic, $user, $avatar, $post);
    $stmt->execute();
    $res = $stmt->get_result();
    $stmt->close();
  }
  $mysqli->close();
?>
