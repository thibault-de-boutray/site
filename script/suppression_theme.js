var affichage_filtre=0;
var existe=1;
var supprime=1;

var inputRecherche = document.getElementById('input_recherche');

inputRecherche.addEventListener('keydown', function(event) {
    if (event.keyCode === 13) {
        mon_filtre();
    }
});


function affiche_filtre(){
    if (affichage_filtre==0){
        document.querySelector(".filtre").style.display="flex";
        affichage_filtre=1;
    }
    else{
        document.querySelector(".filtre").style.display="none";
        affichage_filtre=0;
    }
}

function filtreSupprime(){
        document.getElementById("label_supprime").style.display="none";
        document.getElementById("supprime").value=0;
        supprime=0;
        if (document.getElementById("label_existe").style.display=="none"){
            document.getElementById("label_existe").style.display="block";
            existe=1;
        }
    mon_filtre();
}


function filtreExiste(){
    document.getElementById("label_existe").style.display="none";
    document.getElementById("existe").value=0;
    existe=0;
    if (document.getElementById("label_supprime").style.display=="none"){
        document.getElementById("label_supprime").style.display="block";
        supprime=1;
    }
    mon_filtre();
}

function reset(){
    document.getElementById("label_existe").style.display="block";
    document.getElementById("existe").value=1;
    document.getElementById("label_supprime").style.display="block";
    document.getElementById("supprime").value=1;
    existe=1;
    supprime=1;
    mon_filtre();
}


function dispo(valeur,compteur){
    if (valeur==0){
        valeur=1;
    }
    else{
        valeur=0;
    }
    document.getElementById("hidden"+compteur).value=valeur;
    document.getElementById("check"+compteur).checked=valeur;
    
}
function rechercher(){
    var recherche = document.getElementById("input_recherche").value.toLowerCase();
    for (var i = 0; i <= compteur; i++) {
        var trElement = document.getElementById('ligne_' + i);
        var nom = trElement.querySelector('p').textContent;
        if (!nom.includes(recherche)) {     
            trElement.style.display = 'none';
        }
    }
}
function mon_filtre(){
    reset_filtre();
    if (existe==0){
        for (var i=0;i<=compteur;i++){
            if (document.getElementById("check"+i).checked==1){
                document.getElementById('ligne_' + i).style.display = 'none';
            }
        }
    }
    if (supprime==0){
        for (var i=0;i<=compteur;i++){
            if (document.getElementById("check"+i).checked==0){
                document.getElementById('ligne_' + i).style.display = 'none';
            }
        }
    }
    rechercher();
}

function reset_filtre(){
    for (i=0;i<=compteur;i++){
        document.getElementById('ligne_' + i).style.display = 'table-row';
    }
}
