var droite = document.querySelector('.droite');
var paragrapheMoisAnnee = document.getElementById("mois-annee");
var dateActuelle = new Date();
var nomsMois = [
  "janvier", "février", "mars", "avril", "mai", "juin",
  "juillet", "août", "septembre", "octobre", "novembre", "décembre"
];
var joursSemaine = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
var datesSemaine = [];
var heureActuel =dateActuelle.getHours();
var moisActuel = nomsMois[dateActuelle.getMonth()];
var anneeActuelle = dateActuelle.getFullYear();
var texteMoisAnnee = moisActuel + " " + anneeActuelle;
paragrapheMoisAnnee.textContent = texteMoisAnnee;
var liste_seance=[];
var liste_seance_affiche=[];
var compteur_taille=0;



function masquerDroite() {
    if (droite) {     
        droite.style.display = 'none';   
        document.getElementById('calendrier').style.width = '980px';
        document.querySelector(".gauche").style.width="100%";
        document.querySelector(".gauche").style.borderRadius="20px 20px 20px 20px";
    }
}


function actualiserDatesSemaine() {
    var paragrapheMoisAnnee = document.getElementById("mois-annee");
    var texteMoisAnnee = paragrapheMoisAnnee.textContent;
    var mots = texteMoisAnnee.split(" ");
    var mois = mots[0];
    var annee = parseInt(mots[1]);

    if (mois === nomsMois[dateActuelle.getMonth()] && annee === dateActuelle.getFullYear()) {
        var dateActuelleCopy = new Date(dateActuelle);
        var jourSemaineActuel = dateActuelleCopy.getDay();
        if (jourSemaineActuel==0){
            jourSemaineActuel=6;
        }
        var debutSemaineActuelle = new Date(dateActuelleCopy.setDate(dateActuelleCopy.getDate() - (jourSemaineActuel)));
        for (var i = 0; i < 7; i++) {
            datesSemaine[i] = new Date(debutSemaineActuelle);
            datesSemaine[i].setDate(debutSemaineActuelle.getDate() + i);
        }
    } else {
        var premierJour = new Date(annee, nomsMois.indexOf(mois), 1);
        var jourSemaine = premierJour.getDay();

        for (var i = 0; i < 7; i++) {
            datesSemaine[i] = new Date(premierJour);
            datesSemaine[i].setDate(datesSemaine[i].getDate() + i - (jourSemaine === 0 ? 6 : jourSemaine - 1));
        }
    }
}


function actualiserNumerosJours() {
    for (var i = 0; i < datesSemaine.length; i++) {
        document.getElementById("n" + (i + 1)).textContent = datesSemaine[i].getDate();
    }
}

function ajouterMois(int) {
    document.getElementById("back").style.visibility = "visible";
    var paragrapheMoisAnnee = document.getElementById("mois-annee");
    var texteMoisAnnee = paragrapheMoisAnnee.textContent;
    var mots = texteMoisAnnee.split(" ");
    var mois = mots[0];
    var annee = parseInt(mots[1]);
    var indexMois = nomsMois.indexOf(mois.toLowerCase());
    if (indexMois === 11) {
      indexMois = 0;
      annee++;
    } else {
      indexMois++;
    }
    paragrapheMoisAnnee.textContent = nomsMois[indexMois] + " " + annee;
    document.getElementById("reculer").style.visibility = "visible";
    document.getElementById("container_moi").style.justifyContent="space-evenly";
    if (int==1){
        actualiserDatesSemaine();
    } 
    actualiserNumerosJours();
    moisavant();
    verif_seance();
    avant_date();
}

function reculerMois(int) {
    var paragrapheMoisAnnee = document.getElementById("mois-annee");
    var texteMoisAnnee = paragrapheMoisAnnee.textContent;
    var mots = texteMoisAnnee.split(" ");
    var mois = mots[0];
    var annee = parseInt(mots[1]);
    var indexMois = nomsMois.indexOf(mois.toLowerCase());
    if (indexMois === 0) {
      indexMois = 11;
      annee--;
    } else {
      indexMois--;
    }
    paragrapheMoisAnnee.textContent = nomsMois[indexMois] + " " + annee;
    if (indexMois === dateActuelle.getMonth()) {
        document.getElementById("reculer").style.visibility = "hidden";
        document.getElementById("container_moi").style.justifyContent="center";
    }
    if (int==1){
        actualiserDatesSemaine();
        document.getElementById("back").style.visibility = "hidden";
    } 
    actualiserNumerosJours();
    moisavant();
    verif_seance();
    avant_date();
}
function ajouter7jours() {
    document.getElementById("back").style.visibility = "visible";
    for (var i = 0; i < datesSemaine.length; i++) {
        datesSemaine[i].setDate(datesSemaine[i].getDate() + 7);
    }
    var moisActuel = nomsMois.indexOf(paragrapheMoisAnnee.textContent.split(" ")[0].toLowerCase());
    if (datesSemaine[0].getMonth() !== moisActuel) {
        ajouterMois(0);
    }
    actualiserNumerosJours();
    moisavant();
    verif_seance();
    avant_date();
}

