<nav>
<?php
//Lähteenä Lab6 ja Karin diat
//Henkilökohtaiset tiedot tila
if($_SESSION['sloggedIn']=="yes"){
    echo("<h3> Hei " .$_SESSION['sfirstName']. " " . $_SESSION['slastName']);
}
?>
</nav>