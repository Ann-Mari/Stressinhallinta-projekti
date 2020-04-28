<?php
//liitetään toiminnallisuus
include("Meditaatio/meditaatioHarjoitus.js");
//tarkastetaan onko sessiomuuttujaa vielä olemassa
if (!isset($_SESSION["pvaHarjoitus"])){
    console.log("sessiomuuttujan puutos tunnistettu");
    //jos ei, haetaan toiminnallisuudessta funktio
    $s=pvHarjoitus();
    console.log("funktio toteutettu")
    //asetetaan sessiomuuttujaan haettu arvo
    $_SESSION["pvaHarjoitus"]="$s";
    echo("<iframe width='560' height='315' src='https://www.youtube.com/embed/$s' frameborder='0' allowfullscreen></iframe>")

} else{
    //jos löytyy niin sessio muuttujasta vain poimitaan sinne tallennettu linkin pääte
echo("<iframe width='560' height='315' src='https://www.youtube.com/embed/$_SESSION['pvaHarjoitus']' frameborder='0' allowfullscreen></iframe>");
}
?>