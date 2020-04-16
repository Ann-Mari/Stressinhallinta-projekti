//hae tietokannasta harjoitusten lukumäärä
//SELECT COUNT(harjoituksetID) FROM harjoitukset;
//saadusta määrästä nosta randomisoitu arvo
//var min= 0;
//var max=SELECT COUNT(harjoituksetID) FROM harjoitukset;
function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min; //The maximum is inclusive and the minimum is inclusive 
  }
//hae tietokannasta arvoon liittyvä youtubevideon pääte
//SELECT harjoitusLinkki FROM harjoitukset WHERE harjoituksetID randomArvo;
//aseta pääte var=harjoitus joka palautetaan meditaatioEtusivuHarjoitus.php tiedostoon ja siten saadaan etusivun harjoitus
//tallennetaan tämä sessio muuttujaan jolloin harjoitus ei vaihdu ellei sessio keskeydy
//eli ylläoleva looppi toteutuu vain kerran kirjautumisen yhteydessä

function pvHarjoitus(){
    var harjoitus = "tgbNymZ7vqY";
    return harjoitus;
}