<?php
// required headers

//NYT KÄYTETÄÄN JSON-stringiä 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
$meditaatioHarjoitukset =
'[
"BFub-V365iI",
"1qiV2RX5UwU",
"-q9diKKQ-SU" 
]';

echo(json_encode($meditaatioHarjoitukset));
?>
