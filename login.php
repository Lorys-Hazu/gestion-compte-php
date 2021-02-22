
<?php

if (!empty($_POST)){

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


}

foreach ($tab as $value){
    if ($value[3]==$_POST["mail"]){
        if ($value[4]==$_POST["password"]){
            session_start();
            $_SESSION["login"] = true;
            header("location: profils.php");

        }
    }
    

}
echo "<span> identifiant ou mot de passe incorect </span>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Connexion</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <h1>Connectez-vous</h1>

        <form method="POST" action="login.php">
            <label for="mail">E-mail
                <span>*</span></label>
            <input type="email" name="mail" id="mail" required="required"/>

            <label for="password">Mot de passe
                <span>*</span></label>
            <input type="password" name="password" id="password" required="required"/>

            <div class="action">
                <input type="submit" value="Connexion" id="submit"/>
            </div>
        </form>
    </body>
</html>
