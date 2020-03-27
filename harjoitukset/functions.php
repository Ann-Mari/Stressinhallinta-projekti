<?

function trainingText($trainingNumber) {
      
      
    $treeniOhjeet = array(

    "notkeuttaa keskivartaloa", 
    "verrytellä kainalolihaksia", 
    "vahvistaa Silmälihaksia", 
    "lisätä laskentalihasten liikkuvuutta", 
    "Notkistaa sellkaa tai vaihtoehtoisesti opettele kumartumaan", 
    "Tehdä käsilläseisontaa, tai poistua kotoa",
    "Maata hipihiljaa piikitettävänä");

    
    return $treeniOhjeet[$trainingNumber-1];
    
}
?>