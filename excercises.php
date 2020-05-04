
<?php
include('./includes/iheader.php');
include('./includes/inavindex.php');

?>

<?php

?>
<br>
<br>
<br>
<div class="one-half column" style="margin-left: 10%">
<div class="excercises"><fieldset><legend>Mitkä harjoitukset haluat nähdä?</legend>
<button type="button" id="btnKaikki">Näytä Kaikki</button>
<button type="button" id="btnJooga">Näytä jooga-harjoitukset</button>
<button type="button" id="btnMeditaatio">Näytä meditaatio-harjoitukset</button>
</fieldset>

<fieldset><legend id="legText"></legend>
<p>
  <div id ="ajaxText">
  </div>
</p>
</fieldset>



</div>
</div>
<script src="harjoitukset/harjoitus.js"></script>
<?php
include("includes/ifooter.php");
?>