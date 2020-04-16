<fieldset><legend>Päivän Fiili</legend>
          <form method="post">
            <p>
            Päivän fiilis 
            <br />  <label for="fiilis">Päivän Fiilis (min 1 max 10):</label>
               <input type="number" id="fiilis" name="fiilis" min="1" max="Salasana 10">
            </p><p>

              <label for="kahvi">Kuinka monta kuppia joit kahvia (between 0 and 10):</label>
              <input type="range" id="kahvi" name="kahvi" min="0" max="10" step="1">
            </p><p>

              <label for="alkoholi">Kuinka monta annosta alkoholia nautit (between 0 and 15):</label>
              <input type="range" id="alkoholi" name="alkoholi" min="0" max="15" step="1">
            </p><p>
            
              <label for="nukkumaan">Kuinka pitkään nukuit?:</label>
              <input type="time" id="nukkumaan" name="nukkumaan">

            </p><p>
            <label for="uniLaatu">Miten hyvin nukuit?:</label>
              <input type="range" id="uniLaatu" name="uniLaatu" min="0" max="10" step="1">

            </p><p>
            <br />  <input type="submit" name="submitFiilis" value="Hyväksy"/>
                    <input type="reset"  value="Tyhjennä"/>
            </p>
          </form>
       </fieldset>
<?php
include("./includes/iheader.php");

//kirjautuneen käyttäjän personalID?
    $data1['email'] = $_SESSION['semail'];
    $sql1 = "SELECT personalID FROM userRegister where userEmail  =  :email";
    $kysely1=$DBH->prepare($sql1);
    $kysely1->execute($data1);
    $tulos1=$kysely1->fetch();
    $currentpersonalID=$tulos1[0];
    

if(isset($_POST['submitFiilis'])){
   //1. Tiedot sessioon
   $_SESSION['späivänFiilis']=$_POST['fiilis'];
   $_SESSION['skofeiini']=$_POST['kahvi'];
   $_SESSION['salkoholi']= $_POST['alkoholi'];
   $_SESSION['suni']=$_POST['nukkumaan'];
   $_SESSION['suniLaatu']= $_POST['uniLaatu'];
//laitetaan päivän fiilikset kantaan
try{
  
  $data2['päivänFiilis'] = $_POST['fiilis'];
  $data2['kofeiini'] = $_POST['kahvi']; 
  $data2['alkoholi'] = $_POST['alkoholi'];  
  $data2['uni'] = $_POST['nukkumaan'];
  $data2['uniLaatu'] = $_POST['uniLaatu'];  
  $data2['personalID'] = $currentpersonalID;
  
  $SQL2 =("INSERT INTO Päivän_Fiilis (päivänFiilis, kofeiini, alkoholi, uni, unenLaatu, personalID)
   VALUES (:päivänFiilis, :kofeiini, :alkoholi, :uni, :uniLaatu, :personalID);");
  $kysely2 = $DBH->prepare($sql2);
  $kysely2->execute($data2);
} catch(PDOException $e) {
 file_put_contents('log/DBErrors.txt', 'index.php: '.$e->getMessage()."\n", FILE_APPEND);
 $_SESSION['swarningInput'] = 'Database problem';
}
}
 
  ?>