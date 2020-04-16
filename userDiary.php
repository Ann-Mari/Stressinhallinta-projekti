
<?php
include("includes/iheader.php");
include('./includes/inavindex.php');
?>

<br>
<br>
<br>
<main>
<div class="one-half column" style="margin-top: 25%">
<p>Tämä on sinun päiväkirjasi</p>

<p>Tähän tulee päiväkirja tilastoja Graafeja, jotka saavat tietonsa tietokannasta. Graafien piirtämiseen käytetään plotlyä.</p>
<div id='Kahvin ja alkoholin määrä' style="width:60%;height:600px;"></div>
<script>
var trace1 = {
  x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
  y: [4, 6, 4, 3, 2, 2, 4],
  type: 'scatter',
  name: 'Kahvikuppien määrä'
  
};

var trace2 = {
  x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
  y: [0, 1, 0, 2, 4, 12, 0],
  type: 'scatter',
  name: 'Alkoholiannosten määrä'
  
};

var trace3 = {
  x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
  y: [8, 7, 8, 8, 9, 8, 4],
  type: 'scatter',
  name: 'Unen määrä (h)'
  
};

var trace4 = {
  x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
  y: [5, 7, 8, 9, 7, 8, 3],
  type: 'bar',
  name: 'Unen laatu'
  
};

var data = [trace1, trace2, trace3, trace4];

Plotly.newPlot('Kahvin ja alkoholin määrä', data);

</script>

<h2>Tässä käyttäjän leposykkeet</h2>
<div id = 'leposyke' style="width:60%;height:600px;"></div>
<script>

function makeplot() {
  Plotly.d3.csv('leposyke.csv', function(data){ processData(data) } );

};

function processData(allRows) {

  console.log(allRows);
  var x = [], y = [];

  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
    x.push( row['Päivämäärä'] );
    y.push( row['Leposyke'] );
  }
  console.log( 'Päivät',x, 'Syke',y, 'SD');
  makePlotly( x, y);
}

function makePlotly( x, y){
  var plotDiv = document.getElementById("plot");
  var traces = [{
    x: x,
    y: y
  }];

  Plotly.newPlot('leposyke', traces,
    {title: 'Plotting CSV data from AJAX call'});
};
  makeplot();

</script>
  </div>
</main>



</body>
</html>