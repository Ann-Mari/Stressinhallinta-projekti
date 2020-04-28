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


 while ($row=$kysely->fetch()){
    $paivanFi[] = $row["paivanFiilis"];
    //$paivanKo[] = $row["kofeiini"].
   //$paivanAl[] = $row["alkoholi"].
    //$paivanUn[] =$row["uni"].
    // $paivanUl[] = $row["unenLaatu"]
  }

//if($_GET['paivat']==7)
  $fiilis = array( 
    "x" => $paivat,
    "y" => $paivanFi,
    "type" => "scatter",
    "name" => 'Päivän fiilis'  
  ); 
  echo(json_encode($fiilis));

?>
