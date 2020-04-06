<?php include("./includes/iheader.php");?>
<?php include("forms/fcreateaccount.php");?>
//Lähteenä: Lab6 pohjana ja Karin diat
<?php
//Lomakkeen submit painettu?
if(isset($_POST['submitUser'])){
  //Tarkistetaan syötteet myös palvelimella
  if(strlen($_POST['givenFirstname'])<4){
   $_SESSION['swarningInput']="Illegal firstname (min 4 chars)";
}else if(strlen($_POST['givenLastname'])<4){
    $_SESSION['swarningInput']="Illegal lastname (min 4 chars)";
  }else if(!filter_var($_POST['givenEmail'], FILTER_VALIDATE_EMAIL)){
   $_SESSION['swarningInput']="Illegal email";
  }else if(strlen($_POST['givenPassword'])<8){
  $_SESSION['swarningInput']="Illegal password (min 8 chars)";
  }else if(!$_POST['givenPassword'] == $_POST['givenPasswordVerify']){
  $_SESSION['swarningInput']="Given password and verified not same";
  }else{
  unset($_SESSION['swarningInput']);
  //1. Tiedot sessioon
  $_SESSION['sfirstName']=$_POST['givenFirstname'];
  $_SESSION['slastName']=$_POST['givenLastname'];
  $_SESSION['sloggedIn']="yes";
  $_SESSION['semail']= $_POST['givenEmail'];
  //2. Tiedot kantaan

  $data['name'] = $_POST['givenFirstname'];
  $data['name2'] = $_POST['givenLastname'];
  $data['email'] = $_POST['givenEmail'];
  $added='#â‚¬%&&/'; //suolataan annettu salasana
  $data['pwd'] = password_hash($_POST['givenPassword'].$added, PASSWORD_BCRYPT);
  try {
    //***Email ei saa olla käytetty aiemmin
    $sql = "SELECT COUNT(*) FROM Rekisteröinti where userEmail  =  " . "'".$_POST['givenEmail']."'"  ;
    $kysely=$DBH->prepare($sql);
    $kysely->execute();    			
    $tulos=$kysely->fetch();
    if($tulos[0] == 0){ //email ei ole käytössä
     $STH = $DBH->prepare("INSERT INTO Rekisteröinti (firstName, lastName, userEmail, userPwd) VALUES (:name, :name2, :email, :pwd);");
     $STH->execute($data);
     header("Location: personalinformation.php"); //Palataan pääsivulle kirjautuneena
    }else{
      $_SESSION['swarningInput']="Email is reserved";
    }
  } catch(PDOException $e) {
    file_put_contents('log/DBErrors.txt', 'signInUser.php: '.$e->getMessage()."\n", FILE_APPEND);
    $_SESSION['swarningInput'] = 'Database problem';
    
  }
}

}
if(isset($_SESSION['swarningInput'])){
    echo("<h2>".$_SESSION['swarningInput']."</h2>");
}
?>

<?php
//Luovutetaanko ja palataan takaisin pääsivulle alkutilanteeseen
if(isset($_POST['submitBack'])){
  session_unset();
  session_destroy();
  header("Location: index.php");
}
?>

<?php
  //Näytetäänkö lomakesyötteen aiheuttama varoitus?
if(isset($_SESSION['swarningInput'])){
  echo("<p class=\"warning\">ILLEGAL INPUT: ". $_SESSION['swarningInput']."</p>");
}
?>