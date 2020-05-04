
<body>
<div class="container">

<?php include("./includes/iheader.php");?>
<?php include("forms/fcreateaccount.php");?>

<?php
//Lähteenä: Lab6 pohjana ja Karin diat
//Lomakkeen submit painettu?
if(isset($_POST['submitUser'])){
  //Tarkistetaan syötteet myös palvelimella
  if(strlen($_POST['givenFirstname'])<4){
   $_SESSION['swarningInput']="Liian vähän kirjaimia etunimessä (min 4 kirjainta)";
}else if(strlen($_POST['givenLastname'])<4){
    $_SESSION['swarningInput']="Liian vähän kirjaimia sukunimessä (min 4 kirjainta)";
  }else if(!filter_var($_POST['givenEmail'], FILTER_VALIDATE_EMAIL)){
   $_SESSION['swarningInput']="Väärä sähköposti";
  }else if(strlen($_POST['givenPassword'])<8){
  $_SESSION['swarningInput']="Liian vähän merkkejä salasanassa (min 8 merkkiä)";
  }else if($_POST['givenPassword'] != $_POST['givenPasswordVerify']){
  $_SESSION['swarningInput']="salasana ei vastaa annettua salasanaa";
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
    $sql = "SELECT COUNT(*) FROM userRegister where userEmail  =  " . "'".$_POST['givenEmail']."'"  ;
    $kysely=$DBH->prepare($sql);
    $kysely->execute();    			
    $tulos=$kysely->fetch();
    if($tulos[0] == 0){ //email ei ole käytössä
     $STH = $DBH->prepare("INSERT INTO userRegister (firstName, lastName, userEmail, userPwd) VALUES (:name, :name2, :email, :pwd);");
     $STH->execute($data);
     header("Location: personalinformation.php"); //Palataan pääsivulle kirjautuneena
    }else{
      $_SESSION['swarningInput']="Sähköposti on käytössä";
    }
  } catch(PDOException $e) {
    file_put_contents('log/DBErrors.txt', 'signInUser.php: '.$e->getMessage()."\n", FILE_APPEND);
    $_SESSION['swarningInput'] = 'Database problem';
    
  }
}

}
if(isset($_SESSION['swarningInput'])){
    echo("<h4>".$_SESSION['swarningInput']."</h4>");
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

</div>
<?php
include("includes/ifooter.php");
?>
