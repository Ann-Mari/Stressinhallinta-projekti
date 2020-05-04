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

//Hetaan käyttäjän tilastoja
$data2['personalID'] = $currentpersonalID;
$sql = "SELECT unenLaatu FROM Paivan_Fiilis WHERE personalID = :personalID";
$kysely = $DBH->prepare($sql);
$kysely->execute($data2);

$paivat = array("Päivä 1","Päivä 2","Päivä 3","Päivä 4","Päivä 5","Päivä 6","Päivä 7");
$paivanUl = array();


while ($row=$kysely->fetch()){
    $paivanUl[] = $row["unenLaatu"];

}

$PUlaatu = array( 
    "x" => $paivat,
    "y" => $paivanUl,
    "type" => "scatter",
    "name" => 'Unen laatu'  
);
echo(json_encode($PUlaatu));

?>