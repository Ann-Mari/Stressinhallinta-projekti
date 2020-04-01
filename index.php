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
        <fieldset><legend>Päivän Fiili</legend>
          <form method="post">
            <p>
            Päivän fiilis 
            <br />  <label for="fiilis">Päivän Fiilis (min 1 max 10):</label>
               <input type="number" id="fiilis" name="fiilis" min="1" max="Salasana 10">
            </p><p>

              <label for="kahvi">Kuinka monta kuppia joit kahvia (between 0 and 10):</label>
              <input type="range" id="kahvi" name="kahvi" min="0" max="10" step="1">
            </p><p>

              <label for="alkoholi">Kuinka monta annosta alkoholia nautit (between 0 and 15):</label>
              <input type="range" id="alkoholi" name="alkoholi" min="0" max="15" step="1">
            </p><p>
            
              <label for="nukkumaan">Milloin menit nukkumaan:</label>
              <input type="time" id="nukkumaan" name="nukkumaan">

            </p><p>

              <label for="heratys">Milloin heräsit:</label>
              <input type="time" id="heratys" name="heratys">

            </p><p>
            <br />  <input type="submit" name="submitFiilis" value="Hyväksy"/>
                    <input type="reset"  value="Tyhjennä"/>
            </p>
          </form>
       </fieldset>
      </div>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
