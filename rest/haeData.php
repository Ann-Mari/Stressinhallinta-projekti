<?php
session_start();

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
 //Tietojen haku tietokannasta

 $data1['email'] = $_SESSION['semail'];
 $sql1 = "SELECT personalID FROM userRegister where userEmail  =  :email";
 $kysely1=$DBH->prepare($sql1);
 $kysely1->execute($data1);
 $tulos1=$kysely1->fetch();
 $currentpersonalID=$tulos1[0];


$data2['personalID'] = $currentpersonalID;
$sql = "SELECT paivanFiilis, kofeiini, alkoholi, uni, unenLaatu FROM Paivan_Fiilis WHERE personalID = :personalID";
$kysely = $DBH->prepare($sql);
$kysely->execute($data2);


  $paivat = array("Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai");
  $paivanAr = array();
  while ($row=$kysely->fetch()){
    $paivanAr[] = $row["paivanFiilis"];
  }
//if($_GET['paivat']==7)
  $fiilis = array( 
    "x" => $paivat,
    "y" => $paivanAr,
    "type" => "scatter",
    "name" => 'Päivän fiilis'  
  ); 
  echo(json_encode($fiilis));

?>
