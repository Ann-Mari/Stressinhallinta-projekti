
<?php

include('includes/iheader.php');
include('./includes/inavindex.php');

?>

<body>
  
<br>
<br>
<br>
<button type="button" id="btnKaikki" onclick="nextImage()">Näytä Kaikki</button>
<button type="button" id="btnJooga">Näytä jooga-harjoitukset</button>
<button type="button" id="btnMeditaatio">Näytä meditaatio-harjoitukset</button>
<?php
include_once("harjoitukset/functions.php");
?>
<?php
 $liikunta = rand(1,4);
 $txtOhje = trainingText($liikunta);

 $fileA="harjoitukset/kuvat/treeni$liikunta.jpg";

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
    <img class=mini src=" <?php echo("harjoitukset/kuvat/treeni$i.jpg");?>"/>
    <?php
}
?>


</body>
</html>
