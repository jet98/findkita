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
  if($cmd == 'saveEditProfile'){
    $username = $_SESSION['user'][0]['username'];
    $password = $_SESSION['user'][0]['password'];
    $aboutMe = getValue('about_me');
    $response = saveEditProfile($username, $password, $aboutMe);
    echo json_encode($response);
  }
  elseif($cmd == 'changePassword'){
    $username = $_SESSION['user'][0]['username'];
    $password = $_SESSION['user'][0]['password'];
    $newPassword = getValue('password');
    $confirmPassword = getValue('confirmPassword');
    $resposne = changePassword($username, $password, $newPassword, $confirmPassword);
    echo json_encode($resposne);
  }

  function saveEditProfile($username, $password, $aboutMe){
    global $mysqli;
    $response = array();
    $query = 'UPDATE users SET about_me = ? WHERE username = ? AND password = ?';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('sss', $aboutMe, $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();
    $stmt->close();
    $_SESSION['user'][0]['about_me'] = $aboutMe;
    return $aboutMe;
  }

  function changePassword($username, $password, $newPassword, $confirmPassword){
    global $mysqli;
    if($newPassword == $confirmPassword){
      $query = 'UPDATE users SET password = ? WHERE username = ? AND password = ?';
      $stmt = $mysqli->stmt_init();
      $stmt->prepare($query) or die(mysqli_error($mysqli));
      $stmt->bind_param('sss', $newPassword, $username, $password);
      $stmt->execute();
      $res = $stmt->get_result();
      $stmt->close();
      $response = $_SESSION['user'][0]['password'];
      $_SESSION['user'][0]['password'] = $newPassword;
    }
    else{
      $response = $_SESSION['user'][0]['password'];
    }
    return $response;
  }

  $mysqli->close();
?>