function enlever7jours() {
    for (var i = 0; i < datesSemaine.length; i++) {
        datesSemaine[i].setDate(datesSemaine[i].getDate() - 7);
    }
    
    var moisdiv = nomsMois.indexOf(paragrapheMoisAnnee.textContent.split(" ")[0].toLowerCase());
    if (datesSemaine[datesSemaine.length - 1].getMonth() !== moisdiv) {
        reculerMois(0);
    }
    var copy= new Date(datesSemaine[6]);
    copy.setDate(datesSemaine[6].getDate()-7);
    if (copy<dateActuelle){
        document.getElementById("back").style.visibility="hidden";
    }
    actualiserNumerosJours();
    moisavant();
    verif_seance();
    avant_date();
}

function moisavant() {
    var paragrapheMoisAnnee = document.getElementById("mois-annee");
    var texteMoisAnnee = paragrapheMoisAnnee.textContent;
    var mots = texteMoisAnnee.split(" ");
    var mois = mots[0];
    var indexMois = nomsMois.indexOf(mois.toLowerCase());
    
    for (var i = 0; i < 7; i++) {
        if (datesSemaine[i].getMonth() !== indexMois) {
            document.getElementById("n" + (i + 1)).style.color = "black";
            document.getElementById("j" + (i + 1)).style.color = "black";
            document.getElementById("n" + (i + 1)).style.fontWeight = "900";
            document.getElementById("j" + (i + 1)).style.fontWeight = "900";
        } else {
            document.getElementById("n" + (i + 1)).style.color = "rgb(95, 91, 91)";
            document.getElementById("n" + (i + 1)).style.fontWeight = "0";
            document.getElementById("j" + (i + 1)).style.color = "rgb(95, 91, 91)";
            document.getElementById("j" + (i + 1)).style.fontWeight = "0";
        }
    }

}
function avant_date(){
    const tableau = document.getElementById("planningTable");
    for (var c=1;c<=7;c++){
        if (dateActuelle>datesSemaine[c-1]){
                l=0;
                while ((l+8)<=18){      
                    const ligne = tableau.rows[l];
                    const cellule = ligne.cells[c];
                    cellule.style.backgroundColor="grey";
                    l++;
                }
        }
        else{
            for (var l=0;l<=10;l++){
                    const ligne = tableau.rows[l];
                    const cellule = ligne.cells[c];
                    cellule.style.backgroundColor="rgb(235, 237, 240)";
            }
        }
        if (datesSemaine[c-1].getDate()==dateActuelle.getDate() && datesSemaine[c-1].getMonth()==dateActuelle.getMonth() && datesSemaine[c-1].getFullYear()==dateActuelle.getFullYear()){
            l=0;
            while ((l+8)<=(dateActuelle.getHours()-1) && (l+8)<=18){      
                const ligne = tableau.rows[l];
                const cellule = ligne.cells[c];
                cellule.style.backgroundColor="grey";
                l++;
            }
        }
        
    }
}

