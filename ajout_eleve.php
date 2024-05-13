<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulter</title>
    <link rel="icon" href="img/student.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/ajout_eleve.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">

</head>
<body>
    <?php include("menu.php");?>
    <main>
        <form action="ajouter_eleve.php" method="POST">
            <div class="main_content">
                <div class="gauche">
                    <img src="img/photo_voiture.png" alt="voiture auto école">
                </div>
                <div class="droite">
                    <h1>Inscription élève</h1>
                    <div class="separation"></div>
                                
                    <label for="prenom">le prénom :</label>
                    <input type="text" id="prenom"  name="prenom" class="entree" required min="2" max="40" placeholder="prenom">
                    <p id="attention_prenom">le champ n'a pas été bien saisi <i class="fa-solid fa-triangle-exclamation"></i></p>
                    
                    <label for="nom">le nom :</label>
                    <input type="text" id="nom" name="nom" class="entree" required min="2" max="40" placeholder="nom">
                    <p id="attention_nom">le champ n'a pas été bien saisi <i class="fa-solid fa-triangle-exclamation"></i></p>

                    <label for="date">le date de naissance</label>
                    <input type="date" name="date" class="entree" id="date" required <?php date_default_timezone_set('Europe/Paris');
                    $date = date("\-m\-d");$anne=date("Y")-100;echo "min='$anne-01-01'";$anne+=82;echo "max='$anne$date'"?>>
                    <p id="attention_date">le champ n'a pas été bien saisi <i class="fa-solid fa-triangle-exclamation"></i></p>

                    <input type="submit" name="valider" value="valider" class="valider">
                    <p id="saisi">* l'élève a bien été inscrit <i class="fa-regular fa-circle-check"></i></p>
                    <p id="existe">* l'élève est déjà ajouté <i class="fa-solid fa-triangle-exclamation"></i></p>
                </div>
            </div>
        </form>
    </main>
</body>
</html>