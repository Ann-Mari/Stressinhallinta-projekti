
<?php
include("includes/iheader.php");
include('./includes/inavindex.php');
?>

<br>
<br>
<br>
<main>

<p>Tämä on sinun päiväkirjasi</p>

<p>Tähän tulee päiväkirja tilastoja Graafeja, jotka saavat tietonsa tietokannasta. Graafien piirtämiseen käytetään plotlyä.</p>
<div id='Kahvin ja alkoholin määrä' style="width:800px;height:300px;"></div>
<script>
var trace1 = {
  x: [1, 2, 3, 4, 5, 6, 7],
  y: [4, 6, 4, 3, 2, 2, 4],
  type: 'scatter',
  name: 'Kahvikuppien määrä'
  
};

var trace2 = {
  x: [1, 2, 3, 4, 5, 6, 7],
  y: [0, 1, 0, 2, 4, 12, 0],
  type: 'scatter',
  name: 'Alkoholiannosten määrä'
  
};

var data = [trace1, trace2];

Plotly.newPlot('Kahvin ja alkoholin määrä', data);
/*
	TESTER = document.getElementById('Kahvi ');
	Plotly.newPlot( TESTER, [{
	x: [1, 2, 3, 4, 5],
	y: [1, 2, 4, 8, 16] }], {
	margin: { t: 0 } } );
	*/
</script>

</main>



</body>
</html>