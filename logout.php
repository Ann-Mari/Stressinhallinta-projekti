<?php
//Lähteenä: Lab6
session_start();
session_unset();
session_destroy();
header("Location: index.php"); //Palataan pääsivulle, ei kirjautunut
 
?>

