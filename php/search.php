<?php
  require_once "functions.php";
  require_once "db_login.php";

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');

  $mysqli = new mysqli($db_hostname,$db_username,$db_password,$db_database);
  if ($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
  }

  $mysqli->close();
?>
