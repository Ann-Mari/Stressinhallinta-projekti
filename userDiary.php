
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

<h2>Päiväkirja</h2>
<br>
<br>
<br>


<h3>Harjoitustesi kesto</h3>
<?php
$data1['email'] = $_SESSION['semail'];
$sql1 = "SELECT personalID FROM userRegister where userEmail  =  :email";
$kysely1=$DBH->prepare($sql1);
$kysely1->execute($data1);
$tulos1=$kysely1->fetch();
$currentpersonalID=$tulos1[0];

$data2['personalID'] = $currentpersonalID;
$sql = "SELECT kesto, vaikeus, paiva, kommentti FROM toteutetutHarjoitukset WHERE personalID = :personalID";
$kysely = $DBH->prepare($sql);
$kysely->execute($data2);

echo("<table>
<tr>
  <th>Harjoitusten kesto</th>
  <th>Harjoituksen päivämäärä</th>
  <th>Harjoituksen vaikeus</th>
  <th>Omat kommentit</th>
  
  </tr>");

  while ($row=$kysely->fetch()){
    echo("<tr><td>".$row["kesto"]."</td>
    <td>".$row["paiva"]."</td>
    <td>".$row["vaikeus"]."</td>
    <td>".$row["kommentti"]."</td>
    

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


?>

<div id='Kahvin ja alkoholin määrä' style="width:85%;height:600px;"></div>


<script>
//Graafi muuttujat
var trace;
var trace2;
var trace3;
var trace4;
var trace5;


fetch('rest/haeData.php/?paivat=' + 7)  //7 viimeistä päivää oletuksena
.then((response) => {
            return response.json();
        })

        .then((fiilis) => { 
            console.log("vastaus: \n" + JSON.stringify(fiilis,undefined,2));
            var trace=fiilis;

            
            
            return fetch('rest/haeKofeiini.php/?paivat=' + 7)
            .then((response) =>{
                    return response.json();
            })


            .then((kofeiini) =>{
              console.log("vastaus2: \n" + JSON.stringify(kofeiini,undefined,2));
              var trace2 = kofeiini;
           
            
              return fetch('rest/haeAlkoholi.php/?paivat=' + 7)  //7 viimeistä päivää oletuksena
              .then((response) => {
            return response.json();
        })

        .then((alkoholi) => { 
            console.log("vastaus: \n" + JSON.stringify(alkoholi,undefined,2));
            var trace3=alkoholi;
              
            return fetch('rest/haeUnenL.php/?paivat=' + 7)  //7 viimeistä päivää oletuksena
              .then((response) => {
            return response.json();
        })

        .then((unenL) => { 
            console.log("vastaus: \n" + JSON.stringify(unenL,undefined,2));
            var trace4=unenL;
            

            return fetch('rest/haeUni.php/?paivat=' + 7)  //7 viimeistä päivää oletuksena
              .then((response) => {
            return response.json();
        })

        .then((uni) => { 
            console.log("vastaus: \n" + JSON.stringify(uni,undefined,2));
            var trace5=uni;

            //TÄHÄN TULEE TUO KAIKKI JAVASCRIPT ploty

       /*
      var trace = {
        x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
        y: [5,8,9,6,5,4,4],
        type: 'scatter',
        name: 'Päivän fiilis'
        
      };
console.log("Päivän fiilis break: \n" + JSON.stringify(trace,undefined,2));


      var trace2 = {
        x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
        y: [4, 6, 4, 3, 2, 2, 4],
        type: 'scatter',
        name: 'Kahvikuppien määrä'
        
      };

      var trace3 = {
        x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
        y: [0, 1, 0, 2, 4, 12, 0],
        type: 'scatter',
        name: 'Alkoholiannosten määrä'
        
      };

      var trace4 = {
        x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
        y: [5, 7, 8, 9, 7, 8, 3],
        type: 'scatter',
        name: 'Unen laatu'
        
      };

      var trace5 = {
        x: ["Maanantai", "Tiistai", "Keskiviikko", "Torstai", "Perjantai", "Lauantai", "Sunnuntai"],
        y: [8, 7, 8, 8, 9, 8, 4],
        type: 'bar',
        name: 'Unen määrä (h)'
        
      };
*/

      var data = [trace, trace2, trace3, trace4, trace5];

      var layout ={
        title: 'Kahvi, alkoholi ja uni'
      };

      Plotly.newPlot('Kahvin ja alkoholin määrä', data, layout); "json"; //piirretään graafi, data on kaikki piirrokset, layout on nimi

    });       
    });
    });
  });
});
            
    
            
   

</script>

<!--
  Haetaan käyttäjän leposykkeet csv tiedostosta
  -->

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