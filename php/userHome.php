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
  if($cmd == 'deleteProfile'){
    $username = $_SESSION['user'][0]['username'];
    $password = $_SESSION['user'][0]['password'];
    $response = deleteProfile($username, $password);
    echo json_encode($response);
  }
  elseif($cmd == 'aboutMe'){
    $username = $_SESSION['user'][0]['username'];
    $password = $_SESSION['user'][0]['password'];
    $response = aboutMe($username, $password);
    echo json_encode($response);
  }

  function deleteProfile($username, $password){
    $response = array();
    global $mysqli;
    $query = 'UPDATE users SET removed = 1 WHERE username = ? AND password = ?';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();
    $stmt->close();
    setSessionValue('user', array());
    return true;
  }

  function aboutMe($username, $password){
    global $mysqli;
    $query = 'SELECT about_me FROM users WHERE username = ? AND password = ?';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();
    $response = $res->fetch_assoc();
    $stmt->close();
    return $response;
  }

  $mysqli->close();
?>
