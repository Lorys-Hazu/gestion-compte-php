<?php
    // Redirection si session incorecte
session_start();
if ($_SESSION["login"] != true){
    header("location: login.php");
}

if (!empty($_POST)){
    $check = 0;
    if ($_POST["nom"] != ''){
        $check++;
    }
    if ($_POST["prenom"] != ''){
        $check++;
    }
    if ($_POST["password"] != ''){
        if (strlen($_POST["password"]) > 4){
            $check++;
        }
    }
    if ($_POST["mail"] != ''){
        if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $check++;
        }
    }

    if ($check == 4){
        // Verif Photo + Rename et déplacement
if (!empty($_FILES)) {
    $nameFile = $_FILES["fichier"]["name"];
    $typeFile = $_FILES["fichier"]["type"];
    $tempFile = $_FILES["fichier"]["tmp_name"];
    $sizeFile = $_FILES["fichier"]["size"];
    $errorFile = $_FILES["fichier"]["error"];

    // Permet de trouver le point
    $find = strrpos($nameFile,".") + 1;
    // Extrait l'extension
    $ext = substr($nameFile,$find);
    // Extensions acceptées
    $allow = array("jpg","JPG","pdf","xml");


    // Verification de si le fichier s'est bien mis
    if ($errorFile != 0) {
        $pb = "<span>Erreur de chargement de la photo</span>";
    }
    // Verficiation de l'extension
    elseif (!in_array($ext,$allow)){
        $pb = "<span>Seul le .jpg est accepté pour les photos</span>";
    }
    
    else{
        $path = "asset/".$nameFile;
        move_uploaded_file($tempFile,"asset/photo-".$_POST["nom"].".jpg");
        echo "<p style='color: green;'>Le compte a bien été creé !</p><br>";
        echo "<a href='profils.php'>Revenir aux profils</a>";
    }
}
    // Recuperation du form
    
    if ($_POST["civilite"] == "true"){
        $civilite = 2;
    }
    else {
        $civilite = 1;
    }

    $nom = $_POST["nom"];

    $prenom = $_POST["prenom"];

    $mail = $_POST["mail"];

    $password = $_POST["password"];

    // Ecriture dans le csv

    $open = fopen("mohamed.csv","a");

    $newLine = $civilite.";".$nom.";".$prenom.";".$mail.";".$password.";"."photo-".$_POST["nom"].".jpg";
    fputcsv($open,explode(";",$newLine),";");

    fclose($open);
}
else {
    echo "<span> Une erreur est survenue (champs non remplis, adresse mail non valide ou mot de passe trop court)</span>";
}


}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administration</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <span>
            <?php if (isset($pb)){ echo $pb;} ?>
        </span>
        <form method="post" action="creation.php" enctype="multipart/form-data">
            <div>
                <label for="civilite">Civilité
                    <span>*</span></label>
                <input type="radio" name="civilite" value="true">Homme
                <input type="radio" name="civilite" value="false" checked="checked">Femme
            </div>

            <div>
                <label for="nom">Nom
                    <span>*</span></label>
                <input type="text" name="nom" id="nom" required="required">
            </div>

            <div>
                <label for="prenom">Prénom
                    <span>*</span></label>
                <input type="text" name="prenom" id="prenom" required="required">
            </div>

            <div>
                <label for="mail">E-mail
                    <span>*</span></label>
                <input type="email" name="mail" id="mail" required="required">
            </div>
            <div>
                <label for="password">Mot de passe (4 caractères minimum)
                    <span>*</span></label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required="required"
                    minlength="4">
            </div>
            <div>
                <label for="fichier">Photo
                    <span>*</span></label>
                <input required="required" type="file" name="fichier" id="fichier"/>
            </div>
            <div class="action">
                <input type="submit" value="Valider" id="submit"/>
            </div>
        </form>
    </body>
</html>