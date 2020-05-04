
<?php
include('./includes/iheader.php');
//Lähteenä https://www.w3schools.com/howto/howto_css_modals.asp
?>
<link rel="stylesheet" type="text/css" href="./css/modal.css">

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
<div class="modal-content">
<span class="close">&times;</span>

<p><?php  include('Meditaatio/meditaatioEtusivuHarjoitus.php');?></p>
</div>
    </div>

<button id="myBtn2">Päivän fiilis</button>

<!-- The Modal -->
<div id="myModal2" class="modal">

<!-- Modal content -->
<div class="modal-content">
<span class="close">&times;</span>

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
      var span1 = document.getElementsByClassName("close")[1];
      var span2 = document.getElementsByClassName("close")[2];

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
    window.onclick = function(event) {
      if (event.target == modal1) {
      modal1.style.display = "none";
    }
  }
    window.onclick = function(event) {
      if (event.target == modal2) {
      modal2.style.display = "none";
    }
 }    
</script>
     

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php
include("includes/footer.php");
?>
