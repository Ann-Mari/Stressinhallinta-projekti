<?php include("./includes/iheader.php");?>
<?php include("includes/personalnav.php");?>
<?php include("forms/fpersonalinformation.php");?>

<?php
//Lähteenä: Lab6 ja Lab5 sekä Karin diat
//kirjautuneen käyttäjän personalID?
    $data1['email'] = $_SESSION['semail'];
    $sql1 = "SELECT personalID FROM userRegister where userEmail =  :email";
    $kysely1=$DBH->prepare($sql1);
    $kysely1->execute($data1);
    $tulos1=$kysely1->fetch();
    $currentpersonalID=$tulos1[0];
    
?>

<?php
  //2. Tiedot kantaan
  //Lomakkeen submit painettu?
if(isset($_POST['submitUser'])){
   //Tarkistetaan syötteet myös palvelimella
   if(strlen($_POST['givenAge'])>2){
    $_SESSION['swarningInput']="liian paljon merkkejä ikä kohdassa (max 2 merkkiä)";
 }else if(strlen($_POST['givenGender'])<3){
     $_SESSION['swarningInput']="liian vähän kirjaimia sukupuoli kohdassa (min 3 kirjainta)";
 /* }else if(!filter_var($_POST['givenHeight'])<1){
    $_SESSION['swarningInput']="Liian vähän merkkejä pituus kohdassa (min 1 merkki)";
   }else if(strlen($_POST['givenWeight'])<2){
   $_SESSION['swarningInput']="Liian vähän merkkejä paino kohdassa (min 2 merkkiä)";
 }else if(strlen($_POST['givenStress'])<1){
   $_SESSION['swarningInput']="Liian vähän merkkejä stressi kohdassa (min 1 merkki)";
 }else if(strlen($_POST['givenMeditation'])<3){
   $_SESSION['swarningInput']="Liian vähän merkkejä meditaatio tausta kohdassa (min 3 merkkiä)";
 }else if(strlen($_POST['givenCondition'])<3){
   $_SESSION['swarningInput']="Liian vähän merkkejä yleiskunto kohdassa (min 3 merkkiä)";*/
   }else{
   unset($_SESSION['swarningInput']);
 
 
  try {

  $data2['Age'] = $_POST['givenAge'];
  $data2['Gender'] = $_POST['givenGender'];
  $data2['Height'] = $_POST['givenHeight'];
  $data2['Weight'] = $_POST['givenWeight'];
  $data2['Stresslevel'] = $_POST['givenStress'];
  $data2['Meditation'] = $_POST['givenMeditation'];
  $data2['Condition'] = $_POST['givenCondition'];
  $data2['Condition'] = $_POST['givenCondition'];
  $data2['userpersonalID'] = $currentpersonalID;
  	
    $sql2=("INSERT INTO Personal (userAge, userGender, userHeight, userWeight, userStresslevel, userBackground, userGeneral_condition, userpersonalID)
    VALUES (:Age, :Gender, :Height, :Weight, :Stresslevel, :Meditation, :Condition, :userpersonalID);");	
     $kysely2 = $DBH->prepare($sql2); 
     $kysely2->execute($data2);
     header("Location: index.php"); //Palataan pääsivulle kirjautuneena
   } catch(PDOException $e) {
    file_put_contents('log/DBErrors.txt', 'index.php: '.$e->getMessage()."\n", FILE_APPEND);
    $_SESSION['swarningInput'] = 'Database problem';
   }
}
}
if(isset($_SESSION['swarningInput'])){
    echo("<h2>".$_SESSION['swarningInput']."</h2>");
}
?>

<?php
//Siirrytäänkö suoraan etusivulle ja myöhemmin täyttö
if(isset($_POST['submitBack'])){
   //Tarkistetaan syötteet myös palvelimella
   if(strlen($_POST['givenAge'])>2){
    $_SESSION['swarningInput']="liian paljon merkkejä ikä kohdassa (max 2 merkkiä)";
 }else if(strlen($_POST['givenGender'])<4){
     $_SESSION['swarningInput']="liian vähän kirjaimia sukupuoli kohdassa (min 4 kirjainta)";
}else{
   unset($_SESSION['swarningInput']);

  try {

    $data2['Age'] = $_POST['givenAge'];
    $data2['Gender'] = $_POST['givenGender'];
    $data2['Height'] = $_POST['givenHeight'];
    $data2['Weight'] = $_POST['givenWeight'];
    $data2['Stresslevel'] = $_POST['givenStress'];
    $data2['Meditation'] = $_POST['givenMeditation'];
    $data2['Condition'] = $_POST['givenCondition'];
    $data2['Condition'] = $_POST['givenCondition'];
    $data2['userpersonalID'] = $currentpersonalID;
      
      $sql2=("INSERT INTO Personal (userAge, userGender, userHeight, userWeight, userStresslevel, userBackground, userGeneral_condition, userpersonalID)
      VALUES (:Age, :Gender, :Height, :Weight, :Stresslevel, :Meditation, :Condition, :userpersonalID);");	
       $kysely2 = $DBH->prepare($sql2); 
       $kysely2->execute($data2);
       header("Location: index.php"); //Palataan pääsivulle kirjautuneena
     } catch(PDOException $e) {
      file_put_contents('log/DBErrors.txt', 'index.php: '.$e->getMessage()."\n", FILE_APPEND);
      $_SESSION['swarningInput'] = 'Database problem';
     }
  }
}
  if(isset($_SESSION['swarningInput'])){
      echo("<h2>".$_SESSION['swarningInput']."</h2>");
  }

?>

<?php
  //Näytetäänkö lomakesyötteen aiheuttama varoitus?
if(isset($_SESSION['swarningInput'])){
  echo("<p class=\"warning\">Väärä syöte: ". $_SESSION['swarningInput']."</p>");
}
  
?>

