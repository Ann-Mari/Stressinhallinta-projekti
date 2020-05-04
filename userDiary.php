
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

//Haetaan käyttäjän sähköpostin avulla käyttäjän id ja haetaan id:n mukaan kaikki tiedot.
$data1['email'] = $_SESSION['semail'];
$sql1 = "SELECT personalID FROM userRegister where userEmail  =  :email";
$kysely1=$DBH->prepare($sql1);
$kysely1->execute($data1);
$tulos1=$kysely1->fetch();
$currentpersonalID=$tulos1[0];

$data2['personalID'] = $currentpersonalID;
$sql = "SELECT kesto, vaikeus, paiva, kommentti FROM toteutetutHarjoitukset WHERE personalID = :personalID
ORDER BY toteutetutHarjoituksetID DESC LIMIT 10";
$kysely = $DBH->prepare($sql);
$kysely->execute($data2);

echo("<table>
<tr>
  <th>Harjoitusten kesto minuutteina</th>
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




<div id='Kahvin ja alkoholin määrä' style="width:85%;height:600px;"></div>


<script>
//Graafi muuttujat
var trace;
var trace2;
var trace3;
var trace4;
var trace5;


fetch('rest/haeFiilis.php/?paivat=' + 7)  //7 viimeistä päivää oletuksena
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
<br>
<br>
<br>
<h5>Leposykkeen kehitys viimeisen kuukauden aikana</h5>
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
<?php
include("includes/ifooter.php");
?>