<?php
//Lähteenä: Lab6 ja Karin materiaalit
session_start();
session_unset();
session_destroy();
header("Location: index.php"); //Palataan pääsivulle, ei kirjautunut
 
?>

