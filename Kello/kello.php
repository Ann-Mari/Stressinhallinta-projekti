<?php
include('./config/config.php');
include('./onfig/https.php');
?>

<?php
include('includes/iheader.php');
include('./includes/inavindex.php');

?>
<div id="timerContainer">
<div class="timer" onclick="startTimer()">Aloita!</div>
<div class="startTimer reset" onclick="startTimer()" >
    <i class="fas fa-play"></i>
  </div>
<div class="pauseTimer reset" onclick="pauseTimer()" >
    <i class="fas fa-pause"></i>
  </div>
<div class="resetTimer reset" onclick="resetTimer()">Tyhjennä</div>
</div>
<div class="saveExercise reset" onclick="saveExercise()">Tallenna</div>
</div>
<script type="text/javascript" src="kello.js"></script>
</body>
</html>