<?php
// Redirection si session incorecte
    session_start();
    if ($_SESSION["login"] != true){
        header("location: login.php");
    }



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fais ton HTML</title>
    <script src="https://cdn.tiny.cloud/1/bed2xrtfma17gwg83fy9ciiodmfhd6spzwa95ag7iq3jt5n5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#main'
        
      });
    </script>

</head>
<body>
    <form method="post" action="page.php" enctype="multipart/form-data">
    <div>
                <label for="nomFichier">Nom du fichier
                    <span>*</span></label>
                <input type="text" name="nomFichier" id="nomFichier" required>
            </div>
            <div>
                <label for="title">Title
                    <span>*</span></label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="desc">Description
                    <span>*</span></label>
                <input type="text" name="desc" id="desc" required>
            </div>
            <div>
                <label for="Hun">H1
                    <span>*</span></label>
                <input type="text" name="Hun" id="Hun" required>
            </div>
            <div>
                <label for="main">Main
                    <span>*</span></label>
                <textarea name="main" id="main">

                </textarea>
            </div>
            <div class="action">
                <input type="submit" value="Valider" id="submit"/>
            </div>


            

</form>
</body>
</html>

