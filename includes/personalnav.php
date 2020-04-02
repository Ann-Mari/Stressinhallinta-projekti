<nav>
<?php
//Henkilökohtaiset tiedot tila
echo("<h1>Stressinhallinta projekti</h1>");
if($_SESSION['sloggedIn']=="yes"){
    echo("<p> Hei " .$_SESSION['sfirstName']. " " . $_SESSION['slastName']);
}
?>
</nav>