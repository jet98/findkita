<?php
function setAvatarSession(){
  global $mysqli;
  $response = array();
  $query = 'SELECT * FROM avatar WHERE avatar_id = ?';
  $stmt = $mysqli->stmt_init();
  $stmt->prepare($query) or die(mysqli_error($mysqli));
  $stmt->bind_param('s', $_SESSION['user'][0]['avatar_id']);
  $stmt->execute();
  $res = $stmt->get_result();
  while($row = $res->fetch_assoc()){
    $response = $row;
  }
  setSessionValue('avatar', $response);
  $stmt->close();
}
?>
