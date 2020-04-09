<?php
include('./includes/iheader.php');

?>


  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php

include('./includes/inavindex.php');

?>
  <div class="container">
    <div class="row">
      <div class="one-half column" style="margin-top: 25%">
        <h4>Basic Page</h4>
        <p>This index.html page is a placeholder with the CSS, font and favicon. It's just waiting for you to add some content! If you need some help hit up the <a href="http://www.getskeleton.com">Skeleton documentation</a>.</p>
      </div>
      <div id="kello">
          Tähän tulee sekunttikello lopullisessa versiossa, nyt vain <a href="Kello/kello.php">linkki</a> kellon nykyiseen toiminnallisuuteen.
          <?php
          include('Kello/kello.php')
          ?>
      </div>
      <div id="paivanHarjoitukset">
          Tähän tulee lopullisessa versiossa arvottu harjoitus ennalta määrätyistä harjoituksista.
      </div>
      <div id="paivanFiilis">
        Tähän tulee toiminnallisuus päivän fiiliksestä. Ensimmäisessä näkymässä kysytään numeraalinen arvo päivän fiiliksestä.
        Kun tämä arvo on annettu käyttäjältä kysytään nautitun kofeiinin määrä, nautitun alkoholin määrä sekä nukutut tunnit
        Lähtökohtana lomake:

        <?php
        //haetaan tehty lomake forms kansiosta
        include('forms/fpaivanFiilis.php');
        ?>

      </div>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
