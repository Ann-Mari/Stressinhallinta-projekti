<div class="container">
<br>
<br>
<br>
<?php
//Lähteenä Lab6 ja Karin diat
//Käyttäjän tila
if($_SESSION['sloggedIn']=="yes"){
    echo("<p>Hei " .$_SESSION['sfirstName']. " " . $_SESSION['slastName']);
    ?></p><?
}else{
    ?>
    <a href="createaccount.php">Rekisteröidy</a> <a href="login.php">Kirjaudu sisään</a>
    <?php
}
?>
</div>