<?php
  if(isset($_GET['sendMessage'])){
    sendMessage();
  }

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');

  function sendMessage(){
    require_once "functions.php";

    $name = getValue('name');
    $email = getValue('email');
    $subject = getValue('subject');
    $message = getValue('message');

    echo json_encode($name);
  }
?>
