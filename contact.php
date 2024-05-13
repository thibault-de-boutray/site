<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/menu.css">
    <title>contact</title>
    <link rel="icon" href="img/contact.svg" type="image/svg+xml">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="style/contact.css">
    
</head>
<body>
    <?php include("menu.php")?>
    <main class="contact">
    <form action="">
        <div class="formulaire">
            <h1>
                Contactez-nous
            </h1>
            <div class="separation"></div>
            <div class="corps-formulaire">
                <div class="gauche">
                    <div class="groupe">
                        <div class="boite">
                            <label for="nom">votre nom :</label>
                            <input type="text" name="nom" id="nom" placeholder="nom" required min="2" max="40">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="boite">
                            <label for="adresse_email">votre adresse email : </label>
                            <input type="email" name="adresse_email" id="adresse_email" placeholder="xxxxxxx@gmail.com" required max="40">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="boite">
                            <label for="numero">votre numero :</label>
                            <input type="tel" name="numero" id="numero" placeholder="0X XX XX XX XX" min="4" max="12">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>
                    </div>
                </div>
                <div class="droite">
                    <div class="boite">
                        <label for="message">message :</label>
                        <textarea name="message" id="mesage" cols="30" rows="9" placeholder="votre message" min="10" max="500"></textarea>
                        <label for="file" class="label-file">fichiers <i class="fa-solid fa-file"></i></label>
                        <input type="file" class="file" id="file" accept="image/*, .doc, .docx, .pdf">
                    </div>
                </div>
            </div>
            <div class="pied-formulaire" align="center">
                <button type="submit">envoyer le message</button>
            </div>
        </div>
    </form>
    </main>
</body>
</html>