<?php
  function loadUserQuestions($questionTable, $answerTable, $type){
    require_once "functions.php";
    require_once "db_login.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $mysqli = new mysqli($db_hostname,$db_username,$db_password,$db_database);
    if ($mysqli->connect_error)
    {
      die("Connection failed: " . $mysqli->connect_error);
    }

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

    foreach($response as $question){
      $answer = loadAnswers($mysqli, $question, $answerTable);
      echo "<div class=\"form-group\">
        <label class=\"col-md-3 control-label\">" . $question['question'] . "</label>
        <div class=\"col-md-8 select_option\">
          <div class=\"ui-select\">
            <select class=\"form-control\">" . serialize($answer) .
            "</select>
          </div>
        </div>
      </div>";
    }
    $mysqli->close();
  }

  function loadProfileQuestions($questionTable, $answerTable, $type){
    require_once "functions.php";
    require_once "db_login.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $mysqli = new mysqli($db_hostname,$db_username,$db_password,$db_database);
    if ($mysqli->connect_error)
    {
      die("Connection failed: " . $mysqli->connect_error);
    }

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

    foreach($response as $question){
      $answer = loadAnswers($mysqli, $question, $answerTable);
      echo "<div class=\"form-group\">
        <label class=\"col-md-3 control-label\">" . $question['question'] . "</label>
        <div class=\"col-md-8 select_option\">
          <div class=\"ui-select\">
            <select class=\"form-control\">" . serialize($answer) .
            "</select>
          </div>
        </div>
      </div>";
    }
    $mysqli->close();
  }

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
?>
