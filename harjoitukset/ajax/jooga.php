<?php
// required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

  $joogaHarjoitukset =
  '[
    "iwgWzOoJ1EI",
    "Qe-25gXKkdo",
    "mTlqAv2ApkE",
    "41Frx0YOGDM",
    "wsMvCuXETSU",
    "s-ZA5J67KJM",
    "hpbVRzETA9E"    
   ]';



echo(json_encode($joogaHarjoitukset));
  
?>
