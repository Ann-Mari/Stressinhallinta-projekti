
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



<?php

$data2['personalID'] = $currentpersonalID;
$sql = "SELECT paivanFiilis, kofeiini, alkoholi, uni, unenLaatu FROM Paivan_Fiilis WHERE personalID = :personalID";
$kysely = $DBH->prepare($sql);
$kysely->execute($data2);

$paivanAr= array();
$kofeiiniAr = array();

//$paivat = array("1","2","4","5","6","7");


  while ($row=$kysely->fetch()){
    $paivanAr[] = $row["paivanFiilis"];
    //$row["kofeiini"].
   // $row["alkoholi"].
    //$row["uni"].
    //$row["unenLaatu"]
  }


echo json_encode($paivanAr);

print_r($paivanAr);

?>

<div id='Kahvin ja alkoholin määrä' style="width:85%;height:600px;"></div>


<script>


fetch('rest/haeData.php/?paivat=' + 7)  //7 viimeistä päivää oletuksena
.then((response) => {
            return response.json();
        })

        .then((vastaus) => { 
            console.log("Vastaus: \n" + JSON.stringify(vastaus,undefined,2));
            var trace=vastaus;
            //TÄHÄN TULEE TUO KAIKKI JAVASCRIPT ploty
/*
       
      var trace = {
        x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
        y: [5,8,9,6,5,4,4],
        type: 'scatter',
        name: 'Päivän fiilis'
        
      };
console.log("Päivän fiilis break: \n" + JSON.stringify(trace,undefined,2));
*/
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


      var data = [trace, trace1, trace2, trace3, trace4];

      var layout ={
        title: 'Kahvi, alkoholi ja uni'
      };

      Plotly.newPlot('Kahvin ja alkoholin määrä', data, layout); "json";

    });
            
   

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

</script>
  </div>
</main>
</body>
</html>