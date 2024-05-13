<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimer thème</title>
    <link rel="icon" href="img/voiture.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/suppression_theme.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" type="text/css">
</head>
<body>
    <?php 
    include("menu.php");
    ?>
    <main>
        <div class="container">
            <div class="recherche">
                <div class="barre_recherche">
                    <div class="barre">
                        <input type="search" placeholder="nom du thème" id="input_recherche">
                        <div for="input_submit" class="rechercher" onclick="mon_filtre();"><i class="fa-solid fa-magnifying-glass"></i></div>
                    </div>
                    <div class="afficher_filtre">
                        <button type="button" onclick="affiche_filtre()"><i class="fa-solid fa-filter"></i></button>
                    </div>
                </div>
                <div class="filtre">
                    <label for="existe" id="label_existe" onclick="filtreExiste()"><div class="texte"><p>exite</p><i class="fa-solid fa-xmark"></i></div></label>
                    <input type="radio" name="existe" id="existe">
                    <label for="supprime" id="label_supprime" onclick="filtreSupprime()"><div class="texte"><p>supprimé</p><i class="fa-solid fa-xmark"></i></div></label>
                    <input type="radio" name="supprime" id="supprime">
                    <button type="button"><i class="fa-solid fa-rotate-left" onclick="reset()"></i></button>
                </div>
                </div>
                
            <div class="content">
                <div class="haut">
                    <img src="img/image_menu.png" alt="image">
                    <h1>Thèmes des sécance du code de la route</h1>
                </div>
                <form class="resultat" method="POST" action="supprimer_theme.php">
                    <table id="tableau">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>disponible</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $compteur=-1;
                            include("connection.php");
                            echo "<script src='script/suppression_theme.js'></script>";
                            $query_select = "SELECT * FROM themes";
                            $stmt_select = mysqli_prepare($connect, $query_select);
                            mysqli_stmt_execute($stmt_select);
                            $resultat = mysqli_stmt_get_result($stmt_select);
                            if(mysqli_num_rows($resultat) > 0) {
                                while($row = mysqli_fetch_assoc($resultat)) {
                                    $nom = $row['nom'];
                                    $description = $row['descriptif'];
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
                                        <tr id='ligne_$compteur'>
                                            <td>
                                                <div class=\"content\">
                                                    <div class=\"image-container\">
                                                        <img src=\"$chemin\" alt=\"image logo\" id=\"image_logo\" class=\"image-round\">
                                                    </div>
                                                    <p>$nom</p>
                                                </div>
                                            </td>
                                            <td>$description</td>
                                            <td>
                                            <input type='text' name='hidden$compteur' id='hidden$compteur' style='display:none' value='1'>
                                                <label class=\"switch\">
                                                    <input type=\"checkbox\" id='check$compteur' name='check$compteur' onclick='mon_filtre()'>
                                                    <span class=\"slider round\"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        <script>dispo($supprime,$compteur);</script>
                                    ";
                                    
                                }
                                echo "<script>var compteur = $compteur;</script>";
                            } else {
                                echo "Aucun résultat trouvé.";
                            }
                            ?>
                            
                        </tbody>
                    </table>
                     <input type="submit" class="valide" value="enregister vos choix">                
                <form>
            </div>
        </div>
    </main>
</body>
<script src="script/suppression_theme.js"></script>
</html>