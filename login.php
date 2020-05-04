<?php include("./includes/iheader.php");?>
<?php include("forms/flogin.php"); ?>

<?php include("config/config.php");?>
<div class="container">
<?php
//Lähteenä: Lab6 ja Karin diat
//Lomakkeen submit painettu?
if(isset($_POST['submitUser'])){
  //***Tarkistetaan email myös palvelimella
  if(!filter_var($_POST['givenEmail'], FILTER_VALIDATE_EMAIL)){
   $_SESSION['swarningInput']="Väärä sähköposti";
  }else{
    unset($_SESSION['swarningInput']);  
     try {
      //Tiedot kannasta, hakuehto
      $data['email'] = $_POST['givenEmail'];
      $STH = $DBH->prepare("SELECT firstName, lastName, userEmail, userPwd FROM userRegister WHERE userEmail = :email;");
      $STH->execute($data);
      $STH->setFetchMode(PDO::FETCH_OBJ);
      $tulosOlio=$STH->fetch();
      //lomakkeelle annettu salasana + suola
    $givenPasswordAdded = $_POST['givenPassword'].$added; //$added löytyy cconfig.php
    //$newpasswordAdded = $_POST['uusiSalasana'].$added;
       //Löytyikö email kannasta?   
       if($tulosOlio!=NULL){
          //email löytyi
         // var_dump($tulosOlio);
         if(password_verify($givenPasswordAdded,$tulosOlio->userPwd)){
          //if(password_verify($newpasswordAdded,$tulosOlio->userPwd)){
              $_SESSION['sloggedIn']="yes";
              $_SESSION['sfirstName']=$tulosOlio->firstName;
              $_SESSION['slastName']=$tulosOlio->lastName;
            //  $_SESSION['suserEmail']=$tulosOlio->userEmail;
            $_SESSION['semail']=$tulosOlio->userEmail;
          
              header("Location: index.php"); //Palataan pääsivulle kirjautuneena
          }else{
            $_SESSION['swarningInput']="Väärä salasana";
          }
      }else{
        $_SESSION['swarningInput']="Väärä sähköposti";
      }
     } catch(PDOException $e) {
        file_put_contents('log/DBErrors.txt', 'signInUser.php: '.$e->getMessage()."\n", FILE_APPEND);
        $_SESSION['swarningInput'] = 'Database problem';
    }
  }
}
?>

<?php
//***Luovutetaanko ja palataan takaisin pääsivulle alkutilanteeseen
//ilma  rekisteröintiä?
if(isset($_POST['submitBack'])){
  session_unset();
  session_destroy();
  header("Location: index.php");
}
?>

<?php
  //***Näytetäänkö lomakesyötteen aiheuttama varoitus?
if(isset($_SESSION['swarningInput'])){
  echo("<p class=\"warning\">Väärä syöte: ". $_SESSION['swarningInput']."</p>");
}
?>
</div>

<?php
include("includes/ifooter.php");
?>