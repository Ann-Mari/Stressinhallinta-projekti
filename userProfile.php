<?php
include("config/config.php");
include("config/https.php");
?>
<?php
include("includes/iheader.php")
?>


<p>Tämä on sinun oma profiilisi</p>
<main>
<?php
//etsittiin netistä hyvä geneerinen profiilikuva placeholderiksi
?>
<img id="profiiliKuva" src="https://cdn0.iconfinder.com/data/icons/set-ui-app-android/32/8-512.png" alt="Profiilikuva"></img>
<fieldset><legend>Profiili</legend>
<?php
//kopioitiin fcreateaccount.php profiilin lomakkeen pohjaksi, sitä voi ruveta siitä sitten muuttamaan,
//hakemaan tietokannasta annetut arvot ja antaa käyttäjän muuttaa haluamiaan arvoja.
?>
<form method="post">
<p>Etunimi
  <br /> <input type="text" name="givenFirstname" placeholder="vähintään neljä kirjainta" maxlength="40"/>
  </p><p>
   Sukunimi
  <br/><input type="text" name="givenLastname" placeholder="vähintään neljä kirjainta" maxlength="40"/>
  </p><p>
  Kuntotasosi 
  <br />  <input type="text" name="givenFittnes" placeholder="oikea sähköposti" maxlength="40"/>
  </p><p>
  Pituus 
  <br />  <input type="text" name="givenHeight" placeholder="oikea sähköposti" maxlength="40"/>
  </p><p>
  Paino 
  <br />  <input type="text" name="givenWeight" placeholder="oikea sähköposti" maxlength="40"/>
  </p><p>
   Sähköposti 
  <br />  <input type="text" name="givenEmail" placeholder="oikea sähköposti" maxlength="40"/>
  </p><p>
   Salasana 
  <br />  <input type="password" name="givenPassword" placeholder="salasanaan vähintään 8 merkkiä" maxlength="40"/>
  </p><p>
   Salasanan vahvistaminen
  <br />  <input type="password" name="givenPasswordVerify" placeholder="salasana uudestaan" maxlength="40"/>
  </p><p>
  <br />  <input type="submit" name="submitUser" value="Hyväksy"/>
          <input type="reset"  value="Tyhjennä"/>
  </p>
  </form>
  </fieldset> 
</main>

</body>

</html>



