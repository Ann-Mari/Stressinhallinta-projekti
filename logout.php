<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); //Palataan pääsivulle, ei kirjautunut
 
?>

//Lähteenä: Lab6