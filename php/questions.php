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

  if($cmd == 'loadUserQuestions'){
    $response = loadUserQuestions();
    echo json_encode($response);
  }
  elseif($cmd == 'loadProfileQuestions'){
    $response = loadProfileQuestions();
    echo json_encode($response);
  }
  elseif($cmd == 'saveUserQuestions'){
    $options = array();
    $options['Which gender are you?'] = $_POST['Whichgenderareyou?'];
    $options['What is your age?'] = $_POST['Whatisyourage?'];
    $options['What is you favorite movie genre?'] = $_POST['Whatisyourfavoritecolor?'];
    $options['What is you favorite movie genre?'] = $_POST['Whatisyoufavoritemoviegenre?'];
    $options['If your life was a book what genre whould it be?'] = $_POST['Ifyourlifewasabookwhatgenrewhoulditbe?'];
    $options['Planning a night out? What would you want to do?'] = $_POST['Planninganightout?Whatwouldyouwanttodo?'];
    $options['What would be the perfect first date?'] = $_POST['Whatwouldbetheperfectfirstdate?'];
    $options['What would best fit what you like to do in your downtime?'] = $_POST['Whatwouldbestfitwhatyouliketodoinyourdowntime?'];
    $options['You have $500 to spend, what do you do with it?'] = $_POST['Youhave$500tospend,whatdoyoudowithit?'];
    $options['What would be the perfect gift for you?'] = $_POST['Whatwouldbetheperfectgiftforyou?'];
    foreach($options as $key => $option){
      saveUserQuestions($key, $option);
    }
    echo json_encode($options);
  }
  elseif($cmd == 'saveProfileQuestions'){

  }

  function loadUserQuestions(){
    global $mysqli;
    $response = array();
    $type = "user";
    $query = 'SELECT * FROM questions WHERE type = ?';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('s', $type);
    $stmt->execute();
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc()){
      $answer = loadAnswers($row, "user_answers");
      $response[] = $row;
      $response[] = $answer;
    }
    $stmt->close();
    return $response;
  }

  function loadProfileQuestions(){
    global $mysqli;
    $response = array();
    $type = "profile";
    $query = 'SELECT * FROM questions WHERE type = ?';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('s', $type);
    $stmt->execute();
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc()){
      $answer = loadAnswers($row, "profile_answers");
      $response[] = $row;
      $response[] = $answer;
    }
    $stmt->close();
    return $response;
  }

  function loadAnswers($array, $answerTable){
    global $mysqli;
    $response = array();
    $query = "SELECT * FROM " . $answerTable . " WHERE question_id = ?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('s', $array['question_id']);
    $stmt->execute();
    $res = $stmt->get_result();
    while($row = $res->fetch_assoc()){
      $response[] = $row;
    }
    $stmt->close();

    $answers = "<option></option>";
    foreach($response as $answer){
      $answers .= "<option name=\"" . $array['question'] . "\">" . $answer['listed_answer'] . "</option>";
    }
    return $answers;
  }

  // this should update the table if user changes their answer
  function saveUserQuestions($key, $option){
    global $mysqli;
    $response = array();
    $user = $_SESSION['user'][0]['user_id'];
    $q_id = getQuestionID($key);
    $a_id = getAnswerID($option);
    $query = 'REPLACE INTO user_questions(user_id, questions_id, answers_id, points) VALUES(?, ?, ?, 1)';
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('ddd', $user, $q_id, $a_id);
    $stmt->execute();
    $res = $stmt->get_result();
    $stmt->close();
  }

  function getQuestionID($question){
    global $mysqli;
    $response = "";
    $query = "SELECT question_id FROM questions WHERE question = ?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('d', $question);
    $stmt->execute();
    $res = $stmt->get_result();
    $response = $res->fetch_assoc();
    return $response;
  }

  function getAnswerID($answer){
    global $mysqli;
    $response = "";
    $query = "SELECT answers_id FROM user_answers WHERE listed_answer = ?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query) or die(mysqli_error($mysqli));
    $stmt->bind_param('d', $answer);
    $stmt->execute();
    $res = $stmt->get_result();
    $response = $res->fetch_assoc();
    return $response;
  }
  $mysqli->close();
?>
