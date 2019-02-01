<?php
  session_start();

  require_once "functions.php";
  require_once "db_login.php";

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
  if($cmd == 'deletePost'){
    $date = getValue('date');
    $post = getValue('post');
    $response = deletePost($date, $post);
    echo json_encode($response);
  }
  elseif($cmd = 'deleteThread'){
    $replies = getValue('replies');
    $title = getValue('title');
    $response = deleteThread($replies, $title);
    echo json_encode($response);
  }

  function deletePost($date, $post){
    $response = false;

    global $mysqli;
    // Delete post
    $query = 'DELETE FROM forum_posts WHERE post_date = ? AND post = ? LIMIT 1';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('ss', $date, $post);
    $stmt->execute();
    $res = $stmt->get_result();
    $stmt->close();

    // Check to see if post was deleted
    $query = mysqli_query($mysqli, 'SELECT * FROM forum_posts WHERE post_date = "$date" AND post = "$post"');
    if($query->num_rows == 0){
      $response = true;
    }

    return $response;
  }

  function deleteThread($replies, $title){
    $response = false;

    global $mysqli;
    // Delete thread
    $query = 'DELETE FROM forum_thread WHERE replies = ? AND thread_title = ? LIMIT 1';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('ss', $replies, $title);
    $stmt->execute();
    $res = $stmt->get_result();
    $stmt->close();

    // Check to see if thread was deleted
    $query = mysqli_query($mysqli, 'SELECT * FROM forum_thread WHERE replies = "$replies" AND thread_title = "$post"');
    if($query->num_rows == 0){
      $response = true;
    }

    return $response;
  }
  $mysqli->close();
?>
