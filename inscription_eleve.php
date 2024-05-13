<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incription eleve</title>
    <link rel="icon" href="img/eleve.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/inscription_eleve.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">
</head>
<body>
    <?php include("menu.php"); ?>
    <main>
        <div class="calendrier" id="calendrier">
            <div class="gauche">
                <div class="mois" id="container_moi">
                    <i class="fa-solid fa-chevron-left" onclick="reculerMois(1)" id="reculer"></i>
                    <p class="text-mois" id="mois-annee"></p>
                    <i class="fa-solid fa-chevron-right"  onclick="ajouterMois(1)"></i>
                </div>
                <div class="horaire-container">
                    <div class="jours" id="contientjours">
                        <i class="fa-solid fa-chevron-left" onclick="enlever7jours()" id="back"></i>
                        <div class="differents-jours">
                            <div class="jour" id="j1">lundi</div>
                            <div class="numero" id="n1"></div>
                        </div>
                        <div class="differents-jours" id="j2">
                            <div class="jour" id="j2">mardi</div>
                            <div class="numero" id="n2"></div>
                        </div>
                        <div class="differents-jours" id="j3">
                            <div class="jour" id="j3">mercredi</div>
                            <div class="numero" id="n3"></div>
                        </div>
                        <div class="differents-jours" id="j4">
                            <div class="jour" id="j4">jeudi</div>
                            <div class="numero" id="n4"></div>
                        </div>
                        <div class="differents-jours" id="j5">
                            <div class="jour" id="j5">vendredi</div>
                            <div class="numero" id="n5" ></div>
                        </div>
                        <div class="differents-jours" id="j6">
                            <div class="jour" id="j6">samedi</div>
                            <div class="numero" id="n6"></div>
                        </div>
                        <div class="differents-jours" id="j7">
                            <div class="jour" id="j7">dimanche</div>
                            <div class="numero" id="n7"></div>
                        </div>
                        <i class="fa-solid fa-chevron-right" onclick="ajouter7jours()"></i>              
                    </div>
                    <div class="planning">
                        <table id="planningTable">
                            <tbody>
                                <tr class="tr">
                                    <td class="each-hour">8h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">9h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">10h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">11h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">12h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">13h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">14h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">15h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">16h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">17h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                                <tr>
                                    <td class="each-hour">18h00</td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                    <td class="heure"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="droite">
                <div class="bouton-quitter">
                    <button type="button" onclick="masquerDroite()"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <form class="inscription">
                    <div class="contenue">
                        <div class="partie-haut">
                            <h1 class="titre">Votre séance :</h1>
                            <div class="separation "></div>
                            <div class="main-containt">
                                <div class="jour element">
                                    <div class="label">
                                        Date : 
                                    </div>                                
                                    <div class="date" id="changejour">
                                        Lundi 8 mars 2024
                                    </div>
                                </div>

                                <div class="horaire element">
                                    <div class="label">
                                        Horaire :
                                    </div>
                                    <div class="heure">
                                        <div id="heureseance">8h00 à</div>
                                    </div>    
                                </div>
                                <div for="barre-progress"class="label">
                                <div class="progress element" id="barre-progress">
                                    <div class="icone">
                                        <i class="fa-solid fa-message"></i>
                                        <span id ="nb_personne" class="nombre-personne">8/10</span>
                                    </div>
                                </div>
                                </div>
                                <div class="theme-container">
                                    <p class="label">Thème :</p>
                                        <div class="le_theme">
                                        <?php 
                                            include("connection.php");
                                            $query_select = "SELECT * FROM themes WHERE nom='thibault'";
                                            $stmt_select = mysqli_prepare($connect, $query_select);
                                            mysqli_stmt_execute($stmt_select);
                                            $resultat = mysqli_stmt_get_result($stmt_select);
                                            $chemin="img/logo.jpg";
                                            if(mysqli_num_rows($resultat) > 0) {
                                                $row = mysqli_fetch_assoc($resultat);
                                                $nom=$row["nom"];
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
                                                    <div class=\"image-container\">
                                                    <img src=\"$chemin\" alt=\"image logo\" id=\"image_logo\" class=\"image-round\">
                                                    </div>";
                                                echo "<p class='nom' id='nom_du_theme'>$nom</p>";
                                            }
                                        ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="partie-bas">
                        <h1 class="titre">Identification</h1>
                        <div class="separation"></div>
                        <div class="input">
                                <label for="nom">Le nom :</label>
                                <input type="text" name="nom" id="nom" class="nom">
                                <label for="prenom">Le prenom :</label>
                                <input type="text" name="prenom" id="prenom" class="prenom">
                            </div>
                    </div>
                    <input type="submit" value="valider" class="submit">
                </form>
        </div>
    </div>
    </main>
</body>
<script src="script/inscription_eleve.js"></script>
</html>

