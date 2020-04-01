<nav role="navigation">
<?php
/*
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
*/
?>

  <div id="menuToggle">
    <!--
      Piilotettu checkbox käytössä, käytä :checked valintaa 
    -->
    <input type="checkbox" />
    
    <!--
   Elämänlaadullisia span tagei
    -->
    <span></span>
    <span></span>
    <span></span>
    
    <!--
      Navigaatio menun linkit
      TOIMINNOT TULOSSA
    -->
    <ul id="menu">
        <a href="index.php"><li>Etusivu</li></a>
        <a href="userProfile.php"><li>Oma profiili</li></a>
        <a href="userDiary.php"><li>Päiväkirja</li></a>
        <a href="#"><li>Vie data</li></a>
        <a href="excercises.php"><li>Harjoitusohjeet</li></a>
        <a href="logout.php"><li>Kirjaudu ulos</li></a>
    </ul>
  </div>
</nav>
