<script>"Meditaatio/meditaatioHarjoitus.js"</script>
<?php
//liitetään toiminnallisuus
//tarkastetaan onko sessiomuuttujaa vielä olemassa
if (!isset($_SESSION["pvaHarjoitus"])){
    //console.log("sessiomuuttujan puutos tunnistettu");
    //jos ei, haetaan toiminnallisuudessta funktio
    echo '<script type="Meditaatio/meditaatioHarjoitus.js">',
     'pvHarjoitus();',
     '</script>'
;
    
    //asetetaan sessiomuuttujaan haettu arvo
    //$_SESSION["pvaHarjoitus"]=$s;

} else{
    //jos löytyy niin sessio muuttujasta vain poimitaan sinne tallennettu linkin pääte
echo("<iframe width='560' height='315' src='https://www.youtube.com/embed/1qiV2RX5UwU' frameborder='0' allowfullscreen></iframe>");
}
?>