const etape1 = document.getElementById("span1");
const etape2 = document.getElementById("span2");
const etape3 = document.getElementById("span3");

const premiere_etape=document.querySelector(".premiere");
const deuxieme_etape=document.querySelector(".seconde");
const derniere_etape=document.querySelector(".derniere")
const fleche=document.querySelector(".fa-left-long");

var etape1active = 1;
var etape2active = 0;
var etape3active = 0;

var theme_choisie=0;

var menu_deroulant=document.getElementById("choisie");
var liste_choix=document.getElementById("liste_choix");



if (liste_choix.children.length > 5) {
    liste_choix.style.overflowY = "scroll";
    liste_choix.lastElementChild.style.borderRadius="0 0 0px 20px";
} else {
    liste_choix.style.overflowY = "hidden";
}


menu_deroulant.addEventListener("click",function(event){
    var choix_clicker=event.target.closest(".choix");
    theme_choisie=choix_clicker.id.split("_")[1];
    var nom_clicker=choix_clicker.querySelector('span')  
    var image_clicker=choix_clicker.querySelector("img");

    var le_nom_clicker=nom_clicker.textContent;
    var chemin_clicker=image_clicker.src;

    var nom_choisie=document.querySelector(".le_nom_choisie");
    var image_choisie=document.querySelector(".image_choisie");
    var input_hidden=document.getElementById("hidden_nom");
    

    image_choisie.src=chemin_clicker;
    nom_choisie.textContent=le_nom_clicker;
    input_hidden.value=le_nom_clicker;  
    liste_choix.style.display="none";
    
    
})

function modifier_affichage(indice){
    document.getElementById("nom_affichage").textContent=document.querySelector(".le_nom_choisie").textContent;
    document.getElementById("image_affichage").src=document.querySelector(".image_choisie").src;
    document.querySelector(".description_affichage").textContent=description[indice];
}

menu_deroulant.addEventListener("mouseenter",function(){
    liste_choix.style.display="block";
})
menu_deroulant.addEventListener("mouseleave", function() {
    liste_choix.style.display="none";
    
})

function modifer_verification(indice){
    document.querySelector(".nom_verif span").textContent=document.querySelector(".le_nom_choisie").textContent;
    document.querySelector(".image_verif").src=document.querySelector(".image_choisie").src;
    document.querySelector(".description_verif").textContent=description[indice];
    document.querySelector(".date_verif span").textContent=document.getElementById("jour_seance").value;
    document.querySelector(".horaire_verif span").textContent=document.getElementById("horaire").value;
    document.querySelector(".duree_verif span").textContent=document.getElementById("duree").value;
    document.querySelector(".place_verif span").textContent=document.getElementById("hidden_place").value;
}

etape1.addEventListener("click", function() {
    etape1.style.borderColor = "#b8affe";
    etape1.style.backgroundColor = "#6c5ce7";
    etape1.style.color = "white";
    fleche.style.display="none";
    premiere_etape.style.display="flex"
    if (etape2active === 1) {
        deuxieme_etape.style.display="none";
        setTimeout(function() {
            etape2.classList.remove("reculer_rond");
        }, 450);
        etape2.style.borderColor = "rgb(192, 192, 192)";
        etape2.style.backgroundColor = "rgb(192, 192, 192)";
        etape2.style.color = "rgb(77, 77, 77)";
    }
    
    if (etape3active === 1) {
        derniere_etape.style.display="none";
        setTimeout(function() {
            etape3.classList.remove("reculer_rond");
        }, 450);
        etape3.style.borderColor = "rgb(192, 192, 192)";
        etape3.style.backgroundColor = "rgb(192, 192, 192)";
        etape3.style.color = "rgb(77, 77, 77)";
    }
    
    etape1active = 1;
    etape2active = 0;
    etape3active = 0;
});

