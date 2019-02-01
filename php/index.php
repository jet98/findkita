<?php
  session_start();

  require_once "functions.php";
  require_once "db_login.php";
  include_once "setAvatar.php";
  include_once "search.php";

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');

  $mysqli = new mysqli($db_hostname,$db_username,$db_password,$db_database);
  if ($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
  }

  $cmd = getValue('cmd');

  if ($cmd == 'loginUser'){
    $username = getValue('username');
    $password = getValue('password');
    $response = loginUser($username, $password);
    echo json_encode($response);
  }
  elseif ($cmd == 'registerUser') {
    $firstname = getValue('firstname');
    $lastname = getValue('lastname');
    $username = getValue('username');
    $email = getValue('email');
    $password = getValue('password');
    $password = md5($password);
    $response = registerUser($firstname, $lastname, $username, $email, $password);
    echo json_encode($response);
  }
  elseif($cmd == 'currentSession'){
    $currentSession = getSessionValue('user', array());
    echo json_encode($currentSession);
  }
  elseif($cmd == 'logoutUser'){
    setSessionValue('user', array());
    echo json_encode("logout successfully");
  }
  elseif($cmd == 'searchResults'){
    $searchTerm = getValue('keyword');
    $searchResults = getSearchResults($searchTerm);
    echo json_encode($searchResults);
  }

  function loginUser($username, $password) {
    $response = array();
    global $mysqli;
    $query = 'SELECT * FROM users WHERE username = ? AND password = ?';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()){
      $response[] = $row;
    }
    $stmt->close();
    setSessionValue('user', $response);
    setAvatarSession();
    return $response;
  }

  function registerUser($firstname, $lastname, $username, $email, $password){
    $rtn = false;

    global $mysqli;
    $query = mysqli_query($mysqli, 'SELECT username FROM users WHERE username = "$username"');
    if($query->num_rows == 0){
      $query = 'INSERT INTO users(f_name, l_name, username, email, password) VALUES(?, ?, ?, ?, ?)';
      $stmt = $mysqli->stmt_init();
      $stmt->prepare($query) or die(mysqli_error($mysqli));
      $stmt->bind_param('sssss', $firstname, $lastname, $username, $email, $password);
      $stmt->execute();
      $res = $stmt->get_result();
      $stmt->close();
    }

    // Check if user was Created
    $query = mysqli_query($mysqli, 'SELECT * FROM users WHERE username = "$username" AND email = "$email"');
    if($query->num_rows == 1){
      $login = loginUser($username, $password);
      $rtn = true;
    }

    return $rtn;
  }

  function getSearchResults($searchTerm){
    $searchTerm = "%".$searchTerm."%";
    $response = array();

    global $mysqli;
    $query = 'SELECT * FROM forum_topics AS f, forum_thread AS ft, forum_posts AS fp WHERE (ft.thread_title LIKE ? OR fp.post LIKE ?) AND f.topic_id = ft.parent_id';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()){
      $response[] = $row;
    }
    $stmt->close();
    return $response;
  }
  $mysqli->close();
?>
