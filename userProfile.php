
<?php
include("./includes/iheader.php");
include('./includes/inavindex.php');
include("./includes/personalnav.php");
//Lähteenä Lab6 ja Karin diat. Tietokantaan yhdistämisen lähteenä oli
// https://stackoverflow.com/questions/15510042/changing-a-password-php-mysql/51096636

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

        
        $newpassword = $_POST['uusiSalasana'];
        $confirmnewpassword = $_POST['uusiSalasanaVahvistus'];
        $hashpassword = password_hash($_POST['uusiSalasana'].$added, PASSWORD_BCRYPT);
       
        if($newpassword==$confirmnewpassword)
        $sql2=("UPDATE userRegister SET userPwd='$hashpassword' where personalID='$currentpersonalID'");
        $kysely2=$DBH->prepare($sql2);
        $kysely2->execute();
        if($sql2)
        {
        echo "Salasananvaihto onnistui";
        }
       else
        {
       echo "Salasanat eivät täsmää";
       }
      
        
   }
  }

if(isset($_POST['submitKuPa'])){

  if(strlen($_POST['annettuKuntotaso'])<4){
    $_SESSION['swarningInput']="Liian vähän kirjaimia kuntotasossa (min 4 kirjainta)";
}else if($_POST['annettuPaino']>=45 && $_POST['annettuPaino'] >=250){
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
if(isset($_SESSION['swarningInput'])){
  echo("<h2>".$_SESSION['swarningInput']."</h2>");
}

$data3['userpersonalID'] = $currentpersonalID;
$sql3 = "SELECT userAge, userGender, userHeight, userWeight, userStresslevel, userBackground, userGeneral_condition FROM Personal
 WHERE userpersonalID = :userpersonalID";
$kysely3=$DBH->prepare($sql3);
$kysely3->execute($data3);                

    echo("<table>
         <tr>
            <th>Ikä</th>
      <th>sukupuoli</th>
      <th>pituus</th>
      <th>paino</th>
      <th>Stressitaso</th>
      <th>taustaa</th>
      <th>kuntotaso</th>
        </tr>");
    
        while    ($row=$kysely3->fetch()){    
                echo("<tr><td>".$row["userAge"]."</td>
                <td>".$row["userGender"]."</td>
                <td>".$row["userHeight"]."</td>
                <td>".$row["userWeight"]."</td>
                <td>".$row["userStresslevel"]."</td>
                <td>".$row["userBackground"]."</td>
                <td>".$row["userGeneral_condition"]."</td></tr>");
        }
    
  echo("</table>");
  
?>
</div>
</main>

</body>

</html>



