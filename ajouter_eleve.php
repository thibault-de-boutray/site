<?php
include("ajout_eleve.php");
date_default_timezone_set('Europe/Paris');
$date = date("Y-m-d");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");
    function verifierLettresEtEspaces($chaine) {
        return preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ\s-]+$/', $chaine) && !preg_match('/\d/', $chaine);
    }

    function nettoyerChaine($chaine) {
        return strtolower(trim($chaine));
    }
    $nom = nettoyerChaine($_POST['nom']);
    $prenom = nettoyerChaine($_POST['prenom']);
    $date_naissance = $_POST['date'];

    if (empty($nom) || !verifierLettresEtEspaces($nom)) {
        echo "<script> document.getElementById('attention_nom').style.display='block';
        document.getElementById('nom').style.marginTop='10px'</script>";
        exit();
    }

    if (empty($prenom) || !verifierLettresEtEspaces($prenom)) {
        echo "<script> document.getElementById('attention_prenom').style.display='block';
        document.getElementById('prenom').style.marginTop='10px'</script>";
        exit();
    }

    $date_18_ans = date('Y-m-d', strtotime('-18 years'));
    if (!strtotime($date_naissance) || strtotime($date_naissance) > strtotime($date_18_ans)) {
        exit();
    }



    $query_select = "SELECT * FROM eleves WHERE nom = ? AND prenom = ? AND dateNaiss = ?";
    $stmt_select = mysqli_prepare($connect, $query_select);
    mysqli_stmt_bind_param($stmt_select, 'sss', $nom, $prenom, $date_naissance);
    mysqli_stmt_execute($stmt_select);
    $resultat = mysqli_stmt_get_result($stmt_select);

    if (mysqli_num_rows($resultat) != 0) {
        echo "<script>document.getElementById('existe').style.display='block';</script>";
        exit();
    }

    $query = "INSERT INTO eleves (nom, prenom, dateNaiss) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $nom, $prenom, $date_naissance);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>document.getElementById('saisi').style.display='block';</script>";
    } else {
        echo "Erreur lors de l'insertion de l'élève.";
    }

    mysqli_close($connect);
}    
    ?>