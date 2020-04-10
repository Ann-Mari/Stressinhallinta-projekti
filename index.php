<?php
include('./includes/iheader.php');

?>


  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->


<?php
    if(!isset($_SESSION['sloggedIn'])){
      include('./includes/startnav.php');
    }else{
?>
<?php include('./includes/inavindex.php');?>

  <div class="container">
    <div class="row">
      <div class="one-half column" style="margin-top: 25%">
      
      <div id="kello">
          Tähän tulee sekunttikello lopullisessa versiossa, nyt vain <a href="Kello/kello.php">linkki</a> kellon nykyiseen toiminnallisuuteen.
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
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
<?php
}
?>