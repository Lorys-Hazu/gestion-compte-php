
<?php

// Redirection si session incorecte
session_start();
if ($_SESSION["login"] != true){
    header("location: login.php");
}

$filename = 'mohamed.csv';
$tab = []; 

// Ouverture du fichier
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
// Lecture de toutes les lignes du fichier
while (($data = fgetcsv($h, 1000, ";")) !== FALSE) 
{
// Rangement des valeurs dans le tableau
$tab[] = $data;		
}

// Fermeture du fichier
fclose($h);

//   echo "<pre>";
// var_dump($tab);
// echo "</pre>";

}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel=stylesheet type="text/css" href="style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profils</title>
</head>
<body>
<h1>Tous les profils disponibles</h1>
<section  class="account-container">
    <?php foreach ($tab as $value){
        //Ouverture de la div
        echo "<div class='account-contain'>";
        //affichage photo
        echo "<div class='account-picture' style='background:url(./asset/".$value[5].") no-repeat; background-position:center; background-size:cover;'></div>";
        //Civilité
        if ($value[0] == 1){
            echo "Mme. ";
        }
        else {
            echo "M. ";
        }

        //Nom/prénom
        echo $value[2];
        echo " ";
        echo strtoupper($value[1]);

        echo "<br>";

        // email
        echo "Mail: ".$value[3];
        echo "</div>";


    }
    ?>
</section>
<a href="creation.php">Creer un nouveau compte</a>
<a href="html.php">Creer une page html</a>
</body>
</html>