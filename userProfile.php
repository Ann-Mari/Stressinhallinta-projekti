<?php
include("config/config.php");
include("config/https.php");
?>
<?php
include("includes/iheader.php");
include('./includes/inavindex.php');
?>


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

<div>Tässä voi muuttaa oman profiilin tietoja</div>
<form method="post">
  Kuntotasosi 
  <br />  <input type="text" name="annettuKuntotaso" placeholder="oikea sähköposti" maxlength="40"/>
  </p><p>
  Paino 
  <br />  <input type="text" name="annettuPaino" placeholder="oikea sähköposti" maxlength="40"/>
  </p><p>
  Uusi Salasana 
  <br />  <input type="password" name="uusiSalasana" placeholder="salasanaan vähintään 8 merkkiä" maxlength="40"/>
  </p><p>
  Salasanan vahvistaminen
  <br />  <input type="password" name="uusiSalasanaVahvistus" placeholder="salasana uudestaan" maxlength="40"/>
  </p><p>
  <br />  <input type="submit" name="submitProfile" value="Hyväksy"/>
          <input type="reset"  value="Tyhjennä"/>
  </p>
  </form>
  </fieldset> 

  <?php
if(isset($_POST['submitProfile'])){
//laitetaan päivn fiilikset kantaan
  $data['annettuKuntotaso'] = $_POST['annettuKuntotaso'];
  $data['annettuPaino'] = $_POST['annettuPaino']; 
  if($_POST['uusiSalasana'] != $_POST['uusiSalasanaVahvistus']){
    $_SESSION['swarningInput']="salasana ei vastaa annettua salasanaa";}
  else if($_POST['uusiSalasana'] = $_POST['uusiSalasanaVahvistus']){
    $data['uusiSalasana'] = $_POST['uusiSalasana']; }
 

  $STH = $DBH->prepare("INSERT INTO Päivän_Fiilis (kuntotaso, paino, salasana) VALUES (:annettuKuntotaso, :annettuPaino, :uusiSalasana);");
  $STH->execute($data);
  //header("Location: index.php"); //Palataan pääsivulle kirjautuneena     
}
  ?>
</main>

</body>

</html>



