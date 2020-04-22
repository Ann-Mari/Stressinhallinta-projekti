<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" href="./css/modal.css">
<?php
include('./includes/iheader.php');
//Lähteenä https://www.w3schools.com/howto/howto_css_modals.asp
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

   <!-- Trigger/Open The Modal -->
   <button id="myBtn">Aloita mittaus</button>

<!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
<span class="close">&times;</span>
<p><?php include('Kello/kello.php');?></p>
</div>

</div>

<button id="myBtn1">Päivän harjoitus ohje</button>

<!-- The Modal -->
<div id="myModal1" class="modal">

<!-- Modal content -->
<div class="modal-content1">
<span class="close1">&times;</span>
<p>Päivän harjoitusohje</p>
</div>

</div>

<button id="myBtn2">Päivän fiilis</button>

<!-- The Modal -->
<div id="myModal2" class="modal">

<!-- Modal content -->
<div class="modal-content2">
<span class="close2">&times;</span>
<p><?php include('forms/fpaivanFiilis.php');?></p>
</div>

</div>
<script>
        // Get the modal
        var modal = document.getElementById("myModal");
        var modal1 = document.getElementById("myModal1");
        var modal2 = document.getElementById("myModal2");
  
       // Get the button that opens the modal
       var btn = document.getElementById("myBtn");
       var btn1 = document.getElementById("myBtn1");
       var btn2 = document.getElementById("myBtn2");
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      var span1 = document.getElementsByClassName("close1")[0];
      var span2 = document.getElementsByClassName("close2")[0];

      // When the user clicks on the button, open the modal
      btn.onclick = function() {
      modal.style.display = "block";
     }
     btn1.onclick = function() {
      modal1.style.display = "block";
     }
     btn2.onclick = function() {
      modal2.style.display = "block";
     }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
      modal.style.display = "none";
     }
     span1.onclick = function() {
      modal1.style.display = "none";
     }
     span2.onclick = function() {
      modal2.style.display = "none";
     }


     // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
      if (event.target == modal) {
      modal.style.display = "none";
    }
  }
   /* window1.onclick = function(event1) {
      if (event1.target == modal1) {
      modal1.style.display = "none";
    }
  }
    window1.onclick = function(event2) {
      if (event2.target == modal2) {
      modal2.style.display = "none";
    }
 }  */    
</script>
      
      <div id="kello">
          Tähän tulee sekunttikello lopullisessa versiossa, nyt vain <a href="Kello/kello.php">linkki</a> kellon nykyiseen toiminnallisuuteen.
          <?php
          //include('Kello/kello.php');
          ?>
      </div>
      <div id="paivanHarjoitukset">
          Tähän tulee lopullisessa versiossa arvottu harjoitus ennalta määrätyistä harjoituksista.
          <?php
         // include("Meditaatio/meditaatioEtusivuHarjoitus.php");
          ?>
      </div>
      <div id="paivanFiilis">
        Tähän tulee toiminnallisuus päivän fiiliksestä. Ensimmäisessä näkymässä kysytään numeraalinen arvo päivän fiiliksestä.
        Kun tämä arvo on annettu käyttäjältä kysytään nautitun kofeiinin määrä, nautitun alkoholin määrä sekä nukutut tunnit
        Lähtökohtana lomake:

        <?php
        //haetaan tehty lomake forms kansiosta
        //include('forms/fpaivanFiilis.php');
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