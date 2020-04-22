//Otettu peruskoodi Karin lab7:sata
//ensiksi haetaan kaikki harjoitukset
const element1 = document.querySelector('#btnKaikki');
element1.addEventListener('click', (evt) => {
    fetch('harjoitukset/ajax/kaikki.php')
        .then((response) => {
            console.log("painettu Kaikki");
            return response.json();
        })
        .then((data) => {
            console.log(data);
            document.getElementById("ajaxText").innerHTML = "<iframe width='560' height='315' src='https://www.youtube.com/embed/" +data + "' frameborder='0' allowfullscreen></iframe>";
            document.getElementById("legText").innerHTML = "Kaikki harjoitukset";
        });
});

//nappia jooga painamalla haetaan kaikki joogaharjoitukset
const element2 = document.querySelector('#btnJooga');
element2.addEventListener('click', (evt) => {
    fetch('harjoitukset/ajax/jooga.php')
        .then((response) => {
            console.log("painettu jooga");
            return response.json();
        })
        .then((data) => {
            console.log(data);
            let obj = JSON.parse(data);
            let textKolmas = "";
            for (let i = 0; i < 5; i++) {
                //Käytetään Polarin alkuperäistä formaattia, 
                //jossa kaikki on yhden elementin taulukoita
                textKolmas += "<iframe width='560' height='315' src='https://www.youtube.com/embed/" +obj[i].ID +"' frameborder='0' allowfullscreen></iframe>";
            }
            document.getElementById("ajaxText").innerHTML = textKolmas;
            document.getElementById("legText").innerHTML = "Jooga harjoitukset";
        });

});

//nappia painamalla haetaan kaikki meditaatioharjoitukset
const element3 = document.querySelector('#btnMeditaatio');
element3.addEventListener('click', (evt) => {
    fetch('harjoitukset/ajax/meditaatio.php')
        .then((response) => {
            console.log("painettu Meditaatio");
            return response.json();
        })
        .then((data) => {
            console.log(data);
            document.getElementById("ajaxText").innerHTML = data;
            document.getElementById("legText").innerHTML = "Meditaatio harjoitukset";
        });

});