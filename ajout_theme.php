<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter thème</title>
    <link rel="icon" href="img/voiture.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/ajout_theme.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">
</head>
<body>
    <?php include("menu.php");?>
    <main>
        <form action="ajouter_theme.php" method="post" enctype="multipart/form-data">
            <i id="back" onclick="retour()" class="fa-solid fa-circle-left"></i>
            <div class="gauche-avant gauche-avant-transition">
                <img src="img/photo_voiture.png" alt="image voiture">
            </div>
            <div class="droite-avant droite-avant-transition">
                <div class="container">
                    <h1>Création thème</h1>
                    <div class="separateur"></div>
                    <div class="content">
                        <label for="nom">nom du thème :</label>
                        <input type="text" name="nom" id="nom" required>
                        <p id="attention_nom">le champ n'a pas été bien saisi<i class="fa-solid fa-triangle-exclamation"></i></p>
                        <label for="logo" class="label-logo">ajouter logo (optionel) :</label>
                        <label for="logo" class="logo" accept="image/*">logo <i class="fa-solid fa-image"></i></label>
                        <input type="file" name="logo" id="logo" accept="image/*">
                        <p id="attention_image">le fichier n'est pas une image<i class="fa-solid fa-triangle-exclamation"></i></p>
                        <a href="chemin_vers_votre_fichier" id="filea" download=""></a>
                    </div>
                    <button type="button" class="continuer" onclick="continuer()">continuer <i class="fa-solid fa-arrow-right"></i></button>
                    <p id="existe">Un thème identique existe déjà <i class="fa-solid fa-triangle-exclamation"></i></p>
                    <p id="valide">thème ajouté avec succes <i class="fa-regular fa-circle-check"></i></p>
                </div>
            </div>
            <div class="gauche-apres">
            <div class="container">
                    <h1>description</h1>
                    <div class="separateur"></div>
                    <label for="description">description du thème :</label>
                    <textarea name="description" id="description" maxlength="1000" required></textarea>
                    <p id="attention_area">le champ n'a pas été saisi <i class="fa-solid fa-triangle-exclamation"></i></p>
                    <button type="submit" name="valider" class="valider">valider</button>
                </div>
            </div>
            <div class="droite-apres">
                <h1 id="h1nom">le code de la route c'est simple</h1>
                <div class="image-container">
                    <img src="img/logo.jpg" alt="image logo" id="image_logo" class="image-round">
                </div>
            </div>
        </form>
    </main>
</body>
<script src="script/ajout_theme.js"></script>
</html>
