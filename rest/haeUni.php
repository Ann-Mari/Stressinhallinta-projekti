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

$paivat = array(1,2,3,4,5,6,7);
$paivanUn = array();


while ($row=$kysely->fetch()){
    $paivanUn[] = $row["uni"];

}

$Puni = array( 
    "x" => $paivat,
    "y" => $paivanUn,
    "type" => "bar",
    "name" => 'Unen määrä'  
);
echo(json_encode($Puni));

?>