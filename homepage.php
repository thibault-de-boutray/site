<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/menu.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">
    <link rel="icon" href="img/home-page.png" type="image/svg+xml">
    <title>page d'acceuil</title>
</head>
<body>
    <?php include("menu.php")?>
    <div class="premiere-page">
        <div class="slider" id="slider">
            <img src="img/photo1.png" id="image_slide" alt="première photo slider">
            <div class="precedent" onclick="ChangeSlide(-1)">&lt</div>
            <div class="suivant" onclick="ChangeSlide(1)">&gt</div>
        </div>
        <div class="box-discover">
            <img src="img/bg.jpg" class="bg"alt="bg">
            <img src="img/bg.jpg" class="bg"alt="bg">
            <img src="img/bg.jpg" class="bg"alt="bg">
            <img src="img/bg.jpg" class="bg"alt="bg">
            <img src="img/bg.jpg" class="bg"alt="bg">
            <div class="voiture">
                <img src="img/voiture_anime.png" class="voiture_anime" alt="voiture">
                <img class="roue1" src="img/roue.png" alt="roue">
                <img class="roue2" src="img/roue.png" alt="roue">
            </div>
            <div class="voiture2">
                <img src="img/autre_voiture.png" class="voiture_anime2" alt="voiture">
                <img class="roue1" src="img/roue.png" alt="roue">
                <img class="roue2" src="img/roue.png" alt="roue">
            </div>
        <button type="button" class="discover" onclick="scrollToSection('section_2')"> Décourir plus <i class="fa-solid fa-angle-down"></i></button>
        </div>
    </div>
    <div class="deuxieme_page"  id="section_2">
        <div class="premiere_box">
        <div class="element_1" >
                <h1>
                    Le permis PAS cher et RAPIDE.

                </h1>
                <p>
    Obtenez votre permis rapidement et à moindre coût avec notre auto-école. Nos moniteurs qualifiés et dévoués vous accompagnent à chaque étape du processus, assurant une formation efficace et abordable.<br><br>

    Avec un taux de réussite de 100%, notre engagement envers votre succès est indéfectible. Vous serez prêt à prendre la route en toute confiance après avoir suivi nos cours.<br><br>

    Que vous soyez débutant ou expérimenté, notre approche s'adapte à vos besoins spécifiques. La route vers l'obtention du permis devrait être accessible à tous, c'est pourquoi nous offrons des tarifs compétitifs.<br><br>

    Rejoignez-nous dès aujourd'hui et découvrez comment obtenir votre permis peut être simple, rapide et économique avec notre auto-école.
</p>

            </div>
            <div class="element_2">
                <img src="img/image_permis.jpg" alt="image permis" class="image_permis">
            </div>
            <div class="element_3">
                <h1>
                    Le permis c'est simple avec nous.

                </h1>
                <p>
                À Compiègne, à coté de l'UTC, se trouve notre auto-école. Nos instructeurs dévoués vous accompagnent à chaque étape vers le permis, rendant chaque leçon instructive et conviviale.<br><br>
  
                Notre engagement envers votre réussite est inébranlable, avec un taux de réussite de 100%. Vous serez prêt à affronter les routes en toute confiance après avoir franchi nos portes.<br><br>
  
                Que vous soyez novice ou expérimenté, notre approche personnalisée s'adapte à vos besoins. La route vers le permis devrait être gratifiante, c'est ce que nous vous offrons à chaque instant.<br><br>
  
                Rejoignez-nous aujourd'hui et découvrez pourquoi le permis devient toujours plus simple avec nous.
                </p>
            </div>
        </div>
        <div class="seconde_box">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.724268220079!2d2.82066960310421!3d49.41411984437128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7d68188f72ef5%3A0x1ab20abc7b0abed0!2sDelabarre%20Formation!5e0!3m2!1sfr!2sfr!4v1714606270220!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>
</html>
<script src="script/index.js"></script>
