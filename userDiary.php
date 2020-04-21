
<?php
include("./includes/iheader.php");
include('./includes/inavindex.php');
?>
<main>
<br>
<br>
<br>
<br>

<div class ="container">

<h2>Käyttäjän tilastot</h2>
<p>Tällä hetkellä tulostaa vielä kaikkien käyttäjien tulokset, tulossa yksilöllinen taulukko joka yhdistetään graafiin</p>
<?php
$data1['email'] = $_SESSION['semail'];
$sql1 = "SELECT personalID FROM userRegister where userEmail  =  :email";
$kysely1=$DBH->prepare($sql1);
$kysely1->execute($data1);
$tulos1=$kysely1->fetch();
$currentpersonalID=$tulos1[0];

var_dump($_SESSION);
$data2['personalID'] = $currentpersonalID;
$sql = "SELECT paivanFiilis, kofeiini, alkoholi, uni, unenLaatu FROM Paivan_Fiilis WHERE personalID = :personalID";
$kysely = $DBH->prepare($sql);
$kysely->execute($data2);

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

?>

<br>
<br>
<br>


<p>Tämä on sinun päiväkirjasi</p>

<p>Tähän tulee päiväkirja tilastoja Graafeja, jotka saavat tietonsa tietokannasta. Graafien piirtämiseen käytetään plotlyä.</p>

<script>
//var kahviArray;
/*
$data2['personalID'] = $currentpersonalID;
console.log('testi1');
$sql2 = "SELECT kofeiini FROM Paivan_Fiilis WHERE personalID = :personalID";
console.log('testi2');
$kysely2 = $DBH->prepare($sql2);
console.log('testi3');
$kysely2->execute($data2);
console.log('testi4');
//$tulos2=$kysely2->fetch();
//$dbArray=$tulos2[0];

$kahviArray = array(
  $kysely2->fetch()
);
console.log('testi5');
*/
//----------------------------------------------------------------------------------

<?php


var_dump($_SESSION);
$data2['personalID'] = $currentpersonalID;
$sql = "SELECT paivanFiilis, kofeiini, alkoholi, uni, unenLaatu FROM Paivan_Fiilis WHERE personalID = :personalID";
$kysely = $DBH->prepare($sql);
$kysely->execute($data2);

$paivanAr= array1();
$kofeiiniAr = arrray2();

echo(
  while ($row=$kysely->fetch()){
    echo($paivanAr[] = $row["paivanFiilis"].
    .$row["kofeiini"].
    .$row["alkoholi"].
    .$row["uni"].
    .$row["unenLaatu"].
    );
  });



?>

//var passedArray =<?php/* echo json_encode($kahviArray);*/?>;

//for(var i=0; i= < passedArray.length; i++){
 // document.write(passedArray[i]);
//}

</script>
<div id='Kahvin ja alkoholin määrä' style="width:85%;height:600px;"></div>
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
<div id = 'leposyke' style="width:85%;height:600px;"></div>
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