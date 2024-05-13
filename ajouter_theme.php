<?php
include("connection.php");
include("ajout_theme.php");
date_default_timezone_set('Europe/Paris');

function nettoyerChaine($chaine) {
    return strtolower(trim($chaine));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = nettoyerChaine($_POST['nom']);
    $description = nettoyerChaine($_POST['description']);
    $supprime = 0;

    if (empty($nom)){
        echo "<script> document.getElementById('attention_nom').style.display='block';
        document.getElementById('nom').style.marginTop='10px'</script>";
        exit();
    }

    if (empty($description)){
        echo "<script>document.getElementById('nom').value='$nom';continuer();document.getElementById('attention_area').style.display='block';
        document.getElementById('attention_area').style.marginBottom='1.5rem'</script>";
        exit();
    }
    $query_select = "SELECT * FROM themes WHERE nom = ? AND descriptif = ?";
    $stmt_select = mysqli_prepare($connect, $query_select);
    mysqli_stmt_bind_param($stmt_select, 'ss', $nom, $description);
    mysqli_stmt_execute($stmt_select);
    $resultat = mysqli_stmt_get_result($stmt_select);

if (mysqli_num_rows($resultat) != 0) {
    echo "<script>document.getElementById('existe').style.display='block';</script>";
    exit();
} 

    // Insérer le thème dans la table 'themes'
    $query_insert_theme = "INSERT INTO themes (nom, descriptif, supprime) VALUES (?, ?, ?)";
    $stmt_insert_theme = mysqli_prepare($connect, $query_insert_theme);
    mysqli_stmt_bind_param($stmt_insert_theme, 'ssi', $nom, $description, $supprime);
    $result_insert_theme = mysqli_stmt_execute($stmt_insert_theme);

    if (!$result_insert_theme) {
        echo "<script>alert('Erreur lors de l\'insertion du thème');</script>";
        exit();
    }

    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES["logo"]) && $_FILES["logo"]['error'] == 0){
        $chemin_destination = "uploads/".$_FILES['logo']['name'];

        // Vérifier si le fichier est une image
        $info_image = getimagesize($_FILES["logo"]["tmp_name"]);
        if ($info_image === false || strpos($info_image['mime'], 'image') !== 0) {
            echo "<script>document.getElementById('nom').value='$nom';continuer();document.getElementById('attention_image').style.display='block';
            document.getElementById('attention_area').style.marginBottom='1.5rem'</script>";
            exit();
        }

        // Déplacer le fichier téléchargé vers le répertoire de destination
        if (!move_uploaded_file($_FILES['logo']['tmp_name'], $chemin_destination)){
            echo "<script>alert('Erreur lors du téléchargement du fichier');</script>";
            exit();
        }

        // Insérer l'image dans la table 'images'
        $query_insert_image = "INSERT INTO images (chemin) VALUES (?)";
        $stmt_insert_image = mysqli_prepare($connect, $query_insert_image);
        mysqli_stmt_bind_param($stmt_insert_image, 's', $chemin_destination);
        $result_insert_image = mysqli_stmt_execute($stmt_insert_image);

        if (!$result_insert_image) {
            echo "<script>alert('Erreur lors de l\'insertion de l\'image');</script>";
            exit();
        }
        $image_id = mysqli_insert_id($connect);
        $query_update_theme = "UPDATE themes SET imageId= ? WHERE nom = ? AND descriptif= ?";
        $stmt_update_theme = mysqli_prepare($connect, $query_update_theme);
        mysqli_stmt_bind_param($stmt_update_theme, 'iss', $image_id, $nom, $description);
        $result_update_theme = mysqli_stmt_execute($stmt_update_theme);

        if (!$result_update_theme) {
            echo "<script>alert('Erreur lors de la mise à jour du thème avec l\'ID de l\'image');</script>";
            exit();
        }
        else{
            echo "<script>document.getElementById('valide').style.display='block';</script>";
        }
    }

    mysqli_close($connect);
}
?>
