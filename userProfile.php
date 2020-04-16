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
  <br />  <input type="text" name="annettuKuntotaso" placeholder="esim. hyvä, huono" maxlength="40"/>
  </p><p>
  Paino 
  <br />  <input type="text" name="annettuPaino" placeholder=" " maxlength="40"/>
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

  if(strlen($_POST['annettuKuntotaso'])<4){
    $_SESSION['swarningInput']="liian vähän merkkejä kunto kohdassa (min 4 merkkiä)";
   }else if(($_POST['annettuPaino']>=45) && ($_POST['givenWeight'] >=250)){
   $_SESSION['swarningInput']="Paino ei ole laitettu oikein (paino pitäisi olla 45-250 kg välillä)";
  }else if(strlen($_POST['uusiSalasana'])<8){
    $_SESSION['swarningInput']="Liian vähän merkkejä salasanassa (min 8 merkkiä)";
    }else if($_POST['uusiSalasanaVahvistus'] != $_POST['uusiSalasanaVahvistus']){
    $_SESSION['swarningInput']="Annettu salasana ei ole sama toista kertaa annettaessa";
   }else{
   unset($_SESSION['swarningInput']);
//laitetaan päivn fiilikset kantaan
  $data['annettuKuntotaso'] = $_POST['annettuKuntotaso'];
  $data['annettuPaino'] = $_POST['annettuPaino']; 
  // lähteenä https://phppot.com/php/php-change-password-script/
  if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from userRegister WHERE personalId='" . $_SESSION["personalId"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["givenPassword"] == $row["userPwd"]) {
        mysqli_query($conn, "UPDATE userRegister set userPwd='" . $_POST["uusiSalasana"] . "' WHERE personalId='" . $_SESSION["personalId"] . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
  /*if($_POST['uusiSalasana'] != $_POST['uusiSalasanaVahvistus']){
    $_SESSION['swarningInput']="salasana ei vastaa annettua salasanaa";}
  else if($_POST['uusiSalasana'] = $_POST['uusiSalasanaVahvistus']){
    $data['uusiSalasana'] = $_POST['uusiSalasana']; }*/
 
  $STH = $DBH->prepare("INSERT INTO Personal (userGeneral_condition, userWeight) VALUES (:annettuKuntotaso, :annettuPaino);");
 /* $STH = $DBH->prepare("INSERT INTO userRegister (userPwd) VALUES (:uusiSalasana);");*/
  $STH->execute($data);
  }
}
}
?>

</main>

</body>

</html>



