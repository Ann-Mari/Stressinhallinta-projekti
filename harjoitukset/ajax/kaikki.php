<?php
// required headers 

//NYT KÄYTETÄÄN JSON-stringiä
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$kaikkiHarjoitukset =
'[
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
 ]';



echo(json_encode($kaikkiHarjoitukset));
?>
