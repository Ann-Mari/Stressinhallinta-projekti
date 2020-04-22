<?php

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  $fiilis = array("foo", "bar", "hello", "world");
  echo(json_encode($fiilis));
 
?>
