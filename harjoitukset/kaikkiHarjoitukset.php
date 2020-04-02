<?php

var imgArray = new Array();

imgArray[0] = new Image();
imgArray[0].src = 'kuvat/jooga1.jpg';

imgArray[1] = new Image();
imgArray[1].src = 'kuvat/jooga2.jpg';

imgArray[1] = new Image();
imgArray[1].src = 'kuvat/medi1.jpg';

imgArray[1] = new Image();
imgArray[1].src = 'kuvat/medi2.jpg';

function nextImage("harjoitukset")
{
    var img = document.getElementById("harjoitukset");

    for(var i = 0; i < imgArray.length;i++)
    {
        if(imgArray[i].src == img.src) // << check this
        {
            if(i === imgArray.length){
                document.getElementById("harjoitukset").src = imgArray[0].src;
                break;
            }
            document.getElementById("harjoitukset").src = imgArray[i+1].src;
            break;
        }
    }
}

//haettu pohja minun tekemästä lab4:sta
//Kaikki treeenit SELECT * FROM "harjoitukset"
//Jooga SELECT * FROM "harjoitukset" WHERE harjoitusKoodi = 1
//Meditaatio SELECT * FROM "harjoitukset" WHERE harjoitusKoodi = 2
//halutaan muuttaa käymään läpi harjoituslista ja hakee sieltä kaikki jooga treenit, 
//laitetaan jokainen palautus omaan diviin, johon tulee youtubevideo
//$treeniID=2;
//$kyselyTreeni = $DBH->prepare("SELECT vk_tuotteet.nimi, vk_tuotteet.tuotekoodi FROM vk_tuotteet WHERE vk_tuotteet.tID = :haluttuID");
//$kyselyTreeni->bindParam(':haluttuID', $treeniID);
//$kyselyTreeni->execute();
//$kyselyTreeni->setFetchMode(PDO::FETCH_OBJ);
//$ekaTulosOlio = $kyselyTreeni->fetch();   
//Tuloksena on nyt vain vain yksi rivi (vain yksi tuote  tID:llä 2)
//echo ("<br>Treeni. Haluttu tID = $tuoteID : " . $ekaTulosOlio->nimi .", tuotekoodi  " . $ekaTulosOlio->tuotekoodi );

?>
