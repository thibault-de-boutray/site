<?php 
include("connection.php");
$compteur = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query_select = "SELECT * FROM themes";
    $stmt_select = mysqli_prepare($connect, $query_select);
    mysqli_stmt_execute($stmt_select);
    $resultat = mysqli_stmt_get_result($stmt_select);
    if(mysqli_num_rows($resultat) > 0) {
        while($row = mysqli_fetch_assoc($resultat)) {
            if (!isset($_POST["check".$compteur])){
                $valeur=$_POST["hidden".$compteur];
            }
            else{
                if ($_POST["check".$compteur]=="on"){
                    $valeur=0;
                }
                else{
                    $valeur=1;
                }
            }
            if ($row["supprime"] != $valeur){
                $id_theme = $row["idtheme"];
                $query_update = "UPDATE themes SET supprime = ? WHERE idtheme = ?";
                $stmt_update = mysqli_prepare($connect, $query_update);
                mysqli_stmt_bind_param($stmt_update, "si", $valeur, $id_theme);
                mysqli_stmt_execute($stmt_update);

            }
            $compteur++;
        }
    }
}
include("suppression_theme.php");
?>
