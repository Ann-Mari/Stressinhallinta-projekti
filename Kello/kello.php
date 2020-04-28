
<div>
  <title>Vanilla JS Stopwatch - Javascript Stopwatch</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link rel="stylesheet" href="./css/kello.css">

<div id="kelloToiminta">

<div id="timerContainer">
<div id="kello" class="timer" onclick="startTimer()">Aloita!</div>
<div id="play" class="startTimer reset" onclick="startTimer()" >
    <i class="fas fa-play"></i>
  </div>
<div id="pause" class="pauseTimer reset" onclick="pauseTimer()" >
    <i class="fas fa-pause"></i>
  </div>
<div id="reset" class="resetTimer reset clear" onclick="resetTimer()">Tyhjennä</div>
<div id="save" class="saveExercise reset" onclick="saveExercise()">Tallenna</div>
</div></div>
<script type="text/javascript" src="Kello/kello.js"></script>
</div>
</div>