<?php
include("config/config.php");
include("config/https.php");
?>

<!DOCTYPE html>
<html>

<body>
<?php
//haettu pohja minun tekemästä lab4:sta
//halutaan muuttaa käymään läpi harjoituslista ja hakee sieltä kaikki jooga treenit, 
//laitetaan jokainen palautus omaan diviin, johon tulee youtubevideo
$tuoteID=2;
$kysely3 = $DBH->prepare("SELECT vk_tuotteet.nimi, vk_tuotteet.tuotekoodi FROM vk_tuotteet WHERE vk_tuotteet.tID = :haluttuID");

$kysely3->bindParam(':haluttuID', $tuoteID);
$kysely3->execute();
$kysely3->setFetchMode(PDO::FETCH_OBJ);
$ekaTulosOlio = $kysely3->fetch();   

//Tuloksena on nyt vain vain yksi rivi (vain yksi tuote  tID:llä 2)

echo ("<br>3. Haluttu tID = $tuoteID : " . $ekaTulosOlio->nimi .", tuotekoodi  " . $ekaTulosOlio->tuotekoodi );

?>


</body>
</html>
