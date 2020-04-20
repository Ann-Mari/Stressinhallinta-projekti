
<?php
include("./includes/iheader.php");
include('./includes/inavindex.php');
?>
<br>
<br>
<br>
<br>
<h2>Käyttäjän tilastot</h2>
<p>Tällä hetkellä tulostaa vielä kaikkien käyttäjien tulokset, tulossa yksilöllinen taulukko joka yhdistetään graafiin</p>
<?php
$data2['personalID'] = $currentpersonalID;
$sql = "SELECT paivanFiilis, kofeiini, alkoholi, uni, unenLaatu FROM Paivan_Fiilis";
$kysely = $DBH->prepare($sql);
$kysely->execute($data2);
//$tulos=$kysely->fetch();
//print_r($tulos);
//WHERE personalID = :personalID
echo("<table>
<tr>
  <th>Päivän fiilis</th>
  <th>Kahvikuppien määrä</th>
  <th>Alkoholiannosten määrä</th>
  <th>Unen määrä</th>
  <th>Unen laatu</th>
  </tr>");

  while ($row=$kysely->fetch()){
    echo("<tr><td>".$row["paivanFiilis"]."</td>
    <td>".$row["kofeiini"]."</td>
    <td>".$row["alkoholi"]."</td>
    <td>".$row["uni"]."</td>
    <td>".$row["unenLaatu"]."</td>
    </tr>");
  }
echo("</table>");
/*
  echo("<table>
  <tr>
    <th>Unen määrä</th>
    </tr>");
  
    while ($row=$kysely->fetch()){
      echo("<tr><td>".$row["uni"]."</td>
      </tr>");
    }
  echo("</table>");


*/

/*
$js_array = "[";
$result = mysql_query("päivän fiilis");

while( $row= mysql_fetch_array($result, MYSQL_NUM)){
  $js_array .= $row[];
}
$js_array{strlen($js_array)-1 } = ']';
echo "var db_array = $js_array;";
*/
/*
$jsonArray = array();
if ($result-> num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    $jsonArrayItem = array();
    $jsonArrayItem['Paivan_Fiilis'] = $row['paivanFiilis'];
    $jsonArrayItem['Paivan_Fiilis'] = $row['kofeiini'];
    $jsonArrayItem['Paivan_Fiilis'] = $row['alkoholi'];
    $jsonArrayItem['Paivan_Fiilis'] = $row['uni'];
    $jsonArrayItem['Paivan_Fiilis'] = $row['unenLaatu'];
    
    array_push($jsonArray, $jsonArrayItem);
  }
}
//header('Content-type: application/json');
echo json_encode($jsonArray);
?>
<br>
<br>
<br>
<br>
<?php


echo("<table>
<tr>
  <th>Unen määrä</th>
  </tr>");

  while ($row=$kysely->fetch()){
    echo("<tr><td>".$row["uni"]."</td>
    </tr>");
  }
echo("</table>");

/*

----------------

$kysely = $DBH->prepare("SELECT paivanFiilis, kofeiini, alkoholi, uni, unenLaatu FROM Paivan_Fiilis WHERE personalID = CURRENT_USER()");
$kysely->execute();
$array = [];
foreach ($kysely->get_result() as $row)
{
    $array[] = $row['uni'];
}
print_r($array);
*/
?>

<br>
<br>
<br>
<main>
<div class="two-thirds column" style="margin-top: 10%, margin-left: 10%" >
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
  y: [5, 7, 8, 9, 7, 8, 3],
  type: 'scatter',
  name: 'Unen laatu'
  
};

var trace4 = {
  x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
  y: [8, 7, 8, 8, 9, 8, 4],
  type: 'bar',
  name: 'Unen määrä (h)'
  
};


var data = [trace1, trace2, trace3, trace4];

var layout ={
  title: 'Kahvi, alkoholi ja uni'
};

Plotly.newPlot('Kahvin ja alkoholin määrä', data, layout);

</script>



<h2>Tässä käyttäjän leposykkeet</h2>
<div id = 'leposyke' style="width:60%;height:600px;"></div>
<script>

function makeplot() {
  Plotly.d3.csv("leposyke.csv", function(data){ processData(data) } );

};

function processData(allRows) {

  console.log(allRows);
  var x = [], y = [], standard_deviation = [];

  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
    x.push( row['Päivämäärä'] );
    y.push( row['Leposyke'] );
  }
  console.log( 'X',x, 'Y',y, 'SD',standard_deviation );
  makePlotly( x, y, standard_deviation );
}

function makePlotly( x, y, standard_deviation ){
  var plotDiv = document.getElementById("plot");
  var traces = [{
    x: x,
    y: y
  }];

  Plotly.newPlot('leposyke', traces,
    {title: 'Leposyke data csv tiedostosta'});
};
  makeplot();

/*
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
  var plotDiv = document.getElementById("leposyke");
  var traces = [{
    x: x,
    y: y
  }];

  Plotly.newPlot('leposyke', traces,
    {title: 'Plotting CSV data from AJAX call'});
};
  makeplot();
*/
</script>
  </div>
</main>



</body>
</html>