<?php
  session_start();

  require_once "../functions.php";
  require_once "../db_login.php";
  include_once "querySearch.php";

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');

  $cmd = getValue('cmd');
  if($cmd == 'getItems'){
    $response = querySearch('feature items');
    $response = getItems($response);
    // print_r($response);
    echo json_encode($response);
  }

  function getItems($response){
    $query = array();
    foreach ($response->Items->Item as $item) {
      $title = $item->ItemAttributes->Title;
      if($title == null){
        $title = "";
      }
      $price = $item->ItemAttributes->ListPrice->FormattedPrice;
      if($price == null){
        $price = [""];
      }
      $image = $item->ImageSets->ImageSet->MediumImage->URL;
      if($image == null){
        $image = "";
      }
      $link = $item->DetailPageURL;
      if($link == null){
        $link = "";
      }
      array_push($query, [$title, $price, $image, $link]);
    }
    return $query;
  }
?>
