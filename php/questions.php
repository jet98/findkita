<?php
  require_once "functions.php";
  require_once "db_login.php";

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  $mysqli = new mysqli($db_hostname,$db_username,$db_password,$db_database);
  if ($mysqli->connect_error)
  {
    die("Connection failed: " . $mysqli->connect_error);
  }

  $cmd = getValue('cmd');

  if($cmd == 'loadUserQuestions'){
    $response = loadUserQuestions();
    echo json_encode($response);
  }
  elseif($cmd == 'loadProfileQuestions'){
    $response = loadProfileQuestions();
    echo json_encode($response);
  }

  function loadUserQuestions($questionTable, $answerTable, $type){
    $response = array();
    $query = "SELECT * FROM " . $questionTable . " WHERE type = ?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('s', $type);
    $stmt->execute();
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc()){
      $response[] = $row;
    }
    $stmt->close();
  }
  //
  // function loadProfileQuestions($questionTable, $answerTable, $type){
  //   $response = array();
  //   $query = "SELECT * FROM " . $questionTable . " WHERE type = ?";
  //   $stmt = $mysqli->stmt_init();
  //   $stmt->prepare($query) or die(mysqli_error($mysqli));
  //   $stmt->bind_param('s', $type);
  //   $stmt->execute();
  //   $res = $stmt->get_result();
  //   while($row = $res->fetch_assoc()){
  //     $response[] = $row;
  //   }
  //   $stmt->close();
  // }

  function loadAnswers($mysqli, $question, $answerTable){
    $response = array();
    $query = "SELECT * FROM " . $answerTable . " WHERE question_id = ?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('s', $question['question_id']);
    $stmt->execute();
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc()){
      $response[] = $row;
    }
    $stmt->close();

    $answers[] = "<option></option>";
    foreach($response as $answer){
      $answers[] = "<option>" . $answer['listed_answer'] . "</option>";
    }
    return $answers;
  }
  $mysqli->close();
?>
