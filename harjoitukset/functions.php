<?

function trainingText($liikunta) {
      
      
    $treeniLinkit = array(

    "iwgWzOoJ1EI", 
    "Qe-25gXKkdo", 
    "mTlqAv2ApkE", 
    "41Frx0YOGDM", 
    "wsMvCuXETSU", 
    "s-ZA5J67KJM",
    "hpbVRzETA9E");

    for ($i=0; $i<=$treeniLinkit; $i++){
        echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$treeniLinkit[$i]' frameborder='0' allowfullscreen></iframe>";
    }
    return $treeniLinkit[$liikunta];
}
?>