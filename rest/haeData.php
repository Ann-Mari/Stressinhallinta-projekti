<?php
session_start();

include("../config/config.php");

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
$paivanFi = array();
$paivanKo = array();
$paivanAl = array();
$paivanUn = array();
$paivanUl = array();



 while ($row=$kysely->fetch()){
    $paivanFi[] = $row["paivanFiilis"].
    $paivanKo[] = $row["kofeiini"].
    $paivanAl[] = $row["alkoholi"].
    $paivanUn[] =$row["uni"].
    $paivanUl[] = $row["unenLaatu"];
  }

  var_dump($paivanKo);

//if($_GET['paivat']==7)
  $fiilis = array( 
    "x" => $paivat,
    "y" => $paivanFi,
    "type" => "scatter",
    "name" => 'Päivän fiilis'  
  ); 
  echo(json_encode($fiilis));

  $Pkofeiini = array( 
    "x" => $paivat,
    "y" => $paivanKo,
    "type" => "scatter",
    "name" => 'Kahvin määrä'  
  ); 
  echo(json_encode($Pkofeiini));

  $Palkoholi = array( 
    "x" => $paivat,
    "y" => $paivanAl,
    "type" => "scatter",
    "name" => 'Alkoholin määrä'  
  ); 
  echo(json_encode($Palkoholi));


  $Puni = array( 
    "x" => $paivat,
    "y" => $paivanUn,
    "type" => "bar",
    "name" => 'Unen määrä'  
  ); 
  echo(json_encode($Puni));
  

  $Ulaatu = array( 
    "x" => $paivat,
    "y" => $paivanUl,
    "type" => "scatter",
    "name" => 'Unen laatu'  
  ); 
  echo(json_encode($Ulaatu));

?>
