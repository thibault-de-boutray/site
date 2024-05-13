<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout seance</title>
    <link rel="icon" href="img/student.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/ajout_seance.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">
</head>
<body>
    <?php include("menu.php"); ?>
    <main>
        <div class="content">
            <div class="gauche">
                <div class="partie-haut">
                    <h1>Création séance</h1>
                </div>
                <div class="partie-bas">
                    <div class="etape">
                        <span id="span1">1</span>
                        <div class="texte">
                            <h2>thème</h2>
                            <p>Choisissez le thème</p>
                        </div>
                    </div>
                    <div class="etape">
                        <span id="span2">2</span>
                        
                        <div class="texte">
                            <h2>horaires</h2>
                            <p>Choisissez l'horaire</p>
                        </div>
                    </div>
                    <div class="etape">
                        <span id="span3">3</span>
                        
                        <div class="texte">
                            <h2>validation</h2>
                            <p>Valider la séance
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <form action="" class="droite">
            <i class="fa-solid fa-left-long" onclick="page_precedente()"></i>
                <div class="premiere">
                    <div class="haut">
                        <h1>Selection du thème</h1>
                    </div>
                    <div class="selector">
                        <div class="choisir" id="choisie">
                            <input type="text" name="choisie" class="hidden" id="hidden_nom">
                            <div class="image-container">
                                <img src="img/logo.jpg" alt="image logo" id="image_logo" class="image-round image_choisie">
                            </div>
                            <span id="le_nom" class="le_nom_choisie">Les dangers d'apprendre l'inforqsdfqsdfmatique</span>
                            <i class="fa-solid fa-chevron-down"></i>
                            <div id="liste_choix">
                                <?php 
                                $compteur=-1;
                                include("connection.php");
                                $query_select = "SELECT * FROM themes WHERE supprime=0";
                                $stmt_select = mysqli_prepare($connect, $query_select);
                                mysqli_stmt_execute($stmt_select);
                                $resultat = mysqli_stmt_get_result($stmt_select);
                                $description=array();
                                if(mysqli_num_rows($resultat) > 0) {
                                    while($row = mysqli_fetch_assoc($resultat)) {
                                        $nom = $row['nom'];
                                        $description[] = $row['descriptif'];
                                        $supprime=$row['supprime'];
                                        $compteur++;
                                        $chemin='img/logo.jpg';
                                        if ($row["imageId"]!=null){
                                            $query_select = "SELECT chemin FROM images WHERE id=?";
                                            $stmt_select = mysqli_prepare($connect, $query_select);
                                            mysqli_stmt_bind_param($stmt_select, 'i', $row['imageId']);
                                            if (mysqli_stmt_execute($stmt_select)){
                                                $result_image = mysqli_stmt_get_result($stmt_select);
                                                $row_image = mysqli_fetch_assoc($result_image);
                                                $chemin = $row_image['chemin'];
                                                
                                            }
                                            
                                        }
                                        echo "
                                        <div class='choix' id='choix_$compteur'>
                                        <div class='image-container'>
                                            <img src='$chemin' alt='image logo' id='image_logo' class='image-round'>
                                        </div>
                                            <span id='le_nom'>$nom</span>
                                        </div>
                                        ";
                                        
                                    }
                                    
                                } else {
                                    echo "Aucun résultat trouvé.";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="affichage">
                        <div class="partie_haut">
                            <h1 id="nom_affichage">le nom du theme</h1>
                            <div class="image-container">
                                <img src="img/logo.jpg" id="image_affichage" class="image-round"alt="image thème choisie">
                            </div>
                        </div>
                        <div class="description_affichage">
                            la description du theme
                        </div>    
                    </div>
                    <button class="bouton_suivant" type="button" onclick="page_suivante()"> suivant <i class="fa-solid fa-arrow-right"></i></button>
                </div>


                <div class="seconde">
                    <div class="haut">
                        <h1>Caractéristiques de votre séance</h1>
                    </div>
                    <div class="principal">
                        <div class="date">
                            <label for="jour_seance">jour de la seance :</label>
                            <input type="date" name="jour_seance" id="jour_seance" min="<?php date_default_timezone_set('Europe/Paris');
                    echo date("Y\-m\-d");?>" value="<?php echo date("Y\-m\-d");?>">
                        </div>
                        <div class="horaire">
                            <label for="horaire">horaire de la séance :</label>
                            <input type="time" name="horaire" id="horaire" min="08:00" value="08:00" max="18:00">
                        </div>
                        <div class="duree">
                            <label for="duree">durée de la séance :</label>
                            <input type="time" name="duree" id="duree" min="00:15" value="01:00" max="04:00">
                        </div>
                        <div class="nombre_place">
                            <label for="nombre_de_place"> nombre de place :</label>
                            <i class="fa-solid fa-chevron-left" onclick="supprimer_place()"></i>
                            <input type="text" name="nombre_place" class="hidden" id="hidden_place">
                            <span id="nombre_de_place">1</span>
                            <i class="fa-solid fa-chevron-right" onclick="ajouter_place()"></i>
                        </div>
                    </div>
                    <button class="bouton_suivant" type="button" onclick="page_suivante()"> suivant <i class="fa-solid fa-arrow-right"></i></button>
                </div>


                <div class="derniere">
                    <div class="haut">
                        <h1>Vérifier la séance</h1>
                    </div>
                    <div class="principal">
                            <div class="theme">
                                <h2>Thème séance</h2>
                                <p class="nom_verif"><u>le nom :</u><span>nomnomnomnomno mnomnomnomn omnomnomnmnomnomnomnomnomnomnomnomnomnomnomnomno</span></p>
                                <div class="logo_verif">
                                    <p><u>logo :</u></p>
                                    <div class="image-container">
                                        <img src="img/logo.jpg" alt="image logo" id="image_logo" class="image-round image_verif">
                                    </div>
                                </div>
                                <div class="description_verif">
                                    la description
                                </div>
                            </div>
                            <div class="caracteristique">
                                <h2>Caractéristiques séance</h2>
                                <div class="contenue">
                                    <p class="date_verif"><u>date :</u> <span>2024-05-10</span></p>
                                    <p class="horaire_verif"><u>horaire :</u> <span>01:30</span></p>
                                    <p class="duree_verif"><u>durée :</u> <span>1h30</span></p>
                                    <p class="place_verif"><u>place(s) :</u> <span>8</span></p>
                                    <div class="image_contenue">
                                        <img src="img/image_menu.png" alt="image">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <button class="bouton_suivant" type="submit" onclick="page_suivante()"> Valider <i class="fa-solid fa-check"></i></button>
                </div>
            </form>
        </div>
    </main>
</body>
<script>const description=<?php  echo json_encode($description);?>;</script>
<script src="script/ajout_seance.js"></script>
</html>