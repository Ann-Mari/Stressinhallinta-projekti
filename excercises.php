<?php
include("config/config.php");
include("config/https.php");
?>

<!DOCTYPE html>
<html>

<body>
<?php
//haettu pohja minun tekemästä lab4:sta
//Kaikki treeenit SELECT * FROM harjoitukset
//Jooga SELECT * FROM harjoitukset WHERE harjoitusKoodi = 1
//Meditaatio SELECT * FROM harjoitukset WHERE harjoitusKoodi = 2
//halutaan muuttaa käymään läpi harjoituslista ja hakee sieltä kaikki jooga treenit, 
//laitetaan jokainen palautus omaan diviin, johon tulee youtubevideo
$tuoteID=2;
$kyselyTreeni = $DBH->prepare("SELECT vk_tuotteet.nimi, vk_tuotteet.tuotekoodi FROM vk_tuotteet WHERE vk_tuotteet.tID = :haluttuID");

$kyselyTreeni->bindParam(':haluttuID', $tuoteID);
$kyselyTreeni->execute();
$kyselyTreeni->setFetchMode(PDO::FETCH_OBJ);
$ekaTulosOlio = $kyselyTreeni->fetch();   

//Tuloksena on nyt vain vain yksi rivi (vain yksi tuote  tID:llä 2)

echo ("<br>Treeni. Haluttu tID = $tuoteID : " . $ekaTulosOlio->nimi .", tuotekoodi  " . $ekaTulosOlio->tuotekoodi );

?>


</body>
</html>