function ajouter_chaque_seance(date, horaire, duree,place_disponible,place_prise) {
    const ma_seance = new Date(date + 'T' + horaire);
    const fin_ma_seance=new Date(ma_seance);
    fin_ma_seance.setMinutes(fin_ma_seance.getMinutes()+duree-1);
    var nb_en_meme_temps=en_meme_temps(date,ma_seance,fin_ma_seance);
    if (compteur_taille<nb_en_meme_temps){
        compteur_taille++;
    }
    else{
        compteur_taille=1;
    }
    var l = (ma_seance.getHours().toString()) - 8;
    var c = ma_seance.getDay();
    if (c==0){c=7 ;}
    var minute_debut = ma_seance.getMinutes();
    const tableau = document.getElementById("planningTable");
    const ligne = tableau.rows[l];
    const cellule = ligne.cells[c];
    var div = document.createElement("div");
    div.classList.add("seance")
    div.textContent = "séance: "+place_prise+"/"+place_disponible;
    div.style.top = (minute_debut / 60)*44 + 'px';
    div.style.left = (0+(88/nb_en_meme_temps)*(compteur_taille-1))+"px";
    div.style.width = (88/nb_en_meme_temps)+'px';
    div.style.height = 40  * (duree / 60) + 'px';
    if (nb_en_meme_temps>=3){
        div.style.fontSize=(12)+"px";
        div.textContent = place_prise+"/"+place_disponible;
    }
    else{
        div.style.fontSize=(22/nb_en_meme_temps)+"px";
    }
    cellule.appendChild(div);
    if (place_disponible!=place_prise){
        div.addEventListener("click",function(){
        afficherDroite(ma_seance,duree);
        var monTheme = document.querySelector('.le_theme');
        var font_de_base=20;
        while (monTheme.offsetHeight > 70) {
            font_de_base=font_de_base;
            document.getElementById("nom_du_theme").style.fontSize=font_de_base+"px";
        }
        div.textContent = "séance: "+place_prise+"/"+place_disponible;
        document.getElementById("nb_personne").innerHTML=place_prise+"/"+place_disponible;
        barre_progress=document.getElementById("barre-progress");
        while (barre_progress.children.length > 1) {
            barre_progress.removeChild(barre_progress.lastElementChild);
        }
        for (i=0;i<place_prise;i++){
            var part=document.createElement("div");
            part.style.width=(1/place_disponible*100)+"%";
            part.classList.add("place");
            barre_progress.appendChild(part);
        }
        })
    }
    else{
        div.style.backgroundColor="red";
        div.textContent = "séance: complète "+place_prise+"/"+place_disponible;
    }
    
}
function en_meme_temps(date,horaire_debut_seance,horaire_fin_seance){
    var compteur=0;
    for (var i=0;i<liste_seance.length;i++){
        var element=liste_seance[i];
        if (date==element[0]){
            const debut_seance = new Date(date + 'T' + element[1]);
            const fin_seance=new Date(debut_seance);
            fin_seance.setMinutes(fin_seance.getMinutes()+element[2]-1);
            if ((horaire_fin_seance>=debut_seance && horaire_fin_seance<=fin_seance) || (horaire_debut_seance<=fin_seance && horaire_debut_seance>=debut_seance)){
                compteur++;
            }
        }
    }
    return compteur;
}

function afficherDroite(jour,duree) {
    droite.style.display = 'flex';
    droite.style.borderRadius="0 20px 20px 0px";
    document.querySelector(".gauche").style.borderRadius="20px 0 0 20px";
    document.getElementById('calendrier').style.width = '1400px';
    document.querySelector(".gauche").style.width="65%";
    changerjour(jour);
    changerheure(jour,duree);
}


function changerjour(date){
    var lejour = joursSemaine[date.getDay()];
    var lemois=nomsMois[date.getMonth()];
    var lenumero=date.getDate();
    var lannee=date.getFullYear();
    
    document.getElementById("changejour").innerHTML=lejour+" "+lenumero+" "+lemois+" "+lannee;
}
function changerheure(date,duree){
    document.getElementById("heureseance").innerHTML=date.getHours().toString().padStart(2, '0')+":"+date.getMinutes()
    .toString().padStart(2, '0')+" à " +(date.getHours()+(duree/60)).toFixed().toString().padStart(2, '0')+":"+
    (date.getMinutes()+(duree%60)).toFixed().toString().padStart(2, '0');
}

function ajouter_seance(date_seance,horaire,duree_seance,place_disponible,place_prise){
    liste_seance.push([date_seance,horaire,duree_seance,place_disponible,place_prise]);
}

function verif_seance(){
    if (datesSemaine[0]>=dateActuelle){
        verif_date_min=datesSemaine[0];
        verif_date_min.setHours(7);
        verif_date_min.setMinutes(59);
    }
    else{
        verif_date_min=dateActuelle;
    }   
    var verif_date_max=datesSemaine[6];
    verif_date_max.setHours(18);
    verif_date_max.setMinutes(0);
    const divsDansTableau = document.querySelectorAll('#planningTable div');
    var table = document.getElementById("planningTable");
    var cells = table.getElementsByTagName("td");
    for (var i = 0; i < cells.length; i++) {
        var divs = cells[i].getElementsByTagName("div");
        for (var j = divs.length - 1; j >= 0; j--) {
            divs[j].parentNode.removeChild(divs[j]);
        }
    }
    for (var i=0;i<liste_seance.length;i++){
        var element=liste_seance[i];
        const ma_seance = new Date(element[0] + 'T' + element[1]);
        if (ma_seance>=verif_date_min && ma_seance<=verif_date_max){
            ajouter_chaque_seance(element[0], element[1], element[2],element[3],element[4]);
            
        }
    }

}





actualiserDatesSemaine();
actualiserNumerosJours();
masquerDroite();
ajouter_seance("2024-05-12", "16:00", 120, 6, 5);
ajouter_seance("2024-05-12", "15:00", 120, 6, 5);
verif_seance();
moisavant();
avant_date();


