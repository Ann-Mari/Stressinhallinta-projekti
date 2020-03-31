
<?php

include('includes/iheader.php');

?>

<button type="button" id="btnKaikki" >Näytä Kaikki</button>
<button type="button" id="btnJooga">Näytä jooga-harjoitukset</button>
<button type="button" id="btnMeditaatio">Näytä meditaatio-harjoitukset</button>
<?php
include_once("harjoitukset/functions.php");
?>

<?php
 $liikunta = rand(1,7);
 $txtOhje = trainingText($liikunta);

 $fileA="<iframe width='560' height='315' src='https://www.youtube.com/embed/$liikunta' frameborder='0' allowfullscreen></iframe>";

?>
<?php

echo "linkin loppu $txtOhje"

?>
</br>

<?php echo ("$fileA");?>


</body>
</html>
