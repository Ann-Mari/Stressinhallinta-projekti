
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
<!--<div id="save" class="saveExercise reset" onclick="saveExercise()">Tallenna</div>-->
<div id ="manuaalinen"><fieldset><legend>Keston manuaalinen syöttö</legend>
<form method="post">
<p>Kuinka kauan harjoittelit?</p>
<label for="kesto">Harjouituksen kesto minuutteina:</label>
               
               <input id="kesto" name="kesto" type="number" min="0" max="100">
                <input type="date" name="paiva" id="paiva">
                <select name="vaikeus" id="vaikeus">
  <option value="1">Super helppo</option>
  <option value="2">Helppo</option>
  <option value="3">Keskiverto</option>
  <option value="4">Vaikea</option>
  <option value="5">Super vaikea</option>
        </select>
        <input type="text" name="kommentti" id="kommentti">
               <p>
            <br />  <input type="submit" name="submitAika" value="Hyväksy"/>
                    <input type="reset"  value="Tyhjennä"/>
                    
            </p>
</form>
</div>
</div></div>
<script type="text/javascript" src="Kello/kello.js"></script>
</div>
</div>
<?php

//kirjautuneen käyttäjän personalID?

$data1['email'] = $_SESSION['semail'];
$sql1 = "SELECT personalID FROM userRegister where userEmail  =  :email";
$kysely1=$DBH->prepare($sql1);
$kysely1->execute($data1);
$tulos1=$kysely1->fetch();
$currentpersonalID=$tulos1[0];


if(isset($_POST['submitAika'])){


try{


  $data2['kesto'] = $_POST['kesto'];  
  $data2['vaikeus'] = $_POST['vaikeus']; 
  $data2['paiva'] = $_POST['paiva']; 
  $data2['kommentti'] = $_POST['kommentti'];
  $data2['personalID'] = $currentpersonalID;
  
  $SQL2 =("INSERT INTO toteutetutHarjoitukset (kesto, vaikeus, paiva, kommentti, personalID)
   VALUES (:kesto, :vaikeus, :paiva, :kommentti, :personalID);");
  $kysely2 = $DBH->prepare($SQL2);
  $kysely2->execute($data2);
  echo "<script>alert('Harjoituksen kesto tallennettu');</script>";

  
} catch(PDOException $e) {
 file_put_contents('log/DBErrors.txt', 'index.php: '.$e->getMessage()."\n", FILE_APPEND);
 $_SESSION['swarningInput'] = 'Manuaalinen tallennus epäonnistui';
}
}

?>