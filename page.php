<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $_POST["desc"]; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $_POST["title"]; ?></title>
</head>
<body>
    <h1> <?php echo $_POST["Hun"]; ?> </h1>
    <main>
        <?= $_POST["main"] ?>
</main>
</body>
</html>
<?php header('Content-Type: application/octet-stream'); header('Content-Disposition: attachment; filename="'.$_POST["nomFichier"].'.html"'); ?>