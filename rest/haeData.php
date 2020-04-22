<?php
session_start();

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
 //Tietojen haku tietokannasta

  $paivat = array("Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai");
  $paivanF = array(5,8,9,6,5,4,4);
//if($_GET['paivat']==7)
  $fiilis = array( 
    "x" => $paivat,
    "y" => $paivanF,
    "type" => "scatter",
    "name" => 'Päivän fiilis'  
  );
  echo(json_encode($fiilis));
 
?>
