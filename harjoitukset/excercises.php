<?php
include("config/config.php");
include("config/https.php");
?>

<?php
include("includes/iheader.php");

?>

<button type="button" id="btnKaikki" onclick="nextImage()">Näytä Kaikki</button>
<button type="button" id="btnJooga">Näytä jooga-harjoitukset</button>
<button type="button" id="btnMeditaatio">Näytä meditaatio-harjoitukset</button>
<?php
include_once("functions.php");
?>
<?php
 $liikunta = rand(1,4);
 $txtOhje = trainingText($liikunta);

 $fileA="kuvat/treeni$liikunta.jpg";

?>
<?php

echo "Treeniohjeet : Tänään sinun tulee $txtOhje"

?>
</br>

<img class=main src=" <?php echo ("$fileA");?>"/>

</br>
<button onClick="history.go();"> REfresh Page</button>
</br>


<?php
  for ($i=1; $i<=7; $i++){
    ?>
    <img class=mini src=" <?php echo("kuvat/treeni$i.jpg");?>"/>
    <?php
}
?>


</body>
</html>
