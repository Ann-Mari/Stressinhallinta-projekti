/*Jos sessiomuuttujaa ei ole käynnistetään pvHarjoitus joka randomisoi numeron
*Randomisoidulla numerolla valitaan kyseisen session harjoitus
*tarkoituksena estää päivän harjoituksen vaihtuminen jokaisen sivun päivityksen yhteydessä
*/
function pvHarjoitus() {
  var harjoitus;
  var rnd = Math.floor(Math.random() * 10);
  console.log(rnd+" on harjoituksen numero");
  //haetaan harjoitukset kansiosta sinne tehty lista
  //ilman nappia, katotaan toimiiko tällein, tästä puuttuu teknisesti
  var kHarjoitus= Array[
  "iwgWzOoJ1EI",
  "Qe-25gXKkdo",
  "mTlqAv2ApkE",
  "41Frx0YOGDM",
  "wsMvCuXETSU",
  "s-ZA5J67KJM",
  "hpbVRzETA9E",
  "BFub-V365iI",
  "1qiV2RX5UwU",
  "-q9diKKQ-SU" 
  ];
  //loopilla käydään läpi lista
  for (var i = 0; i <= 10; i++) {
    //jos i on sama kuin rnd-numero asetetaan harjoitusmuuttujaan 
    if (i == rnd) {
      harjoitus = kHarjoitus[i];
    }
  }

  //)
  return harjoitus;
}