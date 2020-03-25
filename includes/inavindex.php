<nav>
<?php
//Käyttäjän tila
echo("<h1>Stressinhallinta projekti</h1>");
if($_SESSION['sloggedIn']=="yes"){
    echo("<p>** Käyttäjä: " .$_SESSION['sfirstName']. " " . $_SESSION['slastName']);
    ?><a href="logout.php">Uloskirjautuminen</a></p><?
}else{
    ?>
    <a href="createaccount.php">Rekisteröidy</a> <a href="login.php">Kirjaudu sisään</a>
    <?php
}
?>
</nav>