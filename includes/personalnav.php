<nav>
<?php
//Lähteenä Lab6 ja Karin diat
//Henkilökohtaiset tiedot tila
if($_SESSION['sloggedIn']=="yes"){
    echo("<p> Hei " .$_SESSION['sfirstName']. " " . $_SESSION['slastName']);
}
?>
</nav>