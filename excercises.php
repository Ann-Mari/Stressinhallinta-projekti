<?php
include("config/config.php");
include("config/https.php");
?>

<!DOCTYPE html>
<html>

<body>
<button type="button" id="btnKaikki">Näytä Kaikki</button>
<button type="button" id="btnJooga">Näytä jooga-harjoitukset</button>
<button type="button" id="btnMeditaatio">Näytä meditaatio-harjoitukset</button>


<script>
     const element2 = document.querySelector('#btnKaikki');
  element2.addEventListener('click',  (evt) => {
   fetch('kaikkiHarjoitukset.php')
    .then((response) => {
      return response.json();
    })
    .then((data) => { 
          console.log(data);
          document.getElementById("ajaxText").innerHTML = data;
          document.getElementById("legText").innerHTML = "2. Sample Pulse: pulseSample.php";
    });
  });
</script>
</body>
</html>
