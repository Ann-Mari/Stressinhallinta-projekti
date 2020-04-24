
<?php
include("./includes/iheader.php");
include('./includes/inavindex.php');
//Lähteenä Lab6 ja Karin diat. Tietokantaan yhdistämisen lähteenä oli
// https://stackoverflow.com/questions/15510042/changing-a-password-php-mysql/51096636
//https://phpgurukul.com/change-password-php/
//https://www.studentstutorial.com/php/password-change
?>


<main>
<div class="container">
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
  <br />  <input type="submit" name="submitKuPa" value="Vaihda Kunto ja paino"/>
          <input type="submit" name="submitSalasana" value="Vaihda salasana"/>
          <input type="reset"  value="Tyhjennä"/>
  </p>
  </form>
  </fieldset> 

  <?php
   $data1['email'] = $_SESSION['semail'];
   $sql1 = "SELECT personalID FROM userRegister where userEmail =  :email";
   $kysely1=$DBH->prepare($sql1);
   $kysely1->execute($data1);
   $tulos1=$kysely1->fetch();
   $currentpersonalID=$tulos1[0];

if(isset($_POST['submitSalasana'])){

  if(strlen($_POST['uusiSalasana'])<8){
    $_SESSION['swarningInput']="Liian vähän merkkejä salasanassa (min 8 merkkiä)";
    }else if($_POST['uusiSalasana'] != $_POST['uusiSalasanaVahvistus']){
    $_SESSION['swarningInput']="Annettu salasana ei ole sama toista kertaa annettaessa";
   }else{
   unset($_SESSION['swarningInput']);

        $password = $_POST['givenPassword'];
        $newpassword = $_POST['uusiSalasana'];
        $confirmnewpassword = $_POST['uusiSalasanaVahvistus'];
        /*$added='#â‚¬%&&/'; //suolataan annettu salasana
        $newpassword = password_hash($_POST['uusiSalasana'].$added, PASSWORD_BCRYPT);*/
        $sql2=("SELECT userPwd FROM userRegister WHERE personalID='$currentpersonalID'");
        $kysely2=$DBH->prepare($sql2);
        $kysely2->execute();    			
        $tulos2=$kysely2->fetch();
        if(!$tulos2)
        {
        echo "Käyttäjä ei täsmää";
        }
        else if ($password!=$tulos2)
        {
        echo "Väärä salasana";
        }
        if($newpassword==$confirmnewpassword)
        $sql2=("UPDATE userRegister SET userPwd='$newpassword' where personalID='$currentpersonalID'");
        $kysely2=$DBH->prepare($sql2);
        $kysely2->execute();
        if($sql2)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "Passwords do not match";
       }
      
  
   }
  }
  /*$STH = $DBH->prepare("INSERT INTO Personal (userGeneral_condition, userWeight) VALUES (:annettuKuntotaso, :annettuPaino);");
 /* $STH = $DBH->prepare("INSERT INTO userRegister (userPwd) VALUES (:uusiSalasana);");*/
 /* $STH->execute($data);
  }
}

/*if($_POST['uusiSalasana'] != $_POST['uusiSalasanaVahvistus']){
    $_SESSION['swarningInput']="salasana ei vastaa annettua salasanaa";}
  else if($_POST['uusiSalasana'] = $_POST['uusiSalasanaVahvistus']){
    $data['uusiSalasana'] = $_POST['uusiSalasana']; }*/

/*// lähteenä https://phppot.com/php/php-change-password-script/
if (count($_POST) > 0) {
  $result = mysqli_query($conn, "SELECT *from userRegister WHERE personalId='" . $_SESSION["personalId"] . "'");
  $row = mysqli_fetch_array($result);
  if ($_POST["givenPassword"] == $row["userPwd"]) {
      mysqli_query($conn, "UPDATE userRegister set userPwd='" . $_POST["uusiSalasana"] . "' WHERE personalId='" . $_SESSION["personalId"] . "'");
      $message = "Password Changed";
  } else
      $message = "Current Password is not correct";*/

if(isset($_POST['submitKuPa'])){

  if(($_POST['givenHeight']<=150) && ($_POST['givenHeight'] >=2.5)){
    $_SESSION['swarningInput']="Pituus ei ole laitettu oikein (pituus välillä 150-2.5 cm)";
}else if(($_POST['givenWeight']>=45) && ($_POST['givenWeight'] >=250)){
   $_SESSION['swarningInput']="Paino ei ole laitettu oikein (paino pitäisi olla 45-250 kg välillä)";
 }else{
 unset($_SESSION['swarningInput']);

 $kunto = $_POST['annettuKuntotaso'];
 $paino = $_POST['annettuPaino'];
 
 $sql2=("UPDATE Personal SET userGeneral_condition='$kunto', userWeight='$paino' where userpersonalID='$currentpersonalID'");
 $kysely2=$DBH->prepare($sql2);
 $kysely2->execute();

 if($sql2)
 {
 echo "Kuntotasosi ja painosi on vaihdettu";
 }
else
 {
echo "Tietoja ei pystytty päivittämään";
}

 }

}
?>
</div>
</main>

</body>

</html>



