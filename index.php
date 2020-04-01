<?php
include('./includes/iheader.php');

?>


  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <nav role="navigation">
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
      <a href="userProfile"><li>Oma profiili</li></a>
      <a href="userDiary.php"><li>Päiväkirja</li></a>
      <a href="#"><li>Vie data</li></a>
      <a href="excercises.php"><li>Harjoitusohjeet</li></a>
      <a href="logout.php"><li>Kirjaudu ulos</li></a>
    </ul>
  </div>
</nav>

  <div class="container">
    <div class="row">
      <div class="one-half column" style="margin-top: 25%">
        <h4>Basic Page</h4>
        <p>This index.html page is a placeholder with the CSS, font and favicon. It's just waiting for you to add some content! If you need some help hit up the <a href="http://www.getskeleton.com">Skeleton documentation</a>.</p>
      </div>
      <div id="kello" href="Kello/kello.php">
          Tähän tulee sekunttikello lopullisessa versiossa, nyt vain linkki kellon nykyiseen toiminnallisuuteen.
      </div>
      <div id="paivanHarjoitukset">
          Tähän tulee lopullisessa versiossa arvottu harjoitus ennalta määrätyistä harjoituksista.
      </div>
      <div id="paivanFiilis">
        Tähän tulee toiminnallisuus päivän fiiliksestä. Ensimmäisessä näkymässä kysytään numeraalinen arvo päivän fiiliksestä.
        Kun tämä arvo on annettu käyttäjältä kysytään nautitun kofeiinin määrä, nautitun alkoholin määrä sekä nukutut tunnit
        Lähtökohtana lomake:

        <?php
        include('forms/fpaivanFiilis.php');
        ?>

      </div>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
