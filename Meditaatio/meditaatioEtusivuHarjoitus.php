<?php
include("./config/config.php");
?>
<html>
<head>
<title>
Test</title>

</head>
<div class="videoWrapper">
 
<?php
/*Jos sessiomuuttujaa ei ole käynnistetään pvHarjoitus joka randomisoi numeron
*Randomisoidulla numerolla valitaan kyseisen session harjoitus
*tarkoituksena estää päivän harjoituksen vaihtuminen jokaisen sivun päivityksen yhteydessä
*/
function pvHarjoitus() {
  $harjoitus;
 // $rnd = Math.floor(Math.random() * 10);
 
  //haetaan harjoitukset kansiosta sinne tehty lista
  //ilman nappia, katotaan toimiiko tällein, tästä puuttuu teknisesti
  $kHarjoitus= array(
  "iwgWzOoJ1EI",
  "Qe-25gXKkdo",
  "mTlqAv2ApkE",
  "41Frx0YOGDM",
  "wsMvCuXETSU",
  "s-ZA5J67KJM",
  "hpbVRzETA9E",
  "BFub-V365iI",
  "1qiV2RX5UwU",
  "-q9diKKQ-SU" 
  );
  //loopilla käydään läpi lista
  $rnd = mt_rand(0,10);
 //print_r($rnd+" on harjoituksen numero");
  $harjoitus = $kHarjoitus[$rnd];
  /*for (var i = 0; i <= 10; i++) {

    //jos i on sama kuin rnd-numero asetetaan harjoitusmuuttujaan 
    if (i = rnd) {
      

    }
  }
*/
  //)
  
  
  echo "<iframe id='video' width='560' height='349'  src='https://www.youtube.com/embed/$harjoitus' frameborder='0' allowfullscreen></iframe>";
}

pvHarjoitus();  


//liitetään toiminnallisuus
//tarkastetaan onko sessiomuuttujaa vielä olemassa
//if (!isset($_SESSION["pvaHarjoitus"])){
    //console.log("sessiomuuttujan puutos tunnistettu");
    //jos ei, haetaan toiminnallisuudessta funktio
    /*echo ("<script type='Meditaatio/meditaatioHarjoitus.js'>',
     'pvHarjoitus();',
     '</script>");
*/
     echo '<script type="text/javascript">pvHarjoitus();</script>';

    
    //asetetaan sessiomuuttujaan haettu arvo
    //$_SESSION["pvaHarjoitus"]=$s;

//} else{
    //jos löytyy niin sessio muuttujasta vain poimitaan sinne tallennettu linkin pääte
//echo("<iframe width='560' height='315' src='https://www.youtube.com/embed/1qiV2RX5UwU' frameborder='0' allowfullscreen></iframe>");
//}
?>

</div>