etape2.addEventListener("click", function() {
    etape2.style.borderColor = "#b8affe";
    etape2.style.backgroundColor = "#6c5ce7";
    etape2.style.color = "white";
    deuxieme_etape.style.display="flex";
    modifier_affichage(theme_choisie);
    if (etape1active === 1) {
        fleche.style.display="block";
        premiere_etape.style.display="none";    
        setTimeout(function() {
            etape1.classList.remove("reculer_rond");
        }, 450);
        etape1.style.borderColor = "rgb(192, 192, 192)";
        etape1.style.backgroundColor = "rgb(192, 192, 192)";
        etape1.style.color = "rgb(77, 77, 77)";
    }
    
    if (etape3active === 1) {
        derniere_etape.style.display="none"
        setTimeout(function() {
            etape3.classList.remove("reculer_rond");
        }, 450);
        etape3.style.borderColor = "rgb(192, 192, 192)";
        etape3.style.backgroundColor = "rgb(192, 192, 192)";
        etape3.style.color = "rgb(77, 77, 77)";
    }
    
    etape1active = 0;
    etape2active = 1;
    etape3active = 0;
});

etape3.addEventListener("click", function() {
    etape3.style.borderColor = "#b8affe";
    etape3.style.backgroundColor = "#6c5ce7";
    etape3.style.color = "white";
    derniere_etape.style.display="flex";
    modifer_verification(theme_choisie);
    if (etape1active === 1) {
        fleche.style.display="block";
        premiere_etape.style.display="none";
        setTimeout(function() {
            etape1.classList.remove("reculer_rond");
        }, 450);
        etape1.style.borderColor = "rgb(192, 192, 192)";
        etape1.style.backgroundColor = "rgb(192, 192, 192)";
        etape1.style.color = "rgb(77, 77, 77)";
    }
    
    if (etape2active === 1) {
        deuxieme_etape.style.display="none";
        setTimeout(function() {
            etape2.classList.remove("reculer_rond");
        }, 450);
        etape2.style.borderColor = "rgb(192, 192, 192)";
        etape2.style.backgroundColor = "rgb(192, 192, 192)";
        etape2.style.color = "rgb(77, 77, 77)";
    }
    
    etape1active = 0;
    etape2active = 0;
    etape3active = 1;
});


function page_suivante(){
    if (etape1active==1){
        etape2.click();
        
    }
    else{
        etape3.click();
    }
}
function page_precedente(){
    if (etape3active==1){
        etape2.click();
    }
    else{
        etape1.click();
    }
}


function ajouter_place(){
    document.getElementById("nombre_de_place").textContent++;
    document.getElementById("hidden_place").value=document.getElementById("nombre_de_place").textContent;
}

function supprimer_place(){
    if (document.getElementById("nombre_de_place").textContent-1>0){
        document.getElementById("nombre_de_place").textContent--;
    }
}
function mettre_valeur() {
    var date_actuelle = new Date();
    var date_max = new Date();
    date_max.setHours(17, 45, 0, 0); 
    if (date_actuelle > date_max) {
        date_actuelle.setDate(date_actuelle.getDate() + 1);
        document.getElementById("jour_seance").value = 
        date_actuelle.getFullYear()+ "-" +
        (String(date_actuelle.getMonth() + 1).padStart(2, '0')) + "-" +
        (String(date_actuelle.getDate()).padStart(2, '0'));
        return;
    } if (date_actuelle.getHours()>=8) {
        alert((String(date_actuelle.getHours()).padStart(2, '0')) + ":" +
        (String(date_actuelle.getMinutes()).padStart(2, '0')));
        document.getElementById("horaire").value = 
            (String(date_actuelle.getHours()).padStart(2, '0')) + ":" +
            (String(date_actuelle.getMinutes()).padStart(2, '0'));
            document.getElementById("horaire").min=(String(date_actuelle.getHours()).padStart(2, '0')) + ":" +
            (String(date_actuelle.getMinutes()).padStart(2, '0'));
    }
}




document.getElementById("hidden_place").value=1;
document.getElementById('choix_0').click();
modifier_affichage(0);
modifer_verification(0);
mettre_valeur();
