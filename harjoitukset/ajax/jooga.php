<?php
// required headers 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

  $samplesPulseJSON =
  '[{
    "ID": "iwgWzOoJ1EI" 
},
{
    "ID": "iwgWzOoJ1EI" 
}
]';

echo(json_encode($samplesPulseJSON));
  
?>
