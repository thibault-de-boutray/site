const droite_avant = document.querySelector(".droite-avant");
const droite_apres = document.querySelector(".droite-apres");
const gauche_avant = document.querySelector(".gauche-avant");
const back=document.getElementById("back");
const gauche_apres = document.querySelector(".gauche-apres");
function continuer() {
    
    if (document.getElementById("nom").value!=""){
        afficherImage();
        afficherNom();
        setTimeout(function() {
            document.getElementById("attention_nom").style.display="none";
            document.getElementById("attention_image").style.display="none";
            document.getElementById("existe").style.display="none";
            document.getElementById("valide").style.display="none";
            droite_avant.style.display = "none";
            gauche_avant.style.display = "none";
            back.style.display="block";
            droite_apres.style.display = "flex";
            gauche_apres.style.display = "flex";
            droite_avant.classList.remove("droite-avant-transition");
            gauche_avant.classList.remove("gauche-avant-transition");
        }, 10);
        setTimeout(function(){
            droite_apres.classList.add("animation-droite");
            gauche_apres.classList.add("animation-gauche");
        },100);
    }
    else{
        document.getElementById("attention_nom").style.display="flex";
    }
}

function afficherImage() {
    var input = document.getElementById('logo');
    var fichier = input.files[0];

    if (fichier && fichier.type.startsWith('image')) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('image_logo').setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(fichier);
    } else {
        document.getElementById('image_logo').setAttribute('src', 'img/logo.jpg');
    }
}

function afficherNom(){
    var nom=document.getElementById("nom").value;
    if (nom!=null){
        document.getElementById("h1nom").innerHTML=nom;
    }
}

function retour(){
    droite_avant.style.display = "flex";
    gauche_avant.style.display = "flex";
    back.style.display="none";
    droite_apres.style.display = "none";
    gauche_apres.style.display = "none";
    droite_apres.classList.remove("animation-droite");
    gauche_apres.classList.remove("animation-gauche");
    setTimeout(function() {
        droite_avant.classList.add("droite-avant-transition");
        gauche_avant.classList.add("gauche-avant-transition")
    }, 10);
}


var logo = document.getElementById('logo');

logo.addEventListener('change', function() {
    var files = logo.files;
    var monlien = document.getElementById("filea");
    var selectedFile = files[0];

    if (files.length === 1) {
        if (!selectedFile.type.match('image.*')) {
            logo.value = "";
            document.getElementById("attention_image").style.display = "flex";
            return;
        }

        var fileURL = URL.createObjectURL(selectedFile);
        monlien.innerHTML = "<i class='fa-solid fa-file'></i> " + selectedFile.name;
        monlien.style.display = "block";
        monlien.href = fileURL;
        monlien.download = selectedFile.name;
    } else {
        logo.value = "";
    }
});
