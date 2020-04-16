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
if(isset($_POST['submitFiilis'])){
   //1. Tiedot sessioon
   $_SESSION['späivänFiilis']=$_POST['fiilis'];
   $_SESSION['skofeiini']=$_POST['kahvi'];
   $_SESSION['salkoholi']= $_POST['alkoholi'];
   $_SESSION['suni']=$_POST['nukkumaan'];
   $_SESSION['suniLaatu']= $_POST['uniLaatu'];
//laitetaan päivn fiilikset kantaan
  $data['päivänFiilis'] = $_POST['fiilis'];
  $data['kofeiini'] = $_POST['kahvi']; 
  $data['alkoholi'] = $_POST['alkoholi'];  
  $data['uni'] = $_POST['nukkumaan'];
  $data['uniLaatu'] = $_POST['uniLaatu'];  
  
  $STH = $DBH->prepare("INSERT INTO Päivän_Fiilis (päivänFiilis, kofeiini, alkoholi, uni, unenLaatu) VALUES (:päivänFiilis, :kofeiini, :alkoholi, :uni, :uniLaatu);");
  $STH->execute($data);
} 
  ?>